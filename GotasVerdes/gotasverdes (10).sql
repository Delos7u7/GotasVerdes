-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2023 a las 00:06:09
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gotasverdes`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarRecolector` (IN `nombreRecolector` VARCHAR(45), IN `nuevoCorreo` VARCHAR(45), IN `nuevoTelefono` VARCHAR(45), IN `nuevoStatus` INT)   BEGIN
    UPDATE recolector 
    SET correo_recolector = nuevoCorreo, 
        telefono_recolector = nuevoTelefono, 
        status_recolector = nuevoStatus 
    WHERE nombre_recolector = nombreRecolector;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_estado_recolecta` (IN `p_id_recolecta` INT, IN `p_estado` INT)   BEGIN
    UPDATE recolecta
    SET status_recolecta = p_estado
    WHERE id_recolecta = p_id_recolecta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `asignar_recolecta` (IN `id_recolecta_param` INT, IN `id_recolector_param` INT)   BEGIN
    INSERT INTO asignacion_recolecta (id_recolecta, id_recolector) VALUES (id_recolecta_param, id_recolector_param);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarAdministrador` (IN `usuario` VARCHAR(45), IN `con` VARCHAR(45))   BEGIN
    SELECT * FROM administrador 
    WHERE usuario = usuario_admin
    AND con = contraseña_admin;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarCor` (IN `correoUsuarioBuscar` VARCHAR(45))   BEGIN
    DECLARE correo_encontrado VARCHAR(45);

    -- Buscar en la tabla usuarios
    SELECT correo_usuario INTO correo_encontrado FROM usuarios WHERE correo_usuario = correoUsuarioBuscar;

    IF correo_encontrado IS NOT NULL THEN
        SELECT correo_encontrado AS correo;
    ELSE
        -- Si no se encuentra en usuarios, buscar en recolector
        SELECT correo_recolector INTO correo_encontrado FROM recolector WHERE correo_recolector = correoUsuarioBuscar;
        IF correo_encontrado IS NOT NULL THEN
            SELECT correo_encontrado AS correo;
        END IF;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarIdRecolectorPorNombre` (IN `nombreRecolectorParam` VARCHAR(45))   BEGIN
    DECLARE idRecolectorResult INT;

    SELECT id_recolector INTO idRecolectorResult
    FROM recolector
    WHERE nombre_recolector = nombreRecolectorParam;

    SELECT idRecolectorResult;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarPorCorreoUsuario` (IN `correoUsuarioBuscar` VARCHAR(45))   BEGIN
    SELECT * FROM usuarios WHERE correo_usuario = correoUsuarioBuscar;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarPorNombreUsuario` (IN `nombreUsuarioBuscar` VARCHAR(45))   BEGIN
    SELECT * FROM usuarios WHERE nombre_usuario = nombreUsuarioBuscar;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarPorTelefonoUsuario` (IN `telefonoUsuarioBuscar` VARCHAR(45))   BEGIN
    SELECT * FROM usuarios WHERE telefono_usuario = telefonoUsuarioBuscar;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarRecolector` (IN `recolector` VARCHAR(45), IN `con` VARCHAR(45))   BEGIN
    SELECT * FROM recolector 
    WHERE (recolector = correo_recolector OR telefono_recolector = recolector)
    AND con = contraseña_recolector AND status_recolector=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarRecolectorPorCorreo` (IN `correoRecolector` VARCHAR(45))   BEGIN
    SELECT * FROM recolector WHERE correo_recolector = correoRecolector;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarRecolectorPorNombre` (IN `nombreRecolector` VARCHAR(45))   BEGIN
    SELECT * FROM recolector WHERE nombre_recolector = nombreRecolector;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarRecolectorPorTelefono` (IN `telefonoRecolector` VARCHAR(45))   BEGIN
    SELECT * FROM recolector WHERE telefono_recolector = telefonoRecolector;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarRecuperarContrasena` (IN `p_correo_recuperar` VARCHAR(45), IN `p_token_recuperar` VARCHAR(45), IN `p_codigo_recuperar` INT)   BEGIN
    SELECT * FROM recuperarcontraseña 
    WHERE correo_recuperar = p_correo_recuperar 
    AND token_recuperar = p_token_recuperar 
    AND codigo_recuperar = p_codigo_recuperar;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarTelefono` (IN `telefonoUsuarioBuscar` VARCHAR(45))   BEGIN
    DECLARE telefono_encontrado VARCHAR(45);

    -- Buscar en la tabla usuarios
    SELECT telefono_usuario INTO telefono_encontrado FROM usuarios WHERE telefono_usuario = telefonoUsuarioBuscar;

    IF telefono_encontrado IS NOT NULL THEN
        SELECT telefono_encontrado AS telefono;
    ELSE
        -- Si no se encuentra en usuarios, buscar en recolector
        SELECT telefono_recolector INTO telefono_encontrado FROM recolector WHERE telefono_recolector = telefonoUsuarioBuscar;
        IF telefono_encontrado IS NOT NULL THEN
            SELECT telefono_encontrado AS telefono;
        END IF;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarUsuario` (IN `usuario` VARCHAR(45), IN `con` VARCHAR(45))   BEGIN
      SELECT * FROM usuarios 
    WHERE (usuario = correo_usuario OR telefono_usuario=usuario) 
    AND con = contraseña_usuario;
   
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiarCon` (IN `correo` VARCHAR(45), IN `nueva` VARCHAR(45))   BEGIN
    DECLARE encontrado_usuario INT;
    DECLARE encontrado_recolector INT;

    SELECT COUNT(*) INTO encontrado_usuario FROM usuarios WHERE correo_usuario = correo;

    IF encontrado_usuario = 0 THEN
        SELECT COUNT(*) INTO encontrado_recolector FROM recolector WHERE correo_recolector = correo;

        IF encontrado_recolector = 1 THEN
            UPDATE recolector SET contraseña_recolector = nueva WHERE correo_recolector = correo;
        END IF;
    ELSE
        UPDATE usuarios SET contraseña_usuario = nueva WHERE correo_usuario = correo;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CambiarContrasenaUsuario` (IN `p_correo_usuario` VARCHAR(45), IN `p_nueva_contrasena` VARCHAR(45))   BEGIN
    UPDATE usuarios 
    SET contraseña_usuario = p_nueva_contrasena 
    WHERE correo_usuario = p_correo_usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetPointsByUserEmail` (IN `userEmail` VARCHAR(255), OUT `userPoints` INT)   BEGIN
    DECLARE userId INT;
    
    -- Busca el ID de usuario basado en el correo electrónico
    SELECT id_usuario INTO userId
    FROM usuarios
    WHERE correo_usuario = userEmail;
    
    -- Si se encontró el usuario, obtiene sus puntos
    IF userId IS NOT NULL THEN
        SELECT puntos_usuario INTO userPoints
        FROM usuarios
        WHERE id_usuario = userId;
    ELSE
        -- Si no se encontró el usuario, establece los puntos en 0
        SET userPoints = 0;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetRecolectorId` (IN `p_correo` VARCHAR(45), IN `p_telefono` VARCHAR(45))   BEGIN
    DECLARE v_id_recolector INT;

    SELECT id_recolector INTO v_id_recolector 
    FROM recolector 
    WHERE correo_recolector = p_correo OR telefono_recolector = p_telefono;

    IF v_id_recolector IS NOT NULL THEN
        SELECT v_id_recolector AS id_recolector;
    ELSE
        SELECT 'No se encontró ningún recolector con el correo o teléfono proporcionado.' AS message;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUsuarioId` (IN `p_correo` VARCHAR(255), IN `p_telefono` VARCHAR(255))   BEGIN
    DECLARE v_id_usuario INT; -- Variable para almacenar el id del usuario si se encuentra

    -- Buscar el usuario con el correo o teléfono proporcionado
    SELECT id_usuario INTO v_id_usuario
    FROM usuarios
    WHERE correo_usuario = p_correo OR telefono_usuario = p_telefono;

    -- Verificar si se encontró un usuario
    IF v_id_usuario IS NOT NULL THEN
        -- Devolver el id del usuario si se encuentra
        SELECT v_id_usuario AS id_usuario;
    ELSE
        -- Devolver un mensaje si no se encuentra ningún usuario
        SELECT 'No se encontró ningún usuario con el correo o teléfono proporcionado.' AS message;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarComentario` (IN `p_comentario` VARCHAR(500), IN `p_telefono` VARCHAR(10), IN `p_correo` VARCHAR(100))   BEGIN
    INSERT INTO comentarios (comentario, telefono, correo)
    VALUES (p_comentario, p_telefono, p_correo);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarRecolector` (IN `p_nombre_recolector` VARCHAR(45), IN `p_edad_recolector` INT, IN `p_licenciaConducir_recolector` VARCHAR(200), IN `p_cedula_recolector` VARCHAR(200), IN `p_correo_recolector` VARCHAR(45), IN `p_telefono_recolector` VARCHAR(45), IN `p_contraseña_recolector` VARCHAR(45), IN `p_status_recolector` INT)   BEGIN
    INSERT INTO recolector (nombre_recolector, edad_recolector, licenciaConducir_recolector, cedula_recolector, correo_recolector, telefono_recolector, contraseña_recolector, status_recolector)
    VALUES (p_nombre_recolector, p_edad_recolector, p_licenciaConducir_recolector, p_cedula_recolector, p_correo_recolector, p_telefono_recolector, p_contraseña_recolector, p_status_recolector);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarRecuperarContrasena` (IN `p_correo_recuperar` VARCHAR(45), IN `p_token_recuperar` VARCHAR(45), IN `p_codigo_recuperar` INT)   BEGIN
    INSERT INTO recuperarcontraseña (correo_recuperar, token_recuperar, codigo_recuperar)
    VALUES (p_correo_recuperar, p_token_recuperar, p_codigo_recuperar);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarUsuario` (IN `p_nombre_usuario` VARCHAR(45), IN `p_correo_usuario` VARCHAR(45), IN `p_telefono_usuario` VARCHAR(45), IN `p_contraseña_usuario` VARCHAR(45), IN `p_puntos_usuario` INT)   BEGIN
    INSERT INTO usuarios (nombre_usuario,correo_usuario, telefono_usuario, contraseña_usuario, puntos_usuario)
    VALUES (p_nombre_usuario, p_correo_usuario, p_telefono_usuario, p_contraseña_usuario, p_puntos_usuario);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertNegocio` (IN `nombreNegocio` VARCHAR(255), IN `latitud` DECIMAL(10,6), IN `longitud` DECIMAL(10,6), IN `idUsuario` INT)   BEGIN
    INSERT INTO negocio (nombre_negocio, latitud, longitud, id_usuario)
    VALUES (nombreNegocio, latitud, longitud, idUsuario);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertRecolecta` (IN `nombreUsuario` VARCHAR(45), IN `cantidad` INT, IN `direccion` VARCHAR(45), IN `status` TINYINT, IN `id_usuario` INT)   BEGIN
    INSERT INTO recolecta (nombreUsuario_recolecta, cantidad_recolecta, direccion_recolecta, status_recolecta,id_usuario) 
    VALUES (nombreUsuario, cantidad, direccion, status,id_usuario);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificar_puntos_usuario` (IN `id_usuario_param` INT, IN `nuevos_puntos_param` INT)   BEGIN
    UPDATE usuarios
    SET puntos_usuario = nuevos_puntos_param
    WHERE id_usuario = id_usuario_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarRecolecta` ()   BEGIN
    SELECT id_recolecta, nombreUsuario_recolecta, cantidad_recolecta, direccion_recolecta, fecha_recolecta, status_recolecta 
    FROM recolecta 
    WHERE status_recolecta = 0 
    AND id_recolecta NOT IN (SELECT id_recolecta FROM asignacion_recolecta WHERE id_recolecta IS NOT NULL);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerCorreoYNombre` (IN `recolector_id` INT)   BEGIN
  DECLARE nombre_recolector_var VARCHAR(45);
  DECLARE correo_recolector_var VARCHAR(45);

  -- Seleccionar el nombre y correo del recolector con el ID proporcionado
  SELECT nombre_recolector, correo_recolector
  INTO nombre_recolector_var, correo_recolector_var
  FROM recolector
  WHERE id_recolector = recolector_id;

  -- Verificar si se encontró un recolector con el ID dado
  IF nombre_recolector_var IS NOT NULL AND correo_recolector_var IS NOT NULL THEN
    -- Devolver los resultados
    SELECT nombre_recolector_var AS nombre, correo_recolector_var AS correo;
  ELSE
    -- Devolver un mensaje de error si no se encontró el recolector
    SELECT 'Recolector no encontrado' AS mensaje;
  END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerDatosRecolector` (IN `nombreRecolector` VARCHAR(100))   BEGIN
    SELECT nombre_recolector, correo_recolector, telefono_recolector, status_recolector 
    FROM recolector 
    WHERE nombre_recolector = nombreRecolector;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_id_usuario` (IN `id_recolecta_param` INT)   BEGIN
  SELECT id_usuario FROM recolecta WHERE id_recolecta = id_recolecta_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_puntos_usuario` (IN `id_usuario_param` INT)   BEGIN
  SELECT puntos_usuario FROM usuarios WHERE id_usuario = id_usuario_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recolectas_completas` (IN `p_id_recolector` INT)   BEGIN
    SELECT r.nombreUsuario_recolecta, r.fecha_recolecta, r.status_recolecta
    FROM asignacion_recolecta a
    INNER JOIN recolecta r ON a.id_recolecta = r.id_recolecta
    WHERE a.id_recolector = p_id_recolector AND r.status_recolecta = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recolectas_id` (IN `p_id_recolector` INT)   BEGIN
    SELECT r.id_recolecta, r.nombreUsuario_recolecta, r.cantidad_recolecta, r.direccion_recolecta, r.fecha_recolecta, r.status_recolecta
    FROM asignacion_recolecta a
    INNER JOIN recolecta r ON a.id_recolecta = r.id_recolecta
    WHERE a.id_recolector = p_id_recolector AND r.status_recolecta = 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `seleccionarInfoUsuarios` ()   BEGIN
    SELECT nombre_usuario, correo_usuario, telefono_usuario FROM usuarios;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateUserPoints` (IN `userEmail` VARCHAR(255), IN `updatedPoints` INT)   BEGIN
    DECLARE userId INT;

    -- Obtiene el ID del usuario basado en el correo electrónico
    SELECT id_usuario INTO userId FROM usuarios WHERE correo_usuario = userEmail;

    -- Actualiza los puntos del usuario
    UPDATE usuarios SET puntos_usuario = updatedPoints WHERE id_usuario = userId;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `usuario_admin` varchar(45) NOT NULL,
  `contraseña_admin` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `usuario_admin`, `contraseña_admin`) VALUES
(1, 'Paco', '12345'),
(2, 'Delos', '54321'),
(3, 'Heber', '67891'),
(4, 'Ryan', '19876');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_recolecta`
--

CREATE TABLE `asignacion_recolecta` (
  `id_asignacion` int(11) NOT NULL,
  `id_recolecta` int(11) NOT NULL,
  `id_recolector` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

CREATE TABLE `negocio` (
  `id_negocio` int(11) NOT NULL,
  `nombre_negocio` varchar(255) NOT NULL,
  `latitud` decimal(10,6) DEFAULT NULL,
  `longitud` decimal(10,6) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recolecta`
--

CREATE TABLE `recolecta` (
  `id_recolecta` int(11) NOT NULL,
  `nombreUsuario_recolecta` varchar(45) NOT NULL,
  `cantidad_recolecta` int(11) NOT NULL,
  `direccion_recolecta` varchar(45) NOT NULL,
  `fecha_recolecta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_recolecta` tinyint(1) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recolector`
--

CREATE TABLE `recolector` (
  `id_recolector` int(11) NOT NULL,
  `nombre_recolector` varchar(45) NOT NULL,
  `edad_recolector` int(11) NOT NULL,
  `licenciaConducir_recolector` varchar(200) NOT NULL,
  `cedula_recolector` varchar(200) NOT NULL,
  `correo_recolector` varchar(45) NOT NULL,
  `telefono_recolector` varchar(45) NOT NULL,
  `contraseña_recolector` varchar(45) NOT NULL,
  `status_recolector` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperarcontraseña`
--

CREATE TABLE `recuperarcontraseña` (
  `id_recuperar` int(11) NOT NULL,
  `correo_recuperar` varchar(45) NOT NULL,
  `token_recuperar` varchar(45) NOT NULL,
  `codigo_recuperar` int(11) NOT NULL,
  `fecha_recuperar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(45) NOT NULL,
  `correo_usuario` varchar(45) NOT NULL,
  `telefono_usuario` varchar(45) NOT NULL,
  `contraseña_usuario` varchar(45) NOT NULL,
  `puntos_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `asignacion_recolecta`
--
ALTER TABLE `asignacion_recolecta`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `fk_asignacion_recolecta_recolecta` (`id_recolecta`),
  ADD KEY `fk_asignacion_recolecta_recolector` (`id_recolector`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`id_negocio`),
  ADD KEY `fk_negocio_usuario` (`id_usuario`);

--
-- Indices de la tabla `recolecta`
--
ALTER TABLE `recolecta`
  ADD PRIMARY KEY (`id_recolecta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `recolector`
--
ALTER TABLE `recolector`
  ADD PRIMARY KEY (`id_recolector`);

--
-- Indices de la tabla `recuperarcontraseña`
--
ALTER TABLE `recuperarcontraseña`
  ADD PRIMARY KEY (`id_recuperar`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `asignacion_recolecta`
--
ALTER TABLE `asignacion_recolecta`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `negocio`
--
ALTER TABLE `negocio`
  MODIFY `id_negocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `recolecta`
--
ALTER TABLE `recolecta`
  MODIFY `id_recolecta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `recolector`
--
ALTER TABLE `recolector`
  MODIFY `id_recolector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `recuperarcontraseña`
--
ALTER TABLE `recuperarcontraseña`
  MODIFY `id_recuperar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion_recolecta`
--
ALTER TABLE `asignacion_recolecta`
  ADD CONSTRAINT `fk_asignacion_recolecta_recolecta` FOREIGN KEY (`id_recolecta`) REFERENCES `recolecta` (`id_recolecta`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_asignacion_recolecta_recolector` FOREIGN KEY (`id_recolector`) REFERENCES `recolector` (`id_recolector`) ON DELETE CASCADE;

--
-- Filtros para la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD CONSTRAINT `fk_negocio_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `recolecta`
--
ALTER TABLE `recolecta`
  ADD CONSTRAINT `recolecta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

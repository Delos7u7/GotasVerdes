<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresa tus datos para registrarte</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/registro.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Nunito:wght@500;600&display=swap"
        rel="stylesheet">

    <link rel="icon" href="../Index/icc-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i></label>
            <a href="../../index.html" class="enlace"><span>Gotas</span>Verdes</a>
            <ul class="XD mostrar">
                <li><a class="active" href="../../index.html">Inicio</a></li>
                <li><a href="../invitado/mapaInvitado.php">Mapa</a></li>
                <li><a href="../invitado/tiendaInvitado.php">Tienda</a></li>
                <li><a href="../invitado/saberMasInvitado.html">Saber más</a></li>
            </ul>
        </nav>
    </header>
    <div class="wrapper">
        <div class="form-box registerRec">
            <h2>Registrate</h2>
            <div class="input-box">
                <label for="nombre-usuario">
                    Nombre completo
                </label>
                <p>Nombre del recolector</p>
            </div>
            <div class="input-box item1">
                <label for="nombre-negocio">
                    Edad
                </label>
                <p>Edad del repartidor mayor a 18 años</p>
            </div>
            <div class="input-box item2">
                <label for="direccion-negocio">
                    Documento de identidad
                </label>
                <p>Cédula de identidad, Licencia de conducir</p>
            </div>
            <div class="input-box item3">
                <label for="correo-electronico">
                    Correo electrónico
                </label>
                <p>Recibir informacion de la app</p>
            </div>
            <div class="input-box item4">
                <label for="telefono">
                    Teléfono
                </label>
                <p>Teléfono por el cual te podemos contactar</p>
            </div>
            <div class="input-box item5">
                <label for="contrasena">
                    Contraseña
                </label>
                <p>Mantener segura tu cuenta</p>
            </div>
            <button type="button" class="btn">Comenzar Ya</button>
            <div class="link">
                <p>
                    ¿Ya tienes una cuenta? <a href="../login/login.html">Inicia sesión</a>
                </p>
            </div>
        </div>
        <div class="conteiner">
            <form action="../../Controlador/ctrlRegistroRecolector.php" method="POST" enctype="multipart/form-data">
                <div class="form-box nombre">
                    <h2 class="ht">Registrate</h2>
                    <div class="input-box">
                        <span></span>
                        <label class="stilo_l">Nombre completo </label>
                        <p class="stilo_p">Ingresa tu nombre completo</p>
                        <input class="inp" type="text" name="nom_recolector" placeholder=" Ingresa tu nombre completo">
                    </div>
                    <button type="button" class="btn xd" id="btn1">Continuar</button>
                </div>
                <div class="form-box edad">
                    <h2 class="ht">Registrate</h2>
                    <div class="input-box">
                        <span></span>
                        <label class="stilo_l">Edad</label>
                        <p class="stilo_p">Introduce tu edad</p>
                        <input class="inp" type="text" id="edadInput" name="eda_recolector"
                            placeholder=" Ingresa tu edad" maxlength="2">
                        <div id="edadMensaje" style="color: red;"></div>
                    </div>
                    <button type="button" class="btn xd" id="btn2">Continuar</button>
                </div>
                <div class="form-box doc">
                    <h2 class="ht">Documentos de identidad</h2>
                    <div class="input-box">
                        <span></span>
                        <label class="stilo_l">Cédula de identidad</label>
                        <p class="stilo_p">Introduce tu cédula de identidad</p>
                        <input type="file" id="cedula-file" name="ced_recolector" onchange="checkUploads()">
                    </div>
                    <div class="input-box">
                        <span></span>
                        <label class="stilo_l">Licencia de conducir</label>
                        <p class="stilo_p">Introduce tu licencia de conducir</p>
                        <input type="file" id="licencia-file" name="lic_recolector" onchange="checkUploads()">
                    </div>
                    <button type="button" class="btn xd" id="btn3" disabled>Continuar</button>
                </div>
                <div class="form-box correo">
                    <h2 class="ht">Registrate</h2>
                    <div class="input-box">
                        <span></span>
                        <label class="stilo_l">Correo electrónico</label>
                        <p class="stilo_p">Ingresa tucorreo electrónico</p>
                        <input class="inp" type="email" name="cor_recolector"
                            placeholder=" Ingresa tu correo electrónico" id="correo">
                            <p id="error-msg" style="color: red; display: none;">Por favor, ingresa un correo electrónico válido.</p>
                           <p id="error-msg-correo" style="color: red; display: none;">El correo electrónico ya está en uso. Por favor, ingresa otro correo electrónico.</p>

                    </div>
                    <button type="button" class="btn xd" id="btn4">Continuar</button>
                </div>
                <div class="form-box telef">
                    <h2 class="ht">Registrate</h2>
                    <div class="input-box">
                        <span></span>
                        <label class="stilo_l">Teléfono </label>
                        <p class="stilo_p">Ingresa tu número de teléfono</p>
                        <input class="inp" type="text" name="tel_recolector"
                            placeholder=" Ingresa tu número de teléfono" maxlength="10">
                            <p id="error-msg3" style="color: red; display: none;">Este teléfono ya está en uso. Por favor, elige otro teléfono.</p>

                    </div>
                    <button type="button" class="btn xd" id="btn5">Continuar</button>
                </div>
                <div class="form-box pass">
                    <h2 class="ht">Regístrate</h2>
                    <div class="input-box" style="margin-bottom: 40px;">
                        <span></span>
                        <label class="stilo_l">Contraseña</label>
                        <p class="stilo_p">Ingresa tu contraseña</p>
                        <input class="inp" type="password" id="password" name="pas_recolector"
                            placeholder="Ingresa tu contraseña">
                            <p id="error-msg4" style="color: red; display: none;">Contraseña minima de 8 carácteres</p>
                    </div>
                    <div class="input-box">
                        <label class="stilo_l">Confirmar contraseña</label>
                        <p class="stilo_p">Confirma la contraseña ingresada</p>
                        <input class="inp" type="password" id="confirmPassword" placeholder="Confirma la contraseña">
                    </div>
                    <p id="message" style="color: red;"></p>
                    <button type="submit" class="btn xd" id="submitButton" disabled>Continuar</button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <div class="footer-section">
            <div class="up-footer--container">
                <ul>
                    <li class="footer-sidebar--socialmedia"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                            height="20" fill="white" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg></li>
                    <li class="footer-sidebar--socialmedia"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                            height="20" fill="white" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg></li>
                    <li class="footer-sidebar--socialmedia"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                            height="20" fill="white" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                        </svg></li>
                    <li class="footer-sidebar--socialmedia"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                            height="20" fill="white" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                        </svg></li>
                </ul>
            </div>

            <div class="down-footer--container">
                <p>Términos y condiciones</p>
                <p>Avisos de privacidad </p>
                <span class="down-footer--logo"></span>
            </div>
        </div>
    </footer>
    <script src="../js/recolectores.js"></script>
    <script src="../js/restricciones_recolectores.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Inicio - KidSchool</title>
  <link rel="stylesheet" href="/publics/css/style.css">
</head>

<body>
  <header>
    <img src="/publics/img/LOGO2.png" alt="Logo KidSchool" width="100" />
    KidSchool
  </header>

  <section class="main-section">
    <!-- Izquierda: Bienvenida -->
    <div class="left-side">
      <div class="welcome-content">
        <div class="text">
          <h1>Bienvenido a KidSchool</h1>
          <p>Formamos el futuro con alegría, innovación y compromiso.</p>
        </div>
        <img src="/publics/img/LOGO.png" alt="Logo KidSchool" width="400" />
      </div>
    </div>

    <!-- Derecha: Login y Registro -->
    <div class="right-side">
      <!-- Login -->
      <div class="form-box" id="login-box">
        <!-- Vista inicial con selección -->
        <div id="user-selection">
          <h2>¿Quién eres?</h2>
          <div class="user-type">
            <div class="option">
              <div class="img-fondo">
                <img src="/publics/img/PROFESORES.png" alt="Docente">
              </div>
              <button onclick="mostrarLogin('docente')">Docentes</button>
            </div>
            <div class="option">
              <div class="img-fondo">
                <img src="/publics/img/ESTUDIANTES.png" alt="Estudiante">
              </div>
              <button onclick="mostrarLogin('estudiante')">Estudiantes</button>
            </div>
          </div>
        </div>

        <!-- Login Docente -->
        <div class="form-box" id="login-docente" style="display: none;">
          <h2>Login Docente</h2>
          <form action="controller/login.php" method="POST">
            <input type="email" name="correo" placeholder="Correo electrónico" required />
            <input type="password" name="contraseña" placeholder="Contraseña" required />
            <button type="submit">Ingresar</button>
          </form>
          <a class="register-link go-to-register">¿No tienes cuenta? Regístrate aquí</a>
          <span class="back-link" onclick="volver()">Volver</span>
        </div>

        <!-- Login Estudiante -->
        <div class="form-box" id="login-estudiante" style="display: none;">
          <h2>Login Estudiante</h2>
          <form action="login.php" method="POST">
            <input type="email" name="correo" placeholder="Correo electrónico" required />
            <input type="password" name="contrasena" placeholder="Contraseña" required />
            <button type="submit">Ingresar</button>
          </form>
          <a class="register-link go-to-register">¿No tienes cuenta? Regístrate aquí</a>
          <span class="back-link" onclick="volver()">Volver</span>
        </div>

        <!-- Registro (oculto inicialmente) -->
        <div class="form-box" id="register-box" style="display:none;">
          <h2>Registro</h2>
          <form action="controller/registro.php" method="POST">
            <input type="hidden" name="estado" value="1">
            <input type="text" name="nombre_usuario" placeholder="Nombre de usuario" maxlength="100" required />

            <input type="number" name="documento" placeholder="Documento" maxlength="50" required />

            <input type="email" name="correo" placeholder="Correo electrónico" maxlength="100" required />

            <input type="password" name="contraseña" placeholder="Contraseña" maxlength="255" required />

            <input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required />

            <select name="genero" required>
              <option value="" disabled selected>Género</option>
              <option value="masculino">Masculino</option>
              <option value="femenino">Femenino</option>
              <option value="prefiero_no_decirlo">Prefiero no decirlo</option>
            </select>

            <select name="id_tipo_usuario" required>


              <option value="" disabled selected>Tipo de usuario</option>


              <option value="1">Docente</option>


              <option value="2">Estudiante</option>



            </select>



            <button type="submit" name="fEnviar" value="insertar">Registrar</button>
          </form>
          <span class="back-link" onclick="volver()">Volver</span>
        </div>
      </div>

      <div id="errorModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; 
      background: rgba(0,0,0,0.5); z-index: 9999; justify-content:center; align-items:center;">
        <div style="background:white; padding: 25px 35px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.3); max-width: 320px; text-align:center;">
          <h3 style="color: #d9534f; margin-bottom: 15px;">Error</h3>
          <p>Contraseña incorrecta. Por favor, inténtalo de nuevo.</p>
          <button onclick="cerrarModalError()" style="margin-top:15px; padding: 10px 20px; background:#d9534f; border:none; color:white; border-radius: 8px; cursor:pointer;">Cerrar</button>
        </div>
      </div>
  </section>
  <script src="/publics/js/script.js"></script>

</body>

</html>
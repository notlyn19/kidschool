document.addEventListener("DOMContentLoaded", function () {
    const registerLinks = document.querySelectorAll(".go-to-register");
    const loginDocente = document.getElementById("login-docente");
    const loginEstudiante = document.getElementById("login-estudiante");
    const userSelection = document.getElementById("user-selection");
    const registerBox = document.getElementById("register-box");

    registerLinks.forEach(link => {
      link.addEventListener("click", function (e) {
        e.preventDefault();
        loginDocente.style.display = "none";
        loginEstudiante.style.display = "none";
        userSelection.style.display = "none";
        registerBox.style.display = "block";
      });
    });
  });

  function mostrarLogin(tipo) {
    document.getElementById('user-selection').style.display = 'none';
    if (tipo === 'docente') {
      document.getElementById('login-docente').style.display = 'block';
      document.getElementById('login-estudiante').style.display = 'none';
    } else {
      document.getElementById('login-estudiante').style.display = 'block';
      document.getElementById('login-docente').style.display = 'none';
    }
    document.getElementById('register-box').style.display = 'none';
  }

  function volver() {
    document.getElementById('login-docente').style.display = 'none';
    document.getElementById('login-estudiante').style.display = 'none';
    document.getElementById('register-box').style.display = 'none';
    document.getElementById('user-selection').style.display = 'block';
  }

  function ingresarEstudiante() {
    // Aquí puedes hacer validaciones si lo deseas
    // Luego redireccionas:
    window.location.href = 'panel_estudiante.html'; // Cambia por tu archivo real
  }
 function cerrarModalError() {
  document.getElementById('errorModal').style.display = 'none';
}

document.addEventListener("DOMContentLoaded", function () {
  // Mostrar modal si está el parámetro error=1 en la URL
  const params = new URLSearchParams(window.location.search);
  if (params.get('error') === '1') {
    document.getElementById('errorModal').style.display = 'flex';
  }
});


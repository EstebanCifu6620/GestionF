document.addEventListener("DOMContentLoaded", function () {
    const inputTelefono = document.getElementById('telefono');
    const inputPassword1 = document.getElementById('contrasena');
    const inputPassword2 = document.getElementById('rcontrasena');
    const form = document.getElementById('register');



    const validarTelefono = () => {
        inputTelefono.value = inputTelefono.value.replace(/\D/g, '');
    };
    
    const validarPassword2 = () => {
        if (inputPassword1.value !== inputPassword2.value) {
            console.log("Las contraseñas no coinciden");
            document.getElementById('msgUserExist').textContent = "Las contraseñas no coinciden";
        } else {
            console.log("Las contraseñas coinciden");
            document.getElementById('msgUserExist').textContent = "";
        }
    };

    inputTelefono.addEventListener('input', validarTelefono);
    inputPassword1.addEventListener('keyup', validarPassword2);
    inputPassword2.addEventListener('keyup', validarPassword2);
    inputPassword1.addEventListener('blur', validarPassword2);
    inputPassword2.addEventListener('blur', validarPassword2);

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        if (inputPassword1.value !== inputPassword2.value) {
            document.getElementById('msgUserExist').textContent = "Las contraseñas no coinciden";
        } else {
            document.getElementById('msgUserExist').textContent = "";
            form.submit();
        }
    });
});

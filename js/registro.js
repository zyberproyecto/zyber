document.getElementById("registroForm").addEventListener("submit", function (e) {
	e.preventDefault();

	const password = document.getElementById("password").value;
	const confirmPassword = document.getElementById("confirm_password").value;

	if (password !== confirmPassword) {
		document.getElementById("error").innerText = "Las contraseñas no coinciden";
		return;
	}

	const formData = {
		ci_usuario: document.getElementById("ci_usuario").value,
		primer_nombre: document.getElementById("primer_nombre").value,
		segundo_nombre: document.getElementById("segundo_nombre").value,
		primer_apellido: document.getElementById("primer_apellido").value,
		segundo_apellido: document.getElementById("segundo_apellido").value,
		password: password,
		confirm_password: confirmPassword,
	};

	axios.post("http://localhost:8000/registro", formData)
		.then((res) => {
			if (res.data.success) {
				alert(res.data.message);
				window.location.href = "/registro";
			} else {
				document.getElementById("error").innerText = res.data.message;
			}
		})
		.catch((err) => {
			if (err.response && err.response.data && err.response.data.message) {
				document.getElementById("error").innerText = err.response.data.message;
			} else {
				document.getElementById("error").innerText = "Error de red o servidor";
			}
		});
		    document.getElementById('registroForm').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;

        if (password !== confirmPassword) {
            e.preventDefault();
            document.getElementById('error').textContent = 'Las contraseñas no coinciden';
        }
    });
		
});
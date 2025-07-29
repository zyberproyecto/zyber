document.getElementById("loginForm").addEventListener("submit", function (e) {
	e.preventDefault();
	axios.post("http://localhost:8000/login", {
		usuario: document.getElementById("usuario").value,
		password: document.getElementById("password").value,
	})
		.then((res) => {
			if (res.data.success) {
				window.location.href = "/";
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
});
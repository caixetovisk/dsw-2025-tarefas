const login = document.getElementById("login");
const senha = document.getElementById("senha");
const msg_erro = document.getElementById("msg-erro");
const btnEntrar = document.getElementById("entrar");

if (btnEntrar) {
  btnEntrar.onclick = () => {
    const endpoint = "http://localhost:8080/login";

    const parametros = {
      login: login.value,
      senha: senha.value,
    };

    fetch(endpoint, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(parametros),
    })
      .then((response) => response.json())
      .then((response) => {
        if (response.status == false) {
          msg_erro.style.display = "block";
          return;
        }

        window.location.assign("/home");
      })
      .catch((error) => console.error(error));
  };
}

// cadastra usuario

const btn_cadastrar_usuario = document.getElementById("btn_cadastrar_usuario");

if (btn_cadastrar_usuario) {
  btn_cadastrar_usuario.onclick = () => {
    const endpoint = "http://localhost:8080/usuario";
    const form = document.getElementById("cadastrar_usuario");

    if (!form) {
      alert("Formulário não encontrado!");
      return;
    }

    //Pega os campos e valores preenchidos do formulario
    const formData = new FormData(form);
    const dados = Object.fromEntries(formData.entries());

    fetch(endpoint, {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: new URLSearchParams(dados),
    })
      .then(async (response) => {
        if (response.ok) {
          window.location.assign("/");
          return;
        }

        const errorData = await response.json();
        throw new Error(errorData.message || "Erro ao processar a requisição");
      })
      .catch((error) => {
        msg_erro.style.display = "block";
        msg_erro.innerText = error.message;
      });
  };
}

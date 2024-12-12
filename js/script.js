
//CAPTURA O FORMULÁRIO DO ARQUIVO cadastroUsu.php
const formularioCadUsu = document.getElementById("formCadNewUsu");

formulario.addEventListener("submit", function(event) {

// CAPTURA O ELEMENTO DE CAMPO DE TEXTO DO ARQUIVO cadastroUsu.php
let senha = document.getElementById("fieldSenha").value;

//REGEX
const regex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

// VERIFICA SE A SENHA É VÁLIDA 

if (!regex.test(senha)) {
    event.preventDefault();
    alert("A senha precisa possuir 8 caracteres e ser composta de letras, números e caracteres especiais(!, ?, - e etc.");
} else {
    alert("Senha Válida")
}
});

//NÃO ESTÁ FUNCIONANDO CORRETAMENTE
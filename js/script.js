// CAPTURA OS ELEMENTOS DO ARQUIVO index.php
let senha = document.getElementById("fieldSenha").value;
const formulario = document.getElementById("formCadNewUsu");

//REGEX
regex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

// VERIFICA SE A SENHA É VÁLIDA 

if (regex.test(senha)) {
    alert("Senha Válida");
} else {
    alert("A senha precisa possuir 8 caracteres e ser composta de letras, números e caracteres especiais(!, ?, - e etc.)")
}
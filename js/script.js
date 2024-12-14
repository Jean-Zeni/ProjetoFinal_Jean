function validarSenha(){
    const senha = document.getElementById("fieldSenha").value;
    const regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/;

    if(!regex.test(senha)){
        return false;
    }
    return true;
}

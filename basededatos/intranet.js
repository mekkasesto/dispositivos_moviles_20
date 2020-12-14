function validacion(){

name = document.getElementById("name").value;
    if (name.length==0){
        inicio.username.focus()
        alert("[ERROR] Tiene que escribir su nombre de usuario.");
        return false;
   }
pass = document.getElementById("pass").value;
   if (pass.length==0){
       inicio.password.focus()
       alert("[ERROR] Favor de escribir una contraseña.");
       return false;
   }

inicio.submit();
}
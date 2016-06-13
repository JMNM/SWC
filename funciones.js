/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



//    
//    
//    

    function nombre(){
        var filtro = /[A-Za-z]/;
        
        var campoUno = document.getElementById("nombre").value;
        
        if((!campoUno.match(filtro)) || campoUno == null || campoUno.length > 20){
            alert('El campo no puede estar vacio o el nombre solo puede contener caracteres y no puede tener mas de 20 caracteres');
        }
    }
    
    function apellido(){
        var filtro = /[A-Za-z]/;
        var campoDos = document.getElementById("apellidos").value;
        
        if((!campoDos.match(filtro)) || campoDos == null || campoDos.length > 40){
           alert('El campo no puede estar vacio o apellidos solo puede contener caracteres y no puede tener mas de 40 caracteres');
        }
    }
    function nickName(){
        var campoCuatro = document.getElementById("nickname").value;
        var filtroNick = /^[A-Za-z0-9_]{6,20}$/;
        
        if((!campoCuatro.match(filtroNick)) || campoCuatro == null || campoCuatro.length > 20){
            alert('El campo no puede estar vacio o Nick-name solo puede contener los caracteres ( A-Z, a-z 0-9, _ )  y no puede tener mas de 20 caracteres');
        }
    }
    
    
    function contrasenia(){
        var filtrocontrasenia = /^[A-Za-z0-9_]{6,20}$/;
        var campoCinco = document.getElementById("contrasenia").value;
        
        if((!campoCinco.match(filtrocontrasenia)) || campoCinco == null){
            alert('La contraseña debe contener: A-Za-z0-9 min_caracteres: 6,max_caracteres20');
        }
    }
    
    function confirmaContrasenia(){
        var campoSeis = document.getElementById("confirmacontrasenia").value;
  
        if(campoCinco != campoSeis){
            alert('Las contraseñas no coinciden');
        }
    }
    
    function email(){
        
        var filtroEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;   
    
        
        var campoSiete = document.getElementById("email").value;
        if (!filtroEmail.test(campoSiete)){
            alert("Error: La dirección de correo es incorrecta.");
        }
    }
    function nombreRecurso(){
        var filtro = /[A-Za-z]/;
        
        var campoUno = document.getElementById("nombreRecurso").value;
        
        if((!campoUno.match(filtro)) || campoUno == null || campoUno.length > 20){
            alert('El campo no puede estar vacio o el nombre solo puede contener caracteres y no puede tener mas de 20 caracteres');
        }
    }
    
    function nombreProfesor(){
        var filtro = /[A-Za-z]/;
        var campoDos = document.getElementById("nombreProfesor").value;
        
        if((!campoDos.match(filtro)) || campoDos == null || campoDos.length > 40){
           alert('El campo no puede estar vacio o apellidos solo puede contener caracteres y no puede tener mas de 40 caracteres');
        }
    }
    
    function codigo(){
        var filtro = /[A-Za-z0-9]/;
        var campoDos = document.getElementById("codigo").value;
        
        if((!campoDos.match(filtro)) || campoDos == null || campoDos.length > 20){
           alert('El campo no puede estar vacio o apellidos solo puede contener caracteres y no puede tener mas de 40 caracteres');
        }
    }
    
    

function nif(dni) {
    var numero;
    var letr;
    var letra;
    var expresion_regular_dni;

    expresion_regular_dni = /^\d{8}[a-zA-Z]$/;

    if(expresion_regular_dni.test (dni) == true){
       numero = dni.substr(0,dni.length-1);
       letr = dni.substr(dni.length-1,1);
       numero = numero % 23;
       letra='TRWAGMYFPDXBNJZSQVHLCKET';
       letra=letra.substring(numero,numero+1);
      if (letra!=letr.toUpperCase()) {
         return false;
       }else{
         return true;
       }
    }else{
       return false;
     }
 }
 
 function validarDni(){
   
    var campoTres = document.getElementById("dni").value;
    
    if((!(nif(campoTres)) || campoTres == null)){
        alert('Dni erroneo, la letra del NIF no se corresponde');
        return false;
    }
    return true;
 }
 
 
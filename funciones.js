/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



//    
//    
//    

    function Nombre(){
        var filtro = /^[A-Za-z]{1,20}$/;
        
        var campoUno = document.getElementById("nombre").value;
        
        if(!campoUno.match(filtro) || campoUno === null || campoUno.length<1 ||campoUno.length > 20){
            document.getElementById("nombre").style.borderColor="red";
            alert('El campo no puede estar vacio o el nombre solo puede contener caracteres y no puede tener mas de 20 caracteres');
            return false;
        }else{
            document.getElementById("nombre").style.borderColor="green";
            return true;
        }
    }
    
    function Apellidos(){
        var filtro = /^[A-Za-z\b]{1,40}$/;
        var campoDos = document.getElementById("apellidos").value;
        
        if((!campoDos.match(filtro)) || campoDos === null || campoDos.length < 1|| campoDos.length > 40){
            document.getElementById("apellidos").style.borderColor="red";
           alert('El campo no puede estar vacio o apellidos solo puede contener caracteres y no puede tener mas de 40 caracteres');
            
        }else{
            document.getElementById("apellidos").style.borderColor="green";
        }
    }
    function nickName(){
        var campoCuatro = document.getElementById("nickname").value;
        var filtroNick = /^[A-Za-z0-9_]{6,20}$/;
        
        if((!campoCuatro.match(filtroNick)) || campoCuatro === null || campoCuatro.length > 20){
            document.getElementById("nickname").style.borderColor="red";
            alert('El campo no puede estar vacio o Nick-name solo puede contener los caracteres ( A-Z, a-z 0-9, _ )  y no puede tener mas de 20 caracteres');
            
        }else{
            document.getElementById("nickname").style.borderColor="green";
        }
    }
    
    
    function Contrasenia(){
        var filtrocontrasenia = /^[A-Za-z0-9_]{6,20}$/;
        var campoCinco = document.getElementById("contrasenia").value;
        
        if((!campoCinco.match(filtrocontrasenia)) || campoCinco === null){
            document.getElementById("contrasenia").style.borderColor="red";
            alert('La contraseña debe contener: A-Za-z0-9 min_caracteres: 6,max_caracteres20');
            
        }else{
            document.getElementById("contrasenia").style.borderColor="green";
        }
    }
    
    function ConfirmaContrasenia(){
        var campoSeis = document.getElementById("confirmacontrasenia").value;
        var campoCinco = document.getElementById("contrasenia").value;
        if(campoCinco != campoSeis){
            document.getElementById("confirmarcontrasenia").style.borderColor="red";
            alert('Las contraseñas no coinciden');
        }else{
            document.getElementById("confirmarcontrasenia").style.borderColor="green";
        }
    }
    
    function Email(){
        
        var filtroEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;   
    
        
        var campoSiete = document.getElementById("email").value;
        if (!filtroEmail.test(campoSiete)){
            document.getElementById("email").style.borderColor="red";
            alert("Error: La dirección de correo es incorrecta.");
        }else{
            document.getElementById("email").style.borderColor="green";
        }
    }
  
    
    function Codigo(){
        var filtro = /[A-Za-z0-9]{1,20}/;
        var campoDos = document.getElementById("codigo").value;
        
        if((!campoDos.match(filtro)) || campoDos == null || campoDos.length > 20){
            document.getElementById("codigo").style.borderColor="red";
           alert('El campo no puede estar vacio o apellidos solo puede contener caracteres y no puede tener mas de 40 caracteres');
        }else{
            document.getElementById("codigo").style.borderColor="green";
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
        document.getElementById("dni").style.borderColor="red";
        alert('Dni erroneo, la letra del NIF no se corresponde');
        return false;
        
    }else{
        document.getElementById("dni").style.borderColor="green";
        return true;
    }
   
 }
 
 function Duracion(){
   
    var dura = document.getElementById("duracion").value;
    
    if(dura == null || dura <1 || dura>12){
        document.getElementById("duracion").style.borderColor="red";
        alert('La duracion debe estar entre 1h y 12h');
        return false;
        
    }else{
        document.getElementById("duracion").style.borderColor="green";
        return true;
    }
   
 }
 function Lugar(){
   
    var lugar = document.getElementById("lugar").value;
    
    if(lugar == null || lugar.length<1 || lugar.length>30){
        document.getElementById("lugar").style.borderColor="red";
        alert('Debe indicar un lugar de logitud de 1 a 30 caracteres');
        return false;
        
    }else{
        document.getElementById("lugar").style.borderColor="green";
        return true;
    }
   
 }
 
 function Asignatura(){
        var filtro = /^[A-Za-z]{1,20}$/;
        
        var campoUno = document.getElementById("asignatura").value;
        
        if(!campoUno.match(filtro) || campoUno === null || campoUno.length<1 ||campoUno.length > 20){
            document.getElementById("asignatura").style.borderColor="red";
            alert('El campo no puede estar vacio o la asignatura solo puede contener caracteres y no puede tener mas de 20 caracteres');
            return false;
        }else{
            document.getElementById("asignatura").style.borderColor="green";
            return true;
        }
    }
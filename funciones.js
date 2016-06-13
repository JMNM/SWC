/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function validarFormulario(){
    var filtro = /[A-Za-z]/;
    var filtroNick = /^[A-Za-z0-9_]{6,20}$/;
    var filtroEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var filtrocontraseña = /^[A-Za-z0-9_]{6,20}$/;
    var campoUno = document.getElementById("nombre").value;
    var campoDos = document.getElementById("apellidos").value;
    var campoTres = document.getElementById("DNI").value;
    var campoCuatro = document.getElementById("nickname").value;
    var campoCinco = document.getElementById("contraseña").value;
    var campoSeis = document.getElementById("confirmacontraseña").value;
    var campoSiete = document.getElementById("email").value;


    if((!campoUno.match(filtro)) || campoUno == null || campoUno.length > 20){
        alert('El campo no puede estar vacio o el nombre solo puede contener caracteres y no puede tener mas de 20 caracteres');
    }else if((!campoDos.match(filtro)) || campoDos == null || campoDos.length > 40){
        alert('El campo no puede estar vacio o apellidos solo puede contener caracteres y no puede tener mas de 40 caracteres');
    }else if((!campoCuatro.match(filtroNick)) || campoCuatro == null || campoCuatro.length > 20){
        alert('El campo no puede estar vacio o Nick-name solo puede contener los caracteres ( A-Z, a-z 0-9, _ )  y no puede tener mas de 20 caracteres');
    }else if(!(nif(campoTres))){
        alert('Dni erroneo, la letra del NIF no se corresponde');
    }else if((!campoCinco.match(filtrocontraseña)) || campoCinco == null){
        alert('La contraseña debe contener: A-Za-z0-9 min_caracteres: 6,max_caracteres20');
    }else if(campoCinco != campoSeis){
        alert('Las contraseñas no coinciden');
    }else if (!filtroEmail.test(campoSiete)){
        alert("Error: La dirección de correo es incorrecta.");
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
    
    if(!(nif(campoTres))){
        alert('Dni erroneo, la letra del NIF no se corresponde');
        return false;
    }
    return true;
 }
 
 function validarRecurso(){
    var filtro = /[A-Za-z]/;
    var filtrocodigo = /^\d{8}[a-zA-Z]$/;
    var campoUno = document.getElementById("nombreRecurso").value;
    var campoDos = document.getElementById("nombreProfesor").value;
    var campoTres = document.getElementById("fecha").value;
    var campoCuatro = document.getElementById("hora").value;
    var campoCinco = document.getElementById("codigo").value;
    var campoSeis = document.getElementById("asignatura").value;


    if((!campoUno.match(filtro)) || campoUno == null || campoUno.length > 20){
        alert('El campo no puede estar vacio o el nombre solo puede contener caracteres y no puede tener mas de 20 caracteres');
    }else if((!campoDos.match(filtro)) || campoDos == null || campoDos.length > 40){
        alert('El campo no puede estar vacio o apellidos solo puede contener caracteres y no puede tener mas de 40 caracteres');
    }else if((!campoCuatro.match(filtroNick)) || campoCuatro == null || campoCuatro.length > 20){
        alert('El campo no puede estar vacio o Nick-name solo puede contener los caracteres ( A-Z, a-z 0-9, _ )  y no puede tener mas de 20 caracteres');
    }else if(!(nif(campoTres))){
        alert('Dni erroneo, la letra del NIF no se corresponde');
    }else if((!campoCinco.match(filtro)) || campoCinco == null || campoCinco.length > 20){
        alert('La Asignatura debe contener: caracteres y no puede superar 20');
    }else if((!campoSeis.match(filtrocodigo)) || campoSeis == null || campoSeis.length > 20){
        alert('La Asignatura debe contener: caracteres y no puede superar 20');
    }
}




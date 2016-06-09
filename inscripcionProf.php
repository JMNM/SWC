<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema Web de Citas</title>
        <link rel="stylesheet" type="text/css" href="estilos.css"/>
        
    </head>
    <body>
        <h1 class="titulo"><u>Registro</u></h1>
        <form class="formIns" name="formUsuario" id="Identificarse" action="inscripcionProf.php" method="post" onsubmit="validarFormulario()">
            <label for="name">Nombre:</label>
            <input class="formIns" type="text" name="nombre" id="nombre" value="" /> <br/>
            
            
            
            <label for="apellidos">Apellidos:</label>
            <input class="formIns" type="text" name="apellidos" id="apellidos" value="" /><br/>
            <label for="DNI">DNI:</label>
            <input class="formIns" type="text" name="DNI" id="DNI" value="" /><br/>
            <label for="nickname">Nick-name:</label>
            <input class="formIns" type="text" name="nickname" id="nickname" value="" /><br/>
            <label for="contraseña">Contraseña:</label>
            <input class="formIns" type="password" name="contraseña" id="contraseña" value="" /><br/>
            <label for="confirmacontraseña">Confirmar Contraseña:</label>
            <input class="formIns" type="password" name="confirmacontraseña" id="confirmacontraseña" value="" /><br/>
            <label for="email">Email:</label>
            <input class="formIns" type="text" name="email" id="email" value="" /><br/><br/>
            

                <input class="boton" type="submit" value="Enviar"/><br/>
        </form>
        <hr/>
        <script type="text/javascript">
            function validarFormulario(){
                var filtro = /[A-Za-z]/;
                var filtroNick = /^[A-Za-z0-9_]{6,20}$/;
                var filtroDni = /\d{8,8}[A-Za-z]{1,1}$/
                var filtrocontraseña = /^[A-Za-z0-9_]{6,20}$/;
                var campoUno = document.getElementById("nombre").value;
                var campoDos = document.getElementById("apellidos").value;
                var campoTres = document.getElementById("DNI").value;
                var campoCuatro = document.getElementById("nickname").value;
                var campoCinco = document.getElementById("contraseña").value;
                var campoSeis = document.getElementById("confirmacontraseña").value;


                if((!campoUno.match(filtro)) || campoUno == null || campoUno.length > 20){
                    alert('El campo no puede estar vacio o el nombre solo puede contener caracteres y no puede tener mas de 20 caracteres');
                }else if((!campoDos.match(filtro)) || campoDos == null || campoDos.length > 40){
                    alert('El campo no puede estar vacio o apellidos solo puede contener caracteres y no puede tener mas de 40 caracteres')
                }else if((!campoCuatro.match(filtroNick)) || campoCuatro == null || campoCuatro.length > 20){
                    alert('El campo no puede estar vacio o Nick-name solo puede contener los caracteres ( A-Z, a-z 0-9, _ )  y no puede tener mas de 20 caracteres');
                }else if((!campoTres.match(filtroDni)) || campoTres == null ){
                    alert('El campo no puede estar vacio o DNI debe de contener 8 numeros y una letra')
                }else if((!campoCinco.match(filtrocontraseña)) || campoCuatro == null){
                    alert('Error')
                }
            }
            </script>
        <?php
            
        ?>
    </body>
</html>
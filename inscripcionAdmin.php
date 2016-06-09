<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema Web de Citas</title>
        <link rel="stylesheet" type="text/css" href="estilos.css"/>
    </head>
    <body>
        <h1 class="titulo"><u>Registro</u></h1>
        <form class="formIns" id="Identificarse" action="identificacion.php" method="post">
            <label for="name">Nombre:</label>
            <input class="formIns" type="text" name="nombre" id="nombre" value="" /> <br/>
            <label for="apellidos">Apellidos:</label>
            <input class="formIns" type="text" name="apellidos" id="apellidos" value="" /><br/>
            <label for="DNI">DNI:</label>
            <input class="formIns" type="text" name="DNI" id="DNI" value="" /><br/>
            <label for="nickname">Nick-name:</label>
            <input class="formIns" type="text" name="nickname" id="nickname" value="" /><br/>
            <label for="contraseña">Contraseña:</label>
            <input class="formIns" type="text" name="contraseña" id="contraseña" value="" /><br/>
            <label for="confirmacontraseña">Confirmar Contraseña:</label>
            <input class="formIns" type="text" name="confirmacontraseña" id="confirmacontraseña" value="" /><br/>
            <label for="email">Email:</label>
            <input class="formIns" type="text" name="email" id="email" value="" /><br/>
            <label for="tipo">Tipo de Usuario:</label>
            <input class="formIns" type="number" name="tipo" id="tipo" value="1" /><br/><br/>

                <input class="boton" type="submit" value="Enviar"/><br/>
        </form>
        <?php
        // put your code here
            
        ?>
    </body>
</html>
<?php

if (!empty($_POST["btningresar"])) {
    if (empty($_POST["usuario"]) and empty($_POST["password"])) {
        echo '<div class="alert alert-danger">campos vacios</div>';
    } else {
        $usuario=$_POST["usuario"];
        $clave=$_POST["password"];
        $sql=$conn->query(" select * from cuenta where usuario='$usuario' and clave='$clave'");
        if ($datos=$sql->fetch_object()) {
            header("location:index.html");
        } else {
            echo '<div class="alert alert-danger">Campos incorrectos</div>';
        }
        
    }

}
?>
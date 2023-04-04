<?php 

function registrar(array $datos, $con){
    $sql = $con->prepare("INSERT INTO contacts (name,email,phone,mensaje) VALUES (?,?,?,?)");
    if($sql->execute($datos)) {
        return $con->lastInsertId();  
    }
    return 0;
}

?>
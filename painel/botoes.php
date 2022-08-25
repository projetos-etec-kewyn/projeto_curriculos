<?php

$sql = "SELECT * FROM curriculo";
$resultado = mysqli_query($conexao,$sql);
if(mysqli_num_rows($resultado)>0){
   $cad = true;
}else{
   $cad = false;
}
?>
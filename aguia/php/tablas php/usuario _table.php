<?php

include '../config.php';


if($comn -> connect_error){
   # echo "error en la conexion";
    #REDIRECCIONAMIENTO A LOS BOTONES 
    header("location:../html/botones.html");

 }else{
    $sql="SELECT*FROM usuario";
    $resultado=$comn -> query($sql);
    #resultado igual a nada 

    if($resultado -> num_rows > 0 ){
        //imprimir tabla 
        echo "<body bgcolor='a9c2eb'>";
        echo "<center>";
        echo "<table style='background-color: aquamarine;'>";
        echo "<tr>
            <td><th>usuario_id</th></td>
            <td><th>usuario</th></td>
            <td><th>nombre</th></td>
            <td><th>correo</th></td>
            <td><th>pwsd</th></td>
        </tr>";

        while ( $row = $resultado -> fetch_assoc() )
        {
            
            echo "<tr>";
                echo "<td>" .$row["usuario_id" ]."<td>" ;
                 echo "<td>" .$row["usuario" ]."<td>" ;
                 echo "<td>" .$row["nombre" ]."<td>" ;
                 echo "<td>" .$row["correo" ]."<td>" ;
                 echo "<td>" .$row["pwsd" ]."<td>" ;
            echo "</tr><br>";
             "</center>";
             "</body>";

          
          
        }
       
         
      
     }
  /* */

 }
  
 $comn -> close();
?>
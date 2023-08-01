<?php

include '../config.php';


if($comn -> connect_error){
   # echo "error en la conexion";
    #REDIRECCIONAMIENTO A LOS BOTONES 
    header("location:../html/botones.html");

 }else{
    $sql="SELECT*FROM actividad";
    $resultado=$comn -> query($sql);
    #resultado igual a nada 

    if($resultado -> num_rows > 0 ){
        //imprimir tabla
        echo "<body bgcolor='a9c2eb'>";
        echo "<center>";
        echo "<table style='background-color: aquamarine;'>"; 
        echo "<tr>
        <td><th>id_registro</th></td>
        
        <td><th>registro</th></td>
        <td><th>fecha</th></td>
        
    </tr>";
    

        while ( $row = $resultado -> fetch_assoc() )
        { 
            
            echo "<tr>";
            echo "<td>" .$row["id_registro"]."<td>" ;
           
            echo "<td>" .$row["registro" ]."<td>" ;
            echo "<td>" .$row["fecha" ]."<td>" ;
            echo "</tr><br>";

            "</center>";
            "</body>";

          
        }
        
         
      
     }
  /* */

 }
  
 $comn -> close();
?>
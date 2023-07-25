<?php

include '../config.php';


if($comn -> connect_error){
   # echo "error en la conexion";
    #REDIRECCIONAMIENTO A LOS BOTONES 
    header("location:../html/botones.html");

 }else{
    $sql="SELECT*FROM comentarios ";
    $resultado=$comn -> query($sql);
    #resultado igual a nada 

    if($resultado -> num_rows > 0 ){
        //imprimir tabla 
        echo "<body bgcolor='a9c2eb'>";
        echo "<center>";
        echo "<table style='background-color: aquamarine;'>";
        echo "<tr>
            <td><th>comentario_id </th></td>
            
            
            <td><th>comentario </th></td>
            
        </tr>";

        while ( $row = $resultado -> fetch_assoc() )
        {
            
            echo "<tr>";
                echo "<td>" .$row["comentario_id" ]."<td>" ;
                
                 
                 echo "<td>" .$row["comentario" ]."<td>" ;
                
            echo "</tr><br>";
             "</center>";
             "</body>";

          
          
        }
       
         
      
     }
  /* */

 }
  
 $comn -> close();
?>
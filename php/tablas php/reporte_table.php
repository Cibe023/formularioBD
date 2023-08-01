<?php

include '../config.php';


if($comn -> connect_error){
   # echo "error en la conexion";
    #REDIRECCIONAMIENTO A LOS BOTONES 
    header("location:../html/botones.html");

 }else{
    $sql="SELECT*FROM reporte";
    $resultado=$comn -> query($sql);
    #resultado igual a nada 

    if($resultado -> num_rows > 0 ){
        //imprimir tabla 
        echo "<body bgcolor='a9c2eb'>";
        echo "<center>";
        echo "<table style='background-color: aquamarine;'>";
        echo "<tr>
            <td><th>reporte_id</th></td>
            
            <td><th>descripcion</th></td>
            
        </tr>";

        while ( $row = $resultado -> fetch_assoc() )
        {
            
            echo "<tr>";
                echo "<td>" .$row["reporte_id" ]."<td>" ;
              
                 echo "<td>" .$row["descripcion" ]."<td>" ;
                 
                 echo "</tr><br>";
             "</center>";
             "</body>";

          
          
        }
       
         
      
     }
  /* */

 }
  
 $comn -> close();
?>
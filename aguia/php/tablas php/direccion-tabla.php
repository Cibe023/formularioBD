<?php

include '../config.php';


if($comn -> connect_error){
   # echo "error en la conexion";
    #REDIRECCIONAMIENTO A LOS BOTONES 
    header("location:../html/botones.html");

 }else{
    $sql="SELECT*FROM direccion ";
    $resultado=$comn -> query($sql);
    #resultado igual a nada 

    if($resultado -> num_rows > 0 ){
        //imprimir tabla 
        echo "<body bgcolor='a9c2eb'>";
        echo "<center>";
        echo "<table style='background-color: aquamarine;'>";
        echo "<tr>
            <td><th>direccion_id  </th></td>
            <td><th>direccion  </th></td>
            <td><th>calle   </th></td>
            <td><th>ciudad   </th></td>
            <td><th>estado   </th></td>
            <td><th>telefono  </th></td>
            <td><th>pais   </th></td>
            
        </tr>";

        while ( $row = $resultado -> fetch_assoc() )
        {
            
            echo "<tr>";
                echo "<td>" .$row["direccion_id" ]."<td>" ;
                 echo "<td>" .$row["direccion" ]."<td>" ;
                 echo "<td>" .$row["calle" ]."<td>" ;
                 echo "<td>" .$row["ciudad" ]."<td>" ;
                 echo "<td>" .$row["estado" ]."<td>" ;
                 echo "<td>" .$row["telefono" ]."<td>" ;
                 echo "<td>" .$row["pais" ]."<td>" ;
            echo "</tr><br>";
             "</center>";
             "</body>";

          
          
        }
       
         
      
     }
  /* */

 }
  
 $comn -> close();
?>
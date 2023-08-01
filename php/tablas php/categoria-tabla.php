<?php

include '../config.php';


if($comn -> connect_error){
   # echo "error en la conexion";
    #REDIRECCIONAMIENTO A LOS BOTONES 
    header("location:../html/botones.html");

 }else{
    $sql="SELECT*FROM categorias";
    $resultado=$comn -> query($sql);
    #resultado igual a nada 

    if($resultado -> num_rows > 0 ){
        //imprimir tabla 
        echo "<body bgcolor='a9c2eb'>";
        echo "<center>";
        echo "<table  style='background-color: aquamarine;'>";
        echo "<tr>
            <td><th>  categoria_id</th></td>
             <td ><th  >nombre</th></td>
           
            
        </tr>";
 #rowspan='2'border='1'
        while ( $row = $resultado -> fetch_assoc() )
        {
            
            echo "<tr>";
                echo "<td>" .$row["categoria_id"]."<td>" ;
                 echo "<td>" .$row["nombre"]."<td>" ;
                
                 
            echo "</tr><br>";
             "</center>";
             "</body>";

          
          
        }
       
         
      
     }
  /* */

 }
  
 $comn -> close();
?>
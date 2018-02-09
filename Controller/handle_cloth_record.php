<?php
include("db.php");

$token=$_GET['token'];



if($token=='1'){
    $query = "SELECT * FROM clothrecord ORDER BY cto";
    $stmt = $conn->prepare($query);

    $stmt->execute();

    $clothRecord = array();

    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    
        $clothRecord['Record'][] = $row;
    
    }
    $conn = null;

    echo json_encode($clothRecord);


}else if($token=='2'){
    $crId=$_GET['crId'];
   
    try{
        $query = "DELETE FROM clothrecord WHERE id='".$crId."'";
        
            // use exec() because no results are returned
            $conn->exec($query);
            echo "Record deleted successfully";
        
        }catch(PDOException $e)
            {
            echo $query . "<br>" . $e->getMessage();
            }
        
        $conn = null;
    
} 

?>
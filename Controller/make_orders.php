<?php
include("db.php");

$token=$_POST['token'];

if($token=='make_orders'){

    $oto=$_POST['oto'];
    $item=$_POST['item'];
    $class=$_POST['iclass'];
    $size=$_POST['size'];
    $itype=$_POST['type'];
    $pipin=$_POST['pipin'];
    $qty=$_POST['qty'];
    $odescription=$_POST['description'];



    try{
        $sql = "INSERT INTO 
        makeorders (oto,item,class,size,itype,pipin,qty,odescription)
        VALUES ('".$oto."','".$item."','".$class."','".$size."','".$itype."','".$pipin."',
        '".$qty."','".$odescription."')";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";

    }catch(PDOException $e){

        echo $sql . "<br>" . $e->getMessage();
    }
    $conn=null;

}else if($token=='get_make_orders'){

    $query = "SELECT * FROM makeorders";
 
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $makeOrders = array();

    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    
        $makeOrders['Orders'][] = $row;
    
    }

    echo json_encode($makeOrders);

}else if($token=='search_make_orders'){
    $oto=$_POST['oto'];


    $query = "SELECT * FROM makeorders WHERE oto LIKE '%".$oto."%'";
    
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $takeOrders = array();

    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    
        $takeOrders['Orders'][] = $row;
    
    }

    echo json_encode($takeOrders);

}else if($token=='delete_make_order_rows'){

    $orderId=$_POST['orderId'];

    try{
    $sql = "DELETE FROM makeorders WHERE id='".$orderId."'";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Record deleted successfully";

    }catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

    $conn = null;

}else if($token=='load_makeOrder_to_edit'){

    $id=$_POST['id'];

    $query = "SELECT * FROM makeorders WHERE id='".$id."'";

    $stmt = $conn->prepare($query);

    $stmt->execute();

    $editMakeRecord = array();

    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    
        $editMakeRecord['MakeOrders'][] = $row;
    
    }
    $conn = null;

    echo json_encode($editMakeRecord);

}else if($token=='edit_make_order') {

    $id=$_POST['id'];

    $oto=$_POST['oto'];
    $item=$_POST['item'];
    $class=$_POST['iclass'];
    $size=$_POST['size'];
    $itype=$_POST['type'];
    $pipin=$_POST['pipin'];
    $qty=$_POST['qty'];
    $odescription=$_POST['description'];
    $ostatus='placed';



    try{
    $sql="UPDATE makeorders SET oto='".$oto."',item='".$item."',class='".$class."',size='".$size."',itype='".$itype."',pipin='".$pipin."',qty='".$qty."',odescription='".$odescription."',ostatus='".$ostatus."' WHERE id='".$id."'";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";

    }catch(PDOException $e){

    echo $sql . "<br>" . $e->getMessage();
    }
    $conn=null;
}    




?>

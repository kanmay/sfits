<?php
include("db.php");

$token=$_POST['token'];

if($token=='take_orders'){

    $ofrom=$_POST['ofrom'];
    $phone=$_POST['phone'];
    $item=$_POST['item'];
    $class=$_POST['iclass'];
    $size=$_POST['size'];
    $itype=$_POST['type'];
    $pipin=$_POST['pipin'];
    $qty=$_POST['qty'];
    $odescription=$_POST['description'];
    $total=$_POST['total'];
    $deposit=$_POST['deposit'];
    $balance=$_POST['balance'];



    try{
        $sql = "INSERT INTO 
        takeorders (ofrom,phone,item,class,size,itype,pipin,qty,odescription,total,deposit,balance)
        VALUES ('".$ofrom."','".$phone."','".$item."','".$class."','".$size."','".$itype."','".$pipin."',
        '".$qty."','".$odescription."','".$total."','".$deposit."','".$balance."')";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";

    }catch(PDOException $e){

        echo $sql . "<br>" . $e->getMessage();
    }
    $conn=null;

}else if($token=='get_take_orders'){

    $query = "SELECT * FROM takeorders";
 
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $takeOrders = array();

    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    
        $takeOrders['Orders'][] = $row;
    
    }

    echo json_encode($takeOrders);


}else if($token=='search_take_orders'){

    $ofrom=$_POST['ofrom'];


    $query = "SELECT * FROM takeorders WHERE ofrom LIKE '%".$ofrom."%'";
    
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $takeOrders = array();

    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    
        $takeOrders['Orders'][] = $row;
    
    }

    echo json_encode($takeOrders);

}else if($token=='delete_take_order_row'){

    $orderId=$_POST['orderId'];

    try{
    $sql = "DELETE FROM takeorders WHERE id='".$orderId."'";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Record deleted successfully";

    }catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

    $conn = null;
}else if($token=='load_takeOrder_to_edit'){
      
    $id=$_POST['id'];

  $query = "SELECT * FROM takeorders WHERE id='".$id."'";

  $stmt = $conn->prepare($query);

  $stmt->execute();

  $takeOrder = array();

  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
  
      $takeOrder['TakeOrder'][] = $row;
  
  }
  $conn = null;

  echo json_encode($takeOrder);


}else if($token=='edit_take_order'){

    $id=$_POST['id'];


    $ofrom=$_POST['ofrom'];
    $phone=$_POST['phone'];
    $item=$_POST['item'];
    $class=$_POST['iclass'];
    $size=$_POST['size'];
    $itype=$_POST['type'];
    $pipin=$_POST['pipin'];
    $qty=$_POST['qty'];
    $idescription=$_POST['description'];
    $total=$_POST['total'];
    $deposit=$_POST['deposit'];
    $balance=$total-$deposit;
    $ostatus='received';



    try{
    $sql="UPDATE takeorders SET ofrom='".$ofrom."',phone='".$phone."',item='".$item."',class='".$class."',size='".$size."',
    itype='".$itype."',pipin='".$pipin."',qty='".$qty."',idescription='".$idescription."',total='".$total."',deposit='".$deposit."',balance='".$balance."',ostatus='".$istatus."' WHERE id='".$id."'";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";

    }catch(PDOException $e){

    echo $sql . "<br>" . $e->getMessage();
    }
    $conn=null;
}    


?>

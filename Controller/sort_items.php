<?php
include("db.php");

$token=$_POST['token'];

if($token=='get_sort_items'){
      $query = "SELECT * FROM sortitems";
 
      $stmt = $conn->prepare($query);
      $stmt->execute();
      
      $sortItems = array();
      
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
            $sortItems['Items'][] = $row;
       
      }
      echo json_encode($sortItems);
      
}else if($token=='add_sort_item'){

      $item=$_POST['item'];
      $class=$_POST['iclass'];
      $size=$_POST['size'];
      $itype=$_POST['type'];
      $pipin=$_POST['pipin'];
      $qty=$_POST['qty'];
      $idescription=$_POST['description'];
      $istatus='sort';



      try{
      $sql = "INSERT INTO sortitems (item,class,size,itype,pipin,qty,idescription,istatus)
      VALUES ('".$item."','".$class."','".$size."','".$itype."','".$pipin."','".$qty."','".$idescription."','".$istatus."')";

      // use exec() because no results are returned
      $conn->exec($sql);
      echo "New record created successfully";

      }catch(PDOException $e){

      echo $sql . "<br>" . $e->getMessage();
      }
      $conn=null;

}else if($token=='delete_sort_item'){

      $itemId=$_POST['item'];

      try{
      $sql = "DELETE FROM sortitems WHERE id='".$itemId."'";

      // use exec() because no results are returned
      $conn->exec($sql);
      echo "Record deleted successfully";

      }catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

      $conn = null;

}else if($token=='load_item_to_edit'){
      
      $id=$_POST['id'];

    $query = "SELECT * FROM sortitems WHERE id='".$id."'";

    $stmt = $conn->prepare($query);

    $stmt->execute();

    $editSortItem = array();

    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    
        $editSortItem['SortItem'][] = $row;
    
    }
    $conn = null;

    echo json_encode($editSortItem);


}else if($token=='edit_sort_item'){

      $id=$_POST['id'];

      $item=$_POST['item'];
      $class=$_POST['iclass'];
      $size=$_POST['size'];
      $itype=$_POST['type'];
      $pipin=$_POST['pipin'];
      $qty=$_POST['qty'];
      $idescription=$_POST['description'];
      $istatus='sort';



      try{
      $sql="UPDATE sortitems SET item='".$item."',class='".$class."',size='".$size."',itype='".$itype."',pipin='".$pipin."',qty='".$qty."',idescription='".$idescription."',istatus='".$istatus."' WHERE id='".$id."'";
      // use exec() because no results are returned
      $conn->exec($sql);
      echo "New record created successfully";

      }catch(PDOException $e){

      echo $sql . "<br>" . $e->getMessage();
      }
      $conn=null;
}





?>
<?php
include("db.php");

$cto=$_POST['cto'];
$ctype=$_POST['ctype'];
$clength=$_POST['clength'];
$cclass=$_POST['cclass'];
$cwidth=$_POST['cwidth'];
$csource=$_POST['csource'];
$cdescription=$_POST['cdescription'];
$cprice=$_POST['cprice'];
$camount=$_POST['camount'];
$date=$_POST['cdate'];;



try{
    $sql = "INSERT INTO clothrecord (cto,ctype,clength,cclass,cwidth,csource,cdescription,cprice,camount,cdate)
    VALUES ('".$cto."','".$ctype."','".$clength."','".$cclass."','".$cwidth."','".$csource."','".$cdescription."',
            '".$cprice."','".$camount."','".$date."')";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";

}catch(PDOException $e){

    echo $sql . "<br>" . $e->getMessage();
}
$conn=null;

?>

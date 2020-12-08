<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);  
include("db.php");
$pro_id = (int)$_GET['pro_id'];

            $query = $db->prepare("SELECT pro_id FROM produits WHERE pro_id = :pro_id ORDER BY pro_libelle");
            $query->bindParam(":pro_id", $pro_id);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);

if(!empty($row['pro_id']))
{
            $req = $db->prepare('DELETE FROM produits WHERE pro_id= :pro_id');
            $req->bindParam(':pro_id', $row['pro_id']);
            $success = $req->execute();

    if($success)
    {

    header("Location: index.php");
    }
    else
    {

    header("Location: detail.php?pro_id=".$pro_id."&e=3");
    }
}
else
{
    header("Location: index.php");
}
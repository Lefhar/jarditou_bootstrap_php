<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);  
include("db.php");

$pro_id = (int)$_POST['pro_id'];
$query = $db->prepare("SELECT pro_id, pro_cat_id, pro_libelle, pro_prix, pro_couleur, pro_photo, pro_description FROM produits WHERE pro_id = :pro_id ORDER BY pro_libelle");
$query->bindParam(":pro_id", $pro_id);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
if(empty($row['pro_id']))
{  
     header("Location: 404.php");
   exit();
}
if(!empty($_POST['pro_libelle'])&&!empty($_POST['pro_couleur'])&&!empty($_POST['pro_img'])&&!empty($_POST['pro_prix'])&&is_numeric($_POST['pro_prix'])&&!empty($_POST['cat_id'])&&is_numeric($_POST['cat_id']))
{
echo $row['pro_id'];
    try {

        $sql = 'UPDATE produits 
        SET pro_cat_id =:pro_cat_id,
         pro_libelle =:pro_libelle,
          pro_prix =:pro_prix,
           pro_couleur =:pro_couleur,
            pro_photo =:pro_photo,
             pro_description =:pro_description,
              pro_d_modif=:pro_d_modif WHERE pro_id =:pro_id';
              
        $query = $db->prepare($sql);
            $id = $row['pro_id'];
            $cat_id = $_POST['cat_id'];
            $pro_libelle = $_POST['pro_libelle'];      
            $pro_prix = $_POST['pro_prix'];      
            $pro_couleur = $_POST['pro_couleur'];      
            $info = new SplFileInfo($_POST['pro_img']);
            $pro_photo = $info->getExtension(); 
            $pro_description = $_POST['pro_description'];  
            $pro_d_modif = date("Y-m-d H:i:s");     

        // Association des valeurs aux paramètres avec BindValue :
        $query->bindValue(":pro_cat_id", $cat_id);
        $query->bindValue(":pro_libelle", $pro_libelle);
        $query->bindValue(":pro_prix", $pro_prix);
        $query->bindValue(":pro_couleur", $pro_couleur);
        $query->bindValue(":pro_photo", $pro_photo);
        $query->bindValue(":pro_description", $pro_description);
        $query->bindValue(":pro_d_modif", $pro_d_modif);
        $query->bindValue(":pro_id", $id);
        $success= $query->execute();
        $query->closeCursor();
     //Exécution de la requête 
     if($success)
     {
     header("Location: http://".$_SERVER['HTTP_HOST']."/detail.php?pro_id=".$row['pro_id']);
     exit();
     }
      
       print_r($db->errorInfo());
        }
        // Gestion des erreurs
        catch (Exception $e) {
        
            echo "La connexion à la base de données a échoué ! <br>";
            echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
            echo "Erreur : " . $e->getMessage() . "<br>";
            echo "N° : " . $e->getCode();
            die("Fin du script");
        } 


}

?>
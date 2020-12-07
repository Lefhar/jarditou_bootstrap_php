<?php 
var_dump($_POST);
$cat_id = $_POST['cat_id'];
$pro_libelle = $_POST['pro_libelle'];      
$pro_prix = $_POST['pro_prix'];      
$pro_stock = $_POST['pro_stock'];
$pro_couleur = $_POST['pro_couleur'];      
$info = new SplFileInfo($_POST['pro_img']);
$pro_photo = $info->getExtension(); 
$pro_description = $_POST['pro_description'];  
$pro_d_ajout = date("Y-m-d H:i:s");   

//on vérifie les valeurs entré le nombre de caractére et pour les valeur numérique aussi exemple pro_stock, pro_prix etc
if(!empty($_POST['pro_libelle'])&&strlen($_POST['pro_libelle'])<=200&&!empty($_POST['pro_stock'])&&strlen($_POST['pro_stock'])<=200
&&!empty($_POST['pro_couleur'])&&strlen($_POST['pro_couleur'])<=30&&!empty($_POST['pro_description'])&&strlen($_POST['pro_description'])<=1000&&
!empty($_POST['pro_img'])&&!empty($_POST['pro_prix'])&&is_numeric($_POST['pro_prix'])&&!empty($_POST['cat_id'])&&
is_numeric($_POST['cat_id']))
{

    try 
    {

      //requete sql
        $sql = 'UPDATE produits SET pro_cat_id =:pro_cat_id, pro_libelle =:pro_libelle, pro_prix =:pro_prix, pro_stock=:pro_stock, pro_couleur =:pro_couleur, pro_photo =:pro_photo, pro_description =:pro_description, pro_d_modif=:pro_d_modif WHERE pro_id =:pro_id';
    
        $query = $db->prepare($sql);//on prepare

        //on récupére les divers champs
            $id = $row['pro_id'];
            $cat_id = $_POST['cat_id'];
            $pro_libelle = $_POST['pro_libelle'];      
            $pro_prix = $_POST['pro_prix'];      
            $pro_stock = $_POST['pro_stock'];
            $pro_couleur = $_POST['pro_couleur'];      
            $info = new SplFileInfo($_POST['pro_img']);
            $pro_photo = $info->getExtension(); 
            $pro_description = $_POST['pro_description'];  
            $pro_d_modif = date("Y-m-d H:i:s");     

        // Association des valeurs aux paramètres avec BindValue :
        $query->bindValue(":pro_cat_id", $cat_id);
        $query->bindValue(":pro_libelle", $pro_libelle);
        $query->bindValue(":pro_prix", $pro_prix);
        $query->bindValue(":pro_stock",$pro_stock);
        $query->bindValue(":pro_couleur", $pro_couleur);
        $query->bindValue(":pro_photo", $pro_photo);
        $query->bindValue(":pro_description", $pro_description);
        $query->bindValue(":pro_d_modif", $pro_d_modif);
        $query->bindValue(":pro_id", $id);

        $success= $query->execute();//Exécution de la requête 
        $query->closeCursor();//on libére la mémoire
     
        if($success)
        {
        header("Location: index.php");// si ya bien requéte on fait la redirection sur le produit
        exit();
        }
      

      }  
      catch (Exception $e) // Gestion des erreurs
      {
        
            echo "La connexion à la base de données a échoué ! <br>";
            echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
            echo "Erreur : " . $e->getMessage() . "<br>";
            echo "N° : " . $e->getCode();
            die("Fin du script");
      } 

}else{
  header("Location: add_form.php?e=2");// si ya une erreur on renvoi avec le get e numéro 1
}
?>
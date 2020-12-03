<!--
        header

    -->   
    <?php 
    include_once('db.php');
    $pro_id = $_GET['pro_id'];
    $query = $db->prepare("SELECT pro_id, cat_nom , cat_id, pro_libelle, pro_prix, pro_couleur FROM produits join categories on cat_id = pro_cat_id WHERE pro_id > :pro_id ORDER BY pro_libelle");
    $query->bindParam(":pro_id", $pro_id);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
define("title","".$row['cat_nom']." ".$row['pro_libelle']);
define("description","Modification de ".$row['cat_nom']." ".$row['pro_libelle']);
include('header.php');?>

    <!--
        content

    -->   
    <div class="container-fluid"><div class="row"><img src="src/img/promotion.jpg" class="w-100" alt="Jarditou" title="Jarditou"></div></div>
    <div class="container-fluid">
   
    <div class="row">
    <!-- 
        colonne central
    -->
    <div class="col-12">
            <article>
            
       <legend> Modification du produit <?php echo $row['pro_libelle'];?></legend>
       
          <form action="" method="post" id="modification_produit"  name="modification_produit"   onsubmit="return verifproduit();"> <!--balise form début du formulaire-->
          <fieldset>
             <input type="hidden" class="form-control" value="<?php echo $row['pro_id'];?>"><!--  post de pro_id en input masqué -->
         <div class="form-group row">
     
        <label for="pro_libelle" class="col-sm-2 col-form-label col-12">Libelle </label>

<div class="col-sm-10 col-12"> 
        <input type="text" class="form-control" id="pro_libelle"  named="pro_libelle"  value="<?php echo $row['pro_libelle'];?>"> <br>
        </div>
        </div>   

        <div class="form-group row">
     
     <label for="pro_couleur" class="col-sm-2 col-form-label col-12">Couleur </label>

<div class="col-sm-10 col-12"> 
     <input type="text" class="form-control" id="pro_couleur"  named="pro_couleur"  value="<?php echo $row['pro_couleur'];?>"> <br>
     </div>
     </div>   
     <div class="form-group row">
     
     <label for="pro_img" class="col-sm-2 col-form-label col-12">Image </label>

<div class="col-sm-10 col-12"> 
     <input type="text" class="form-control" id="pro_img"  named="pro_img"  value="<?php echo $row['pro_id'];?>.jpg"> <br>
     </div>
     </div>   


     <div class="form-group row">
     
     <label for="pro_prix" class="col-sm-2 col-form-label col-12">Prix </label>

<div class="col-sm-10 col-12"> 
     <input type="text" class="form-control" id="pro_prix"  named="pro_prix"  value="<?php echo $row['pro_prix'];?>"> <br>
     </div>
     </div>   

        <div class="form-group row">
         <label for="cat" class="col-sm-2 col-form-label" >Catégorie  </label>
         <div class="col-sm-10 col-12"> 
          <select name="cat" id="cat" class="form-control">
        <?php     $query2 = $db->prepare('SELECT cat_nom, cat_id  FROM  categories WHERE   cat_id != :cat_id ORDER BY cat_nom asc');
    $query2->execute(array('cat_id' => $row['cat_id'] ));

    echo '<option value="'.$row['cat_id'].'">'.$row['cat_nom'].'</option>' ;
    while ($cat = $query2->fetch(PDO::FETCH_ASSOC)) {
     echo '<option value="'.$cat['cat_id'].'">'.$cat['cat_nom'].'</option>' ;
    }
    ?>
    </div>
             </select><br>
             </div>
           
        <div class="form-group">
              <button type="submit"  class="btn btn-dark btn-lg">Modifier</button>    <button type="reset" class="btn btn-dark btn-lg">Annuler</button>
         </div>
  </fieldset>
     </form> <!--balise form fin du formulaire-->
 
    </article>

    </div>
        </div>
    </div>

    <!--
        Footer
    -->
<?php include('footer.php');?>
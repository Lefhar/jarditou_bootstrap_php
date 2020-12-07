<!--
        header

    -->   
    <?php 
    include_once('db.php');
    $pro_id = $_GET['pro_id'];
    $query = $db->prepare("SELECT pro_id, cat_nom , cat_id, pro_libelle, pro_prix, pro_couleur, pro_photo, pro_description, pro_stock FROM produits join categories on cat_id = pro_cat_id WHERE pro_id = :pro_id ORDER BY pro_libelle");
    $query->bindParam(":pro_id", $pro_id);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if(empty($row['pro_id']))
    {  
          header("Location: 404.php");
        exit();
    }
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
       <?php if(!empty($_GET['e'])){echo error((int)$_GET['e']);}?>
          <form action="update_script.php" method="post" id="modification_produit"  name="modification_produit"   onsubmit="return verifproduit();"> <!--balise form début du formulaire-->
          <fieldset>
             <input type="hidden" id="pro_id"  name="pro_id" value="<?php echo $row['pro_id'];?>"><!--  post de pro_id en input masqué -->
        
         <div class="form-group row">
        <label for="pro_libelle" class="col-sm-2 col-form-label col-12">Libelle </label>
        <div class="col-sm-10 col-12"> 
        <input type="text" class="form-control" id="pro_libelle"  name="pro_libelle"  data-maxlength="200" value="<?php echo $row['pro_libelle'];?>"> <br>
        <div id="pro_libelleError" class="counter"><span>0</span> caractères (200 max)</div> 
        </div>
        </div>   

        <div class="form-group row">
        <label for="pro_couleur" class="col-sm-2 col-form-label col-12">Couleur </label>
        <div class="col-sm-10 col-12"> 
        <input type="text" class="form-control" id="pro_couleur"  name="pro_couleur"   data-maxlength="30" value="<?php echo $row['pro_couleur'];?>"> <br>
        <div id="pro_couleurError" class="counter"><span>0</span> caractères (30 max)</div> 
        </div>
        </div>  

        <div class="form-group row">
        <label for="pro_img" class="col-sm-2 col-form-label col-12">Image </label>
        <div class="col-sm-10 col-12"> 
        <input type="text" class="form-control" id="pro_img"  name="pro_img"  value="<?php echo $row['pro_id'];?>.<?php echo $row['pro_photo'];?>"> <br>
        </div>
        </div>   


        <div class="form-group row">
        <label for="pro_prix" class="col-sm-2 col-form-label col-12">Prix </label>
        <div class="col-sm-10 col-12"> 
        <input  type="number"  step="any" class="form-control" id="pro_prix"  name="pro_prix"  value="<?php echo $row['pro_prix'];?>"> <br>
        </div>
        </div>   

        <div class="form-group row">
        <label for="pro_stock" class="col-sm-2 col-form-label col-12">Stock </label>
        <div class="col-sm-10 col-12"> 
        <input  type="number" class="form-control" id="pro_stock"  name="pro_stock"  value="<?php echo $row['pro_stock'];?>"> <br>
        </div>
        </div>   


         <div class="form-group row">
         <label for="cat_id" class="col-sm-2 col-form-label" >Catégorie  </label>
         <div class="col-sm-10 col-12"> 
          <select name="cat_id" id="cat_id" class="form-control">
        <?php     $query2 = $db->prepare('SELECT cat_nom, cat_id  FROM  categories WHERE   cat_id != :cat_id ORDER BY cat_nom asc');
    $query2->execute(array('cat_id' => $row['cat_id'] ));

    echo '<option value="'.$row['cat_id'].'">'.$row['cat_nom'].'</option>' ;
    while ($cat = $query2->fetch(PDO::FETCH_ASSOC)) {
     echo '<option value="'.$cat['cat_id'].'">'.$cat['cat_nom'].'</option>' ;
    }
    $query2->closeCursor();//on libére la mémoire
    ?></select><br>
    </div>
             
             </div>
           
        <div class="form-group row">
        <label for="pro_description" class="col-sm-2 col-form-label" >Description produit  </label>
        <div class="col-sm-10 col-12"> 
        <textarea rows="8" name="pro_description"   id="pro_description"  data-maxlength="1000" class="form-control" cols="30" rows="10"  placeholder="description (1000 caractères MAX)"><?php echo $row['pro_description'];?></textarea><br>
        <div id="pro_descriptionError" class="counter"><span>0</span> caractères (1000 max)</div> 
        </div>
        </div>
        <div class="form-group">
              <button type="submit"  class="btn btn-success btn-lg">Modifier</button>    <button type="reset" class="btn btn-danger btn-lg">Annuler</button>
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
<?php 
define("title","Nos produit");
define("description","Notre gamme de produit");
include('header.php');
include_once('db.php');
?>

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
                <h2>Nos produits</h2>
                <div class="table-responsive">
                <table class="table table-sm table-striped table-striped-warning table-bordered"><!--début du tableau-->
                
                
                <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Trier par
          </button>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
            <li class="dropdown-submenu">
              <a class="dropdown-item" tabindex="-1" href="#">Catégorie</a>
              <ul class="dropdown-menu">
                <li class="dropdown-item"><a tabindex="-1" href="<?php echo basename($_SERVER['PHP_SELF']);?>?cat=asc">Croissant</a></li>
                <li class="dropdown-item"><a tabindex="-1" href="<?php echo basename($_SERVER['PHP_SELF']);?>?cat=desc">Décroissant</a></li>
              </ul>
            </li>
        
		
            <li class="dropdown-submenu">
              <a class="dropdown-item" tabindex="-1" href="#">Prix</a>
              <ul class="dropdown-menu">
                <li class="dropdown-item"><a tabindex="-1" href="<?php echo basename($_SERVER['PHP_SELF']);?>?prix=asc">Croissant</a></li>
                <li class="dropdown-item"><a tabindex="-1" href="<?php echo basename($_SERVER['PHP_SELF']);?>?prix=desc">Décroissant</a></li>
              </ul>
            </li>
         </ul>
        </div>
                
                
                
            <thead class="thead-light">
              <tr>
              <th  scope="col">Photo</th><!--titre colonne 1-->
              <th scope="col" >Id</th><!--colonne 2-->
              <th scope="col">Catégorie</th><!--titre colonne 3-->
              <th scope="col">Ref</th>
              <th scope="col">Libellé</th><!--titre colonne 4-->
              <th scope="col">Prix</th><!--titre colonne 5-->
              <th scope="col">Couleur</th><!--titre colonne 6-->
              <th scope="col">Détail</th><!--titre colonne 7-->
            </tr>
            </thead>
            <tbody>

            
<?php  
if(!empty($_GET['cat'])&&$_GET['cat'] =='asc')
{
      $order = "order by cat_nom asc";
}
elseif(!empty($_GET['cat'])&&$_GET['cat'] =='desc')
{
  $order = "order by cat_nom desc";
}
elseif(!empty($_GET['prix'])&&$_GET['prix'] =='asc')
{
      $order = "order by pro_prix asc";
}
elseif(!empty($_GET['prix'])&&$_GET['prix'] =='desc')
{
      $order = "order by pro_prix desc";
}
else
{
  $order = "order by pro_libelle asc";
}
    

    $query = $db->prepare('SELECT pro_id, cat_nom , pro_libelle, pro_prix, pro_couleur, pro_photo, pro_ref FROM produits join categories on cat_id = pro_cat_id WHERE pro_stock > :pro_stock '.$order);
    $zero = 0;
    $query->bindParam(':pro_stock', $zero); //paramètre 
    $query->execute();//execution
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) //notre boucle while pour afficher tout les produit
    {

       echo ' <tr  class="table-striped-warning">
        <td ><img width="100" src="src/img/'.$row['pro_id'].'.'.$row['pro_photo'].'" alt="'.$row['cat_nom'].' '.$row['pro_libelle'].'"  title="'.$row['cat_nom'].' '.$row['pro_libelle'].'" class="img-fluid" /></td>
        <td>'.$row['pro_id'].'</td>
        <td>'.$row['cat_nom'].'</td>
        <td>'.$row['pro_ref'].'</td>
        <td>'.$row['pro_libelle'].'</td>
        <td>'.$row['pro_prix'].'&euro;</td>
        <td>'.$row['pro_couleur'].'</td>
        <td> <a href="detail.php?pro_id='.$row['pro_id'].'" title="Voir" alt="Voir">Voir</a></td>
      </tr>';

    }
        ?>
     
                    </tbody>
                  </table> <!--fin du tableau-->
                </div><!--fermeture de la div table responsive-->
                </article>
        </div>
    </div>
</div> 

    <!--
        Footer
    -->
    <?php include('footer.php');?>
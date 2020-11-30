<?php 
define("title","Nos produit");
define("description","Notre gamme de produit");
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
                <h2>Nos produits</h2>
                <div class="table-responsive">
                <table class="table table-sm table-striped table-bordered"><!--début du tableau-->
            <thead class="thead-light">
              <tr>
              <th  scope="col">Photo</th><!--titre colonne 1-->
              <th scope="col" >Id</th><!--colonne 2-->
              <th scope="col">Catégorie</th><!--titre colonne 3-->
              <th scope="col">Libellé</th><!--titre colonne 4-->
              <th scope="col">Prix</th><!--titre colonne 5-->
              <th scope="col">Couleur</th><!--titre colonne 6-->
            </tr>
            </thead>
            <tbody>
                    <tr  class="table-warning"><!--ligne 1-->
                      <td ><img width="100" src="src/img/7.jpg" alt="Barbecue Aramis"  title="Barbecue Aramis" class="img-fluid" /></td>
                      <td>7</td>
                      <td>Barbecue</td>
                      <td>Aramis</td>
                      <td>110&euro;</td>
                      <td>Brun</td>
                    </tr>
            
                    <tr><!--ligne 2-->
                      <td ><img width="100" src="src/img/8.jpg" alt="Barbecue Athos"  title="Barbecue Athos" class="img-fluid" /></td>
                      <td>8</td>
                      <td>Barbecue</td>
                      <td>Athos</td>
                      <td>249.99&euro;</td>
                      <td>Noir</td>
                    </tr>
            
                    <tr class="table-warning"><!--ligne 3-->
                      <td ><img width="100" src="src/img/11.jpg" alt="Barbecue Clatronic"  title="Barbecue Clatronic" class="img-fluid" /></td>
                      <td>11</td>
                      <td>Barbecue</td>
                      <td>Clatronic</td>
                      <td>135.90&euro;</td>
                      <td>Chrome</td>
                    </tr>
            
                    <tr><!--ligne 4-->
                      <td><img width="100" src="src/img/12.jpg" alt="Barbecue Camping"  title="Barbecue Camping" class="img-fluid" /></td>
                      <td>12</td>
                      <td>Barbecue</td>
                      <td>Camping</td>
                      <td>88.00&euro;</td>
                      <td>Noir</td>
                    </tr>
            
                    <tr class="table-warning"><!--ligne 5-->
                      <td ><img width="100" src="src/img/13.jpg" alt="Brouette Green"  title="Brouette Green" class="img-fluid" /></td>
                      <td>7</td>
                      <td>Brouette</td>
                      <td>Green</td>
                      <td>49.00&euro;</td>
                      <td>Brun</td>
                    </tr>
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
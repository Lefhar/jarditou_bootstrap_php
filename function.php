<?php
function error($id){
    if($id ==1){
        $error = '<div class="alert alert-danger" role="alert">
        Vous avez fait une erreur dans la modification veuillez bien vérifier tout les champs!
      </div>';
    }elseif($id ==2){
        $error = '<div class="alert alert-danger" role="alert">
        Vous avez fait une erreur dans l\'ajout du produit vérifier tout les champs!
      </div>';
    }else{
        $error ="";

    }
    return $error;
}
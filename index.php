<?php 
$file = basename($_SERVER['PHP_SELF']);
if(file_exists($file))
{
    switch($file){
        case 'index.php';
        include('accueil.php');
    break;
    default :
        include($file);
    }

}
else
{
    include('404.php');
}
?>
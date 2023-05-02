<?php 
if (isset($_GET['del'])){
   $del = $_GET['del'];
    unset($_SESSION['panier'][$del]);
}

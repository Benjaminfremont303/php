<?php
   include ("base.php");
   class employes extends db {
    function listeEmployes() {
     $result=$this->prepare("SELECT * FROM employes");
      $result->execute();
     $liste=$result->fetchAll();
     return $liste;
    }
   }
<?php
 class db extends PDO {
  public function __construct() {
    parent::__construct( 'mysql:host=localhost;dbname=company;charset=utf8','root','');
  }
 }


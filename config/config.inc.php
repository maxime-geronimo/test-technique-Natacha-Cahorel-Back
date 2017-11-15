<?php
/**
 * Created by PhpStorm.
 * User: natacha
 * Date: 15/11/2017
 * Time: 19:25
 */

$dsn ="mysql:host=localhost;dbname=test_geronimo;charset=utf8";
$userlogin="root";
$password="motdepasse";
$connexion= new PDO($dsn,$userlogin,$password);
$connexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$connexion->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

<?php
include_once '../repository/productRepository.php';

$repo = new ProductRepository();
$repo->deleteProduct($_GET['id']);

header("location:productDashboard.php");
?>
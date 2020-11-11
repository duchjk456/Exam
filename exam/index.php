<?php
use Exam\Controller\ProductController;
require __DIR__ . "/vendor/autoload.php";

$productController=new ProductController();
$page=isset($_REQUEST['page'])?$_REQUEST['page']:null;
switch ($page){
    case "add":
        $productController->addProduct();
        break;
    case "delete":
        $productController->deleteProduct();
        break;
    case "edit":
        $productController->editProduct();
        break;
    case "search":
        $productController->searchProduct();
        break;
    default: $productController->showAllProduct();
}
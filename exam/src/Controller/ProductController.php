<?php
namespace Exam\Controller;
use Exam\Model\Products;
use Exam\Model\ProductModel;
class ProductController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel=new ProductModel();
    }

    public function showAllProduct()
    {
        $products=$this->productModel->getAll();
        include_once "src/View/listProduct.php";
    }

    public function deleteProduct()
    {
        $id=$_REQUEST['id']?$_REQUEST['id']:null;
        $this->productModel->delete($id);
        header('location:index.php');
    }

    public function addProduct()
    {
        if($_SERVER['REQUEST_METHOD']=='GET'){
            include_once "src/View/add.php";
        }else{
            $name=$_REQUEST['name'];
            $line=$_REQUEST['line'];
            $price=$_REQUEST['price'];
            $quantity=$_REQUEST['quantity'];
            $content=$_REQUEST['content'];
            $product=new Products($name,$line,$price,$quantity,$content);
            $today=date('Y/m/d');
            $this->productModel->add($product,$today);
            header("location:index.php");
        }
    }

    public function editProduct()
    {
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $id=$_REQUEST['id'];
            $product=$this->productModel->getProductById($id);
            include_once "src/View/edit.php";
        }else{
            $id=$_REQUEST['id'];
            $product=$this->productModel->getProductById($id);
            $name=$_REQUEST['name'];
            $line=$_REQUEST['line'];
            $price=$_REQUEST['price'];
            $quantity=$_REQUEST['quantity'];
            $content=$_REQUEST['content'];
            $newProduct=new Products($name,$line,$price,$quantity,$content);
            $today=date('Y/m/d');
            $newProduct->setId($id);
            $this->productModel->edit($newProduct,$today);
            header('location:index.php');
        }
    }

    public function searchProduct()
    {
       if ($_SERVER['REQUEST_METHOD']=='POST'){
           $search="%".$_REQUEST['search']."%";
           $result=$this->productModel->searchByName($search);
           include_once "src/View/search.php";
       }
    }
}
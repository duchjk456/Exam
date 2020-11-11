<?php


namespace Exam\Model;


class ProductModel
{
    protected $database;

    public function __construct()
    {
        $db=new DBConnect();
        $this->database=$db->connect();
    }

    public function getAll()
    {
        $sql="select * from product";
        $stmt=$this->database->query($sql);
        $data=$stmt->fetchAll();
        $array=[];
        foreach ($data as $item){
            $product=new Products($item['name'],$item['line'],$item['price'],$item['quantity'],$item['productContent']);
            $product->setId($item['id']);
            array_push($array,$product);
        }
        return $array;
    }

    public function delete($id)
    {
        $sql="delete from product where id=:id";
        $stmt=$this->database->prepare($sql);
        $stmt->bindParam(":id",$id);
        return $stmt->execute();
    }

    public function add($product,$today)
    {
        $sql="INSERT INTO `product`(`name`, `line`, `price`, `quantity`, `createDate`, `productContent`) VALUES (:name,:line,:price,:quantity,:createDate,:productContent)";
        $stmt=$this->database->prepare($sql);
        $stmt->bindParam(":name",$product->getName());
        $stmt->bindParam(":line",$product->getLine());
        $stmt->bindParam(":price",$product->getPrice());
        $stmt->bindParam(":quantity",$product->getQuantity());
        $stmt->bindParam(":productContent",$product->getProductContent());
        $stmt->bindParam(":createDate",$today);
        $stmt->execute();
    }

    public function edit($product,$today)
    {
        $sql='UPDATE `product` SET `name`=:name,`line`=:line,`price`=:price,`quantity`=:quantity,`createDate`=:createDate,`productContent`=:productContent WHERE id=:id';
        $stmt=$this->database->prepare($sql);
        $stmt->bindParam(':name',$product->getName());
        $stmt->bindParam(':line',$product->getLine());
        $stmt->bindParam(':price',$product->getPrice());
        $stmt->bindParam(':quantity',$product->getQuantity());
        $stmt->bindParam(':createDate',$today);
        $stmt->bindParam(':productContent',$product->getproductContent());
        $stmt->bindParam(':id',$product->getId());
        $stmt->execute();
    }

    public function getProductById($id)
    {
        $sql='select * from product where id=:id';
        $stmt=$this->database->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $item=$stmt->fetch();
        $product=new Products($item['name'],$item['line'],$item['price'],$item['quantity'],$item['productContent']);
        $product->setId($id);
        return $product;
    }

    public function searchByName($name)
    {
        $sql="select * from product where name like '$name'";
        $stmt=$this->database->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetchAll();
        $arr=[];
        foreach ($result as $item){
            $product= new Products($item['name'],$item['line'],$item['price'],$item['quantity'],$item['productContent']);
         $arr[]=$product;
        }
        return $arr;
    }
}
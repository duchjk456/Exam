<?php


namespace Exam\Model;


class Products
{
    protected $id;
    protected $name;
    protected $line;
    protected $price;
    protected $quantity;
    protected $productContent;

    public function __construct($_name,$_line,$_price,$_quantity,$_productContent)
    {
        $this->name=$_name;
        $this->line=$_line;
        $this->price=$_price;
        $this->quantity=$_quantity;
        $this->productContent=$_productContent;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @param mixed $line
     */
    public function setLine($line)
    {
        $this->line = $line;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getProductContent()
    {
        return $this->productContent;
    }

    /**
     * @param mixed $productContent
     */
    public function setProductContent($productContent)
    {
        $this->productContent = $productContent;
    }

}
<?php


namespace Exam\Model;
use PDO;
class DBConnect
{
    protected $dbn;
    protected $user;
    protected $pass;

    public function __construct()
    {
        $this->dbn="mysql:host=localhost;dbname=quanlihanghoa";
        $this->user='root';
        $this->pass='12345678@abc';
    }

    public function connect()
    {
        $connect=null;
        $connect= new PDO($this->dbn,$this->user,$this->pass);
        return $connect;
    }
}
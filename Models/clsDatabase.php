<?php
class clsDatabase
{
    public $conn = null;
    public $pdo_stm = null;
    function __construct()
    {
        try {
            $this->conn = new pdo("mysql:host=localhost;dbname=website-project", "root", '');
            $this->conn->exec('set names utf8');
        } catch (\Throwable $th) {
            echo '<h3>' . $th->getMessage() . '</h3>';
            die('loi database');
        }
    }

    function ThucThiSQL($sql, $data = null)
    {
        $this->pdo_stm = $this->conn->prepare($sql);
        $result = false;
        if ($data !== null) {
            $result =   $this->pdo_stm->execute($data);
        } else
            $result = $this->pdo_stm->execute();
        return $result;
    }
}
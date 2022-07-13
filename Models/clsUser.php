<?php
require_once('clsDatabase.php');
class clsUser
{
    public $db;
    public $data;


    function __construct()

    {
        $this->db = new clsDatabase();
        $this->data = (object) [];
    }

    function show()
    {
        $userId  = $_SESSION["id"];
        $sql =            "SELECT * from user where id = ? ";
        $result =  $this->db->ThucThiSQL($sql, [$userId]);
        $this->data = (object)[];
        if ($result)
            $this->data = $this->db->pdo_stm;
        return $result;
    }
    function login($email, $password)
    {
        $sql = "SELECT * from user where email = ? and password = ?";
        $data[] = $email;
        $data[] = $password;
        $this->db->ThucThiSQL($sql, $data);
        $this->data = (object)[];
        $result = $this->db->pdo_stm->rowCount() != 0 ? true : false;
        echo $this->db->pdo_stm->rowCount();
        if ($result == true)
            $this->data = $this->db->pdo_stm;
        return $result;
    }

    function register($name, $email, $password, $address, $telephone)
    {

        $sql =   "SELECT * from user where email = ? ";
        $result =  $this->db->ThucThiSQL($sql, [$email]);
        if ($this->db->pdo_stm->rowCount() != 0)
            return false;
        $sql = "INSERT INTO `user` (`id`, `name`, `email`, `password`, `address`, `telephone`) 
        VALUES (NULL, ?,?,? , ?, ?);";
        $data[] = $name;
        $data[] = $email;
        $data[] = $password;
        $data[] = $address;
        $data[] = $telephone;
        $result =  $this->db->ThucThiSQL($sql, $data);
        return $result;
    }

    public function update($name, $email, $password, $address, $telephone)
    {
        $sql = "UPDATE `user` SET `name` = ?,`email` = ?, `password` = ?,`address` = ?,`telephone` = ? WHERE `user`.`id` = ?;";
        $data[] = $name;
        $data[] = $email;
        $data[] = $password;
        $data[] = $address;
        $data[] = $telephone;
        $data[] = $_SESSION["id"];

        $result =   $this->db->ThucThiSQL($sql, $data);
        return $result;
    }
}
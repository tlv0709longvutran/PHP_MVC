<?php

require_once("clsDatabase.php");
class clsCategory
{
    public $db;
    public $data;
    function __construct()
    {
        $this->db = new clsDatabase();
        $this->data = array();
    }

    function ShowDSCategory()
    {
        $sql = "SELECT * FROM categori";
        $ketqua = $this->db->ThucthiSQL($sql);
        if ($ketqua == TRUE)
            $this->data = $this->db->pdo_stm->fetchAll();
        return $ketqua;
    }
    function TimCategoryTheoID($id)
    {
        $sql = "SELECT * FROM categori WHERE id=?";
        $data[] = $id;
        $ketqua = $this->db->ThucthiSQL($sql, $data);
        if ($ketqua == TRUE)
            $this->data = $this->db->pdo_stm->fetch();
        return $ketqua;
    }
    //hàm thêm sản phẩm
    function ThemCategory($name, $descript, $image_name, $active)
    {
        $sql = "INSERT INTO categori VALUES(NULL,?,?,?,?)";
        $data[] = $name;
        $data[] = $descript;
        $data[] = $image_name;
        $data[] = $active;

        $ketqua = $this->db->ThucthiSQL($sql, $data);
        return $ketqua;
    }
    //hàm sửa sản phẩm
    function UpdateCategory($id, $name, $descript, $image_name, $active)
    {
        $sql = "UPDATE categori SET name=?, descript=?, image_name=? , active=? WHERE id=?";

        $data[] = $name;
        $data[] = $descript;
        $data[] = $image_name;
        $data[] = $active;
        $data[] = $id;
        $ketqua = $this->db->ThucthiSQL($sql, $data);
        return $ketqua;
    }
    function TimTheoIDCategory($id)
    {
        $sql = "SELECT * FROM categori WHERE id=?";
        $data[] = $id;
        $ketqua = $this->db->ThucthiSQL($sql, $data);

        $this->data = NULL;
        if ($ketqua == TRUE)
            $this->data = $this->db->pdo_stm->fetch();
        return $ketqua;
    }
    function checkCate($id)
    {
        $sql = "SELECT * FROM `food`  where  cateId = ? ";
        $this->db->ThucThiSQL($sql, [$id]);
        $count = $this->db->pdo_stm->rowCount();
        $result = false;
        if ($count === 0)
            $result = true;
        return $result;
    }
    //hàm xóa sản phẩm
    function XoaCategory($id)
    {
        $sql = "DELETE FROM categori WHERE id=?";
        $data[] = $id;
        $ketqua = $this->db->ThucthiSQL($sql, $data);
        return $ketqua;
    }

    function Count_Category()
    {

        $sql = "SELECT COUNT(*) AS CountCategory FROM categori";
        $ketqua = $this->db->ThucthiSQL($sql);

        $this->data = NULL;
        if ($ketqua == TRUE) {
            $this->data = $this->db->pdo_stm->fetch();
            return $this->data["CountCategory"];
        } else {
            return 0;
        }
    }
}
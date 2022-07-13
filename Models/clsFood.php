<?php



require_once('clsDatabase.php');
class clsFood
{

    public $data;
    public $db;
    public function __construct()
    {
        $this->db = new clsDatabase();
        $this->data = (object)[];
    }

    public function showFood()
    {
        $sql = 'SELECT * FROM food where active = 1 order by id desc ';
        $result =  $this->db->ThucThiSQL($sql);
        $this->data = (object)[];

        if ($result)
            $this->data = $this->db->pdo_stm;
        return $result;
    }

    public function searchFood($name)
    {
        $sql = 'SELECT * from food where name like ?"%" and active = 1';
        $result = $this->db->ThucThiSQL($sql, [$name]);
        $this->data = (object)[];

        if ($result)
            $this->data = $this->db->pdo_stm;
        return $result;
    }

    public function showFoodByCate()
    {
        $sql = 'SELECT *, `categori`.name as cateName, `categori`.`descript` as cateDescript,
         `food`.`descript` as foodDescript, `food`.name as foodName, `food`.image_name as foodImage, `food`.id as foodId 
         FROM categori INNER JOIN food ON categori.id = food.cateId where food.active = 1 order by categori.id;';
        $result = $this->db->ThucThiSQL($sql);
        $this->data = (object)[];

        if ($result)
            $this->data = $this->db->pdo_stm;
        return $result;
    }

    public function showFoodByPrice()
    {
        $sql = 'SELECT * FROM food where active = 1 order by (price*(1-sale/100)) ';
        $result = $this->db->ThucThiSQL($sql);
        $this->data = (object)[];

        if ($result)
            $this->data = $this->db->pdo_stm;
        return $result;
    }
    public function showFoodBySale()
    {
        $sql = 'SELECT * FROM food where active = 1 order by sale desc ';
        $result = $this->db->ThucThiSQL($sql);
        $this->data = (object)[];

        if ($result)
            $this->data = $this->db->pdo_stm;
        return $result;
    }
    public function showFoodById($id)
    {
        $sql = 'SELECT * FROM food where id = ?';
        $result = $this->db->ThucThiSQL($sql, [$id]);
        $this->data = (object)[];

        if ($result)
            $this->data = $this->db->pdo_stm;
        return $result;
    }
    public function showFoodRelated($foodId, $cateId)
    {
        $sql = 'SELECT * FROM categori
       INNER JOIN food ON categori.id = food.cateId where `categori`.id = ? and `food`.id != ?;';
        $result = $this->db->ThucThiSQL($sql, [$cateId, $foodId]);
        $this->data = (object)[];
        if ($result)
            $this->data = $this->db->pdo_stm;
        return $result;
    }
    function getListFood()
    {
        $sql = "SELECT * FROM food ";
        $ketqua = $this->db->ThucthiSQL($sql);
        if ($ketqua == TRUE)
            $this->data = $this->db->pdo_stm->fetchAll();
        return $ketqua;
    }
    //Hàm thêm Food
    function AddFood($name, $descript, $price, $image_name, $active, $cateId, $sale)
    {

        $sql = "INSERT INTO food VALUES(NULL,?,?,?,?,?,?,?)";
        $data[] = $name;
        $data[] = $descript;
        $data[] = $price;
        $data[] = $image_name;
        $data[] = $active;
        $data[] = $cateId;
        $data[] = $sale;
        $ketqua = $this->db->ThucthiSQL($sql, $data);
        return $ketqua;
    }

    // ------- check food ---------
    function checkFood($id)
    {
        $sql = "SELECT * FROM `food` 
                INNER JOIN `ordereddetail` on `food`.`id` = `ordereddetail`.`foodId`
                where   `food`.`id` = ? ";
        $this->db->ThucThiSQL($sql, [$id]);
        $count = $this->db->pdo_stm->rowCount();
        $result = false;
        if ($count === 0)
            $result = true;
        return $result;
    }
    // ------- off food ---------
    function offFood($id)
    {
        $sql = "UPDATE food 
                SET active=0 WHERE id=?";
        $ketqua = $this->db->ThucthiSQL($sql, [$id]);
        if (!$ketqua)
            return $ketqua;
        $sql = "DELETE FROM orderdetail WHERE `orderdetail`.`foodId` = ?";
        $ketqua = $this->db->ThucthiSQL($sql, [$id]);
        return $ketqua;
    }
    function getFood($id)
    {
        $sql = "SELECT * FROM food WHERE id=?";
        $data[] = $id;
        $ketqua = $this->db->ThucthiSQL($sql, $data);
        return $ketqua;
        if ($ketqua == TRUE)
            $this->data = $this->db->pdo_stm->fetch();
        return $ketqua;
    }

    function TimTheoIDFood($id)
    {
        $sql = "SELECT * FROM food WHERE id=?";
        $data[] = $id;
        $ketqua = $this->db->ThucthiSQL($sql, $data);
        $this->data = NULL;
        if ($ketqua == TRUE)
            $this->data = $this->db->pdo_stm->fetch();
        return $ketqua;
    }
    //Hàm Sửa Food
    function UpdateFood($id, $name, $descript, $price, $image_name, $active, $cateId, $sale)
    {
        $sql = "UPDATE food 
                SET name=?,descript=?,price=?,image_name=?,active=?,cateId=?,sale=? WHERE id=?";
        $data[] = $name;
        $data[] = $descript;
        $data[] = $price;
        $data[] = $image_name;
        $data[] = $active;
        $data[] = $cateId;
        $data[] = $sale;
        $data[] = $id;
        $ketqua = $this->db->ThucthiSQL($sql, $data);
        return $ketqua;
    }
    //Hàm Xóa Food
    function DeleteFood($id)
    {
        $sql = "DELETE FROM food WHERE id=?";
        $data[] = $id;
        $ketqua = $this->db->ThucthiSQL($sql, $data);
        return $ketqua;
    }

    function Count_Food()
    {

        $sql = "SELECT COUNT(*) AS CountFood FROM food";
        $ketqua = $this->db->ThucthiSQL($sql);
        $this->data = NULL;
        if ($ketqua == TRUE) {
            $this->data = $this->db->pdo_stm->fetch();
            return $this->data["CountFood"];
        } else {
            return 0;
        }
    }
}
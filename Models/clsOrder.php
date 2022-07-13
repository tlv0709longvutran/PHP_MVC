<?php

use LDAP\Result;

require_once('clsDatabase.php');
class clsOrder
{

    public $data;
    public $db;
    public function __construct()
    {
        $this->db = new clsDatabase();
        $this->data = (object)[];
    }

    // --------- update total order ---------

    public function updateTotalOrder($userId)
    {

        $sql = "SELECT `order`.id, sum((1 - `food`.sale / 100) *`food`.price * `orderdetail`.`qty`) as total FROM `orderdetail`
                 INNER JOIN `order` ON `orderdetail`.orderId = `order`.id
                INNER JOIN `food` ON `orderdetail`.foodId = `food`.id  where `order`.userId = ?;";
        $this->db->ThucThiSQL($sql, [$userId]);
        $totalOrder = $this->db->pdo_stm->fetch()['total'];

        return (int) $totalOrder;
    }
    public function delFoodOrder($foodId)
    {
        $userId = $_SESSION["id"];
        $sql = 'SELECT id FROM `order` WHERE userId = ?';
        $this->db->ThucThiSQL($sql, [$userId]);
        $orderId = $this->db->pdo_stm->fetch()['id'];

        $sql = "DELETE FROM `orderdetail` WHERE `foodId` = ? and  `orderId` = ?  ";
        $result =  $this->db->ThucThiSQL($sql, [$foodId, $orderId]);
        return $result;
    }
    public function addOrder($foodId)
    {
        $userId = $_SESSION["id"];
        $sql = 'SELECT id FROM `order` WHERE userId = ?';
        $result =  $this->db->ThucThiSQL($sql, [$userId]);
        $orderId = 0;
        if (!$result)
            return $result;
        if ($this->db->pdo_stm->rowCount() === 0) {
            // ---- them order -----
            $sql = "INSERT INTO `order` (`id`, `userId`, `total`) VALUES (NULL, ?, '0');";
            $this->db->ThucThiSQL($sql, [$userId]);

            // ------ lay id order ---------
            $sql = "SELECT id FROM `order` WHERE userId = ?;";
            $this->db->ThucThiSQL($sql, [$userId]);
        }

        // ------ lay id order ---------
        $orderId = $this->db->pdo_stm->fetch()['id'];

        // ------- check san pham ton tai chua --------
        $sql = "SELECT * from `orderdetail` where foodId =? and orderId =? ";
        $this->db->ThucThiSQL($sql, [$foodId, $orderId]);

        if ($this->db->pdo_stm->rowCount() != 0)

        // ------ tang qty cua san pham -----------
        {
            $value = $this->db->pdo_stm->fetch()['qty'] + 1;
            $sql = "UPDATE `orderdetail` SET `qty` = ? WHERE `orderdetail`.`foodId` = ? and `orderdetail`.`orderId` = ?;";
            $result =  $this->db->ThucThiSQL($sql, [$value, $foodId, $orderId]);
        }
        // ------- them san pham --------
        else {
            $sql = "INSERT INTO `orderdetail` (`id`, `orderId`, `foodId`, `qty`) VALUES (NULL, ?,?, '1');";
            $result = $this->db->ThucThiSQL($sql, [$orderId, $foodId]);
        }


        return $result;
    }

    public function updateOrder($cart)
    {
        $userId = $_SESSION["id"];
        // ------ lay id order ---------
        $sql = 'SELECT id FROM `order` WHERE userId = ?';
        $this->db->ThucThiSQL($sql, [$userId]);
        $orderId = $this->db->pdo_stm->fetch()['id'];
        foreach ($cart as $id => $value) {
            $sql = "UPDATE `orderdetail` SET `qty` = ? WHERE `orderdetail`.`foodId` = ? and `orderdetail`.`orderId` = ?;";
            $result =   $this->db->ThucThiSQL($sql, [$value, $id, $orderId]);
            if (!$result)
                return $result;
        }

        return $result;
    }



    public function showOrder()
    {
        $userId = $_SESSION["id"];
        $sql = "SELECT *, `order`.id as orderId FROM `order` 
                INNER JOIN `orderdetail` on `order`.`id` = `orderdetail`.`orderId` 
                INNER join food on `orderdetail`.`foodId` = `food`.`id`
                 WHERE `order`.`userId` = ?;";
        $result =  $this->db->ThucThiSQL($sql, [$userId]);
        $this->data = (object)[];
        if ($result) {

            $this->data = $this->db->pdo_stm;
        }
        return $result;
    }

    public function showOrdered()
    {
        $userId = $_SESSION["id"];
        $sql = "SELECT  `ordered`.id as orderedId,`food`.id  as foodId, 
                 `ordereddetail`.piece as piece , `food`.name as name , 
                 `ordereddetail`.`price`as price, `ordered`.`price` as total  FROM `ordered` 
                INNER JOIN `ordereddetail` on `ordered`.`id` = `ordereddetail`.`orderedId` 
                INNER join food on `ordereddetail`.`foodId` = `food`.`id` 
                WHERE `ordered`.`userId` = ?;";
        $result =  $this->db->ThucThiSQL($sql, [$userId]);
        $this->data = (object)[];

        if ($result) {
            $this->data = $this->db->pdo_stm;
        }
        return $result;
    }

    public function checkOut($address, $telephone, $totalOrder)
    {
        $userId = $_SESSION["id"];


        // -------them ordered ------------
        $sql = "INSERT INTO `ordered` (`id`, `userId`, `address`, `telephone`, `date`, `price`, `auth`)
         VALUES (null,'$userId', '$address', '$telephone', current_timestamp(),'$totalOrder', '0'); ";
        $this->db->conn->exec($sql);
        $orderedId =  $this->db->conn->lastInsertId();

        // ------ lay orderdetail ------------
        $sql = "SELECT *, `order`.id as orderId, `orderdetail`.id as orderDetailId FROM `order` 
                INNER JOIN `orderdetail` on `order`.`id` = `orderdetail`.`orderId` 
                INNER join food on `orderdetail`.`foodId` = `food`.`id`
                 WHERE `order`.`userId` = ?;";
        $this->db->ThucThiSQL($sql, [$userId]);
        $data = $this->db->pdo_stm;
        while ($row = $data->fetch()) {
            // --------- chuyen orderdetail thanh ordereddetail ----------
            $sql = "INSERT INTO `ordereddetail` (`id`, `orderedId`, `foodId`, `price`, `piece`) 
                    VALUES (NULL, ?, ?, ?, ?);";
            $this->db->ThucThiSQL($sql, [$orderedId, $row['foodId'], $row['price'] * (1 - ($row['sale'] / 100)), $row['qty']]);
            $sql = "DELETE FROM orderdetail WHERE `orderdetail`.`id` = ?";
            $result = $this->db->ThucThiSQL($sql, [$row['orderDetailId']]);
            if (!$result)
                return $result;
        }
        // -------- xoa order ---------
        $sql = "DELETE FROM `order` WHERE `userId` = ?";
        $result =  $this->db->ThucThiSQL($sql, [$userId]);
        return $result;
    }
}
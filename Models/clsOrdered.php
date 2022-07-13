<?php
require_once("clsDatabase.php");
class clsOrdered
{
	public $db;
	public $data;
	function __construct()
	{
		$this->db = new clsDatabase();
		$this->data = array();
	}

	function ShowDsOrder()
	{
		$sql = "SELECT * ,ordered.id AS orderedID,ordered.telephone
		 AS orderedPhone,ordered.address AS orderedAddress FROM ordered
			INNER JOIN user ON  ordered.userId = user.id ";
		$ketqua = $this->db->ThucthiSQL($sql);

		$this->data = NULL;
		if ($ketqua == TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;
	}
	function totalOrdered()
	{
		$sql = "SELECT sum(price) as total FROM ordered ";
		$ketqua = $this->db->ThucthiSQL($sql);

		$this->data = NULL;
		if ($ketqua == TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;
	}
	function ShowDsOrderUser()
	{
		$userId = $_SESSION['id'];
		$sql = "SELECT * ,ordered.id AS orderedID,ordered.telephone 
		AS orderedPhone,ordered.address AS orderedAddress FROM ordered
			INNER JOIN user ON  ordered.userId = user.id WHERE ordered.userId = ?  ";
		$ketqua = $this->db->ThucthiSQL($sql, [$userId]);

		$this->data = NULL;
		if ($ketqua == TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;
	}

	function Count_Ordered()
	{

		$sql = "SELECT COUNT(*) AS CountOrder FROM ordered";
		$ketqua = $this->db->ThucthiSQL($sql);

		$this->data = NULL;
		if ($ketqua == TRUE) {
			$this->data = $this->db->pdo_stm->fetch();
			return $this->data["CountOrder"];
		} else {
			return 0;
		}
	}



	function TimOrder($id)
	{
		$sql = "SELECT * FROM ordered WHERE id=?";
		$data[] = $id;
		$ketqua = $this->db->ThucthiSQL($sql, $data);
		$this->data = NULL;
		if ($ketqua == TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;
	}


	function Ordereddetail($id)
	{
		$sql = "SELECT *,  `ordered`.id AS orderedId,`food`.id  AS foodId, 
					`ordereddetail`.piece AS piece , `food`.name AS name , 
					`ordereddetail`.`price`AS price, `ordered`.`price` AS total,
					`user`.`name` AS userName  FROM `ordered` 
				INNER JOIN `ordereddetail` ON `ordered`.`id` = `ordereddetail`.`orderedId` 
				INNER JOIN `food` ON `ordereddetail`.`foodId` = `food`.`id` 
				INNER JOIN user ON `ordered`.userId = `user`.id
				WHERE `ordered`.`id` = ?";
		$data[] = $id;
		$ketqua = $this->db->ThucthiSQL($sql, $data);

		$this->data = NULL;
		if ($ketqua == TRUE)
			$this->data = $this->db->pdo_stm;
		return $ketqua;
	}

	function ChangeActiveOrder($data)
	{
		foreach ($data as $id => $value) {
			if ($id == 'submit')
				continue;
			$sql = "UPDATE ordered SET auth = ? WHERE id=?";

			$ketqua = $this->db->ThucthiSQL($sql, [$value, $id]);
			if (!$ketqua)
				return $ketqua;
		}
		return $ketqua;
	}




	function AddOrdered($hoten, $diachi, $dienthoai, $ngaynhan)
	{
		$sql = "INSERT INTO tbOrder(tennguoimua,diachi,dienthoai,ngaynhan) 
				VALUES(?,?,?,?)";
		$data[] = $hoten;
		$data[] = $diachi;
		$data[] = $dienthoai;
		$data[] = $ngaynhan;
		$ketqua = $this->db->ThucthiSQL($sql, $data);
		return $ketqua;
	}

	function getLastId()
	{
		return $this->db->conn->lastInsertId();
	}

	function AddOrdereddetail($id, $orderedid, $foodid, $price, $piece)
	{
		$sql = "INSERT INTO tbChitietOrder VALUES(NULL,?,?,?,?,?)";
		$data[] = $id;
		$data[] = $orderedid;
		$data[] = $foodid;
		$data[] = $price;
		$data[] = $piece;
		$ketqua = $this->db->ThucthiSQL($sql, $data);
		return $ketqua;
	}
}
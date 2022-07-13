<?php
require_once("clsDatabase.php");
class clsAdmin extends clsDatabase
{
	public $data = NULL;//để chứa mảng kết quả của SELECT 
    function __construct()
    {
        parent::__construct();//gọi hàm tạo của clsDatabaser để kết nối CSDL
    }	
	function KiemTraTaiKhoan($full_name,$password)
	{
		$sql = "SELECT * FROM admin WHERE name=? and password=?";
		
		$data[] = $full_name;
		$data[] = $password;
 		$ketqua = $this->thucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	function ThemTaiKhoan($full_name,$username,$password)
	{
		$sql = "INSERT INTO admin VALUES (NULL,?,?,?)";
		$data[] = $full_name;
		$data[] = $username;
		$data[] = $password;
 		$ketqua = $this->ThucthiSQL($sql,$data);
		return $ketqua;
	}

	function LayDSAdmin()
	{
		$sql =  "SELECT * FROM admin";
		$ketqua = $this->ThucthiSQL($sql);
        if($ketqua==TRUE)//thành công thì lưu các bản ghi kết quả vào $data
            $this->data = $this->pdo_stm->fetchAll();
        return $ketqua;//TRUE/FALSE
	}

	public function XoaAdmin($id)
    {
        $sql = "DELETE FROM admin WHERE id=?";
        $param = [$id];
        $ketqua = $this->ThucthiSQL($sql, $param);
        return $ketqua;
    }
}
?>
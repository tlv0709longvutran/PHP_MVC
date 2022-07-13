<?php
if($category->data==NULL)
{
	$thongbao ="không tìm thấy thông tin";
	require("Views/vKetqua.php");
}
else
{
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thêm sản phẩm</title>
</head>
<body>
    <h1> UpDate Category</h1>
    <?php
    if($id=="")
    {
        $noidung_thongbao = "Chưa có id sửa";
        require_once('vThongbao.php');
        die();
    }
    if(is_numeric($id)==false)
    {
        $noidung_thongbao = "id phải là số";
        require_once('vThongbao.php');
        die();
    }
    if($ketqua==FALSE)
    {
        $noidung_thongbao = "LỖI TRUY VẤN CSDL";
        require_once('vThongbao.php');
        die();
    }
    if($category->data==NULL)
    {
        $noidung_thongbao = "không tìm thấy sản phẩm có id=$id";
        require_once('vThongbao.php');
        die();
    }
    $row = $category->data;
    ?>
    <form action="?module=<?=$module?>&act=xulysua" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr>
                <td>Name: </td>
                <td>
                    <input type="text" name="name" value="<?=$row['name']?>">
                </td>
            </tr>
            <tr>
                <td>Descript: </td>
                <td>
                    <input type="text" name="descript" value="<?=$row['descript']?>">
                </td>
            </tr>
            <tr>
                <td>Current Image: </td>
                <?php
				  $image_name = $row["image_name"];
				  if($image_name=="")
				  	$image_name= "no-Image.png";
				  ?>
                  <td>
                  <img width="100" src="Uploads/image/<?=$image_name?>"><br>
                  <input type="hidden" name="anhHientai" id="anhHientai" value="<?=$row["image_name"]?>">
                </td>
            </tr>
            <tr>
                <td>New Image: </td>
                <td>
                    <input type="file" name="image_name">
                </td>
            </tr>
            <tr>
                <td>Active: </td>
                <td>
                    <input  type="radio" name="active" value="Yes" <?=($row["active"]==1)?"checked":""?>> Yes
                    <input  type="radio" name="active" value="No"  <?=($row["active"]==0)?"checked":""?>> No
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                </td>                       
            </tr>
        </table>
</form>
</body>
</html>
<?php
}
?>
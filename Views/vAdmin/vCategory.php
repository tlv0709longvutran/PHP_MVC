<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website - Home Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    
    <!-- Main Content Section Start  -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Category</h1>
            <br />

            <br><br><br>
            <!-- Button to add admin -->
            <a href="?module=<?=$module?>&act=them" class="btn-primary">Add Category</a>

            <br /><br /><br />
            <table class="tbl-full" >
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Descript</th>
                        <th>Image</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $rows = $category->data;
                    foreach($rows as $row)
				    {
					    $image_name = $row["image_name"];
					    if($image_name=="")
						    $image_name = "no-Image.png";
                            $active="";
                        if($row["active"]==1)
                            $active = "Yes";
                        else
                            $active = "No";
                    ?>
                    <tr>
                        <td> <?=$row["id"]?> </td>
                        <td> <?=$row["name"]?> </td>
                        <td> <?=$row["descript"]?> </td>
                        <td align="center"> <img width="80" src="Uploads/image/<?=$image_name?>"> </td>
                        <td> <?=$row["active"]?> </td>
                        <td>
                            <a href="?module=<?=$module?>&act=sua&id=<?=$row["id"]?>" class="btn-secondary">Update Category</a>
                            <a href="?module=<?=$module?>&act=xoa&id=<?=$row["id"]?>" class="btn-danger">Delete Category</a>
                        </td>
                    </tr>
                        <?php
                            }//đóng foreach
                        ?>
            </table>

        </div>
    </div>
    <!-- Main Content Section End  -->


</body>
</html>

</html>
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

    <div class="main-content">
            <div class="wrapper">
                <h1>DASHBOARD</h1>
                <br><br>
                
                <br><br>
                <div class="col-4 text-center">
                    <h1>
                        <?php
                        require("Models/clsCategory.php");
                        $category = new clsCategory();
                        $rowCategory = $category->data;
		                $count = $category->Count_Category();
                        echo $count;
                        ?>
                    </h1>
                    <br />
                    Categories
                </div>
                <div class="col-4 text-center">
                
                    <h1>
                        <?php
                        require("Models/clsFood.php");
                        $food = new clsFood();
                        $rowFood = $food->data;
		                $count1 = $food->Count_Food();
                        echo $count1;
                        ?>
                    </h1>
                    <br />
                    Foods
                </div>
                <div class="col-4 text-center">
                    
                    <h1>
                        <?php
                        require("Models/clsOrdered.php");
                        $ordered = new clsOrdered();
                        $rowOrdered = $ordered->data;
		                $count2 = $ordered->Count_Ordered();
                        echo $count2;
                        ?>
                    </h1>
                    <br />
                    Total Orders
                </div>
                <div class="col-4 text-center">
                    
                    <h1>
                        <?php
                        
                        
                        ?>$
                    </h1>
                    <br />
                    Revenue
                </div>
                <div class="clear-fix"></div>
        </div>
    </div>
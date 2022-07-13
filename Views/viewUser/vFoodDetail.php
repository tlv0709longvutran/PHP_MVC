<?php
$row = $foodData;
?>
<div class="food-detail">
    <div class="container">
        <div class="card">
            <div class="form">
                <div class="left-side">
                    <div class="fashion">
                        <h3>Food Detail</h3>
                        <div class="input_text">
                            <input type="text" placeholder="Search">
                            <i class="fa fa-search"></i>
                        </div>
                    </div>

                    <div class="images">
                        <div class="img_girl_left">
                            <i class="fa fa-angle-up"></i>
                            <span><img src="Uploads/image/<?= $row['image_name'] ?>"></span>
                            <span><img src="Uploads/image/<?= $row['image_name'] ?>"></span>
                            <span><img src="Uploads/image/<?= $row['image_name'] ?>"></span>
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <span><img src="Uploads/image/<?= $row['image_name'] ?>"></span>
                    </div>




                </div>
                <div class="right-side">
                    <div class="top_div">
                        <a href="?module=order">
                            <span>Cart<i class="fa fa-shopping-bag"></i></span>

                        </a>
                    </div>

                    <h3 class="text-center"><?= $row['name'] ?></h3>

                    <div class="designer justify-content-center d-flex">
                        <h5>Designer: </h5>
                        <p>Trần Long Vũ</p>
                    </div>



                    <div class="options ">
                        <div>
                            <h4 class="text-primary">$<?= $row['price'] * (1 - $row['sale'] / 100) ?></h4>
                            <h4 class="old-price">$<?= $row['price'] ?></h4>
                        </div>
                        <button onclick="addToCart(<?= $row['id'] ?>)"> Add to cart</button>
                    </div>

                    <div class="description">
                        <h4>Description</h4>
                        <p><?= $row['descript'] ?> </p>
                        <ul class="features">
                            <li>Quilted Design</li>
                            <li>Contrasted faux-fur collar </li>
                            <li>Loops on the shoulder</li>
                            <li>Side zip pockets</li>
                            <li>Two side pockets with one press stud fasteneing</li>
                            <li>Long sleeve with elastic cuff's</li>
                            <li>Zip fasteneing on the front section</li>
                        </ul>

                    </div>
                    <div class="share text-center">
                        <h4>Share</h4>
                        <div class="social justify-content-center">
                            <i class="fab fa-facebook"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-pinterest"></i>
                            <i class="fab fa-google-plus"></i>
                        </div>

                    </div>




                </div>
            </div>
        </div>
    </div>
</div>

<div id="content" class="my-5 container ">
    <div id="products">
        <h2 class="text-center">Foods related</h2>
        <div class="row product-list justify-content-evenly">
            <?php
            if ($foodRelatedData->rowCount() == 0)
                echo '<h2 class="text-center">Hiện chưa có sản phẩm nào phù hợp</h2>';
            else {
                while ($row = $foodRelatedData->fetch()) {
            ?>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <a href="?module=food&id=<?= $row['id'] ?>">
                            <img src="Uploads/image/<?= $row['image_name'] ?>" alt="" />
                        </a>
                        <button onclick="addToCart(<?= $row['id'] ?>)" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                        <?= $row['sale'] === 0 ? '' :  "<span class='sale'>sale " . $row['sale'] . "%</span>" ?>

                    </div>

                    <div class="panel-body text-center mt-3">
                        <h4>
                            <a href="?module=food&id=<?= $row['id'] ?>" class="pro-title">
                                <?= $row['name'] ?>
                            </a>
                        </h4>
                        <p class="descript">
                            <?= $row['descript'] ?>
                        </p>
                        <div class="row-price">
                            <p class="price">$<?= $row['price'] * (1 - $row['sale'] / 100) ?></p>
                            <?= $row['sale'] === 0 ? '' :  ' <p class="old-price">$' . $row['price'] . '</p>' ?>


                        </div>
                    </div>
                </section>
            </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>
<div id="test"></div>

<script>
function addToCart(id) {

    $.ajax({
        type: "GET",
        cache: false,
        url: "?module=order&art=addOrder",
        data: {
            foodId: id
        },
        success: function(result) {

            $('#test').html(result)
        }
    })
}

// Get the modal - Lấy tham chiếu đến thẻ div id=myModal
// When the user clicks anywhere outside of the modal, close it
function hiddenModal() {
    var modal = document.getElementsByClassName("modal")[0];
    modal.style = {
        display: 'none',
    };
}
</script>
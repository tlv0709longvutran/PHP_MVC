<div class="container home">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Latest</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?art=softByCate">soft by cate</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?art=softByPrice">soft by price</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?art=softBySale">soft by sale</a>
                    </li>
                </ul>
                <form action="?art=search" method="post" class="d-flex">
                    <input class="form-control me-2" name="sname" type="search" placeholder="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div id="content" class="my-5">
        <div id="products">
            <div class="row product-list">
                <?php
                if ($data->rowCount() == 0)
                    echo '<h2>Hiện chưa có sản phẩm nào phù hợp</h2>';
                else {
                    while ($row = $data->fetch()) {
                ?>
                <div class="col-md-4">
                    <section class="panel">
                        <div class="pro-img-box">
                            <a href="?module=food&id=<?= $row['id'] ?>">
                                <img src="Uploads/image/<?= $row['image_name'] ?>" alt="" />
                            </a>
                            <button href="#" onclick="addToCart(<?= $row['id'] ?>)" class="adtocart">
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
</div>

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

            $('#test').html(result);
        }
    })
}
</script>

<script>
// Get the modal - Lấy tham chiếu đến thẻ div id=myModal
// When the user clicks anywhere outside of the modal, close it
function hiddenModal() {
    var modal = document.getElementsByClassName("modal")[0];
    modal.style = {
        display: 'none',
    };
}
</script>
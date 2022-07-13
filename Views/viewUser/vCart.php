<section class="h-100 cart" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart: <?= $data->rowCount() ?> items</h3>
                    <div>
                        <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                                    class="fas fa-angle-down mt-1"></i></a></p>
                    </div>
                </div>

                <!-- <form action="?module=test" method="post"> -->
                <form action="?module=order&art=update" method="post">
                    <?php

                    foreach ($data as $row) {
                        $price = $row['price'] * (1 - ($row['sale'] / 100));
                    ?>
                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <a href="?module=food&id=<?= $row['id'] ?>" class="pro-title">
                                        <img src="Uploads/image/<?= $row['image_name'] ?>" class="img-fluid rounded-3"
                                            alt="Cotton T-shirt">
                                    </a>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">
                                        <a href="?module=food&id=<?= $row['id'] ?>" class="pro-title">
                                            <?= $row['name'] ?>
                                        </a>
                                    </p>

                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                    <button type="button" class="btn btn-link px-2"
                                        onclick="handleChangeDown(<?= $row['id'] ?>, this, <?= $price ?>)">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <input id="form1" min="0" type="number" name='<?= $row['id'] ?>'
                                        value="<?= $row['qty'] ?>" type=" number"
                                        class="form-control form-control-sm" />

                                    <button type="button" class="btn btn-link px-2"
                                        onclick="handleChangeUp(this, <?= $price ?>)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col-md-3 col-lg-1 col-xl-1 ">
                                    <h5 class="price mb-0">$<?= $row['qty'] *   $price ?>
                                    </h5>
                                </div>
                                <div class="col-md-3 col-lg-1 col-xl-1 ">
                                    <?= $row['sale'] === 0 ? '' :  '
                                         <h5 class="old-price mb-0">$' . $row['qty'] *   $row['price'] . '  </h5>' ?>


                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <button type="button" onclick="handleDelete(<?= $row['id'] ?>)"
                                        class="text-danger border-0">
                                        <i class="fas fa-trash fa-lg"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>



                    <?php
                    if ($data->rowCount() === 0)
                        echo ' <h2 class="text-center mt-5">Giỏ hàng hiện đang trống. <a href="index.php">Thêm sản phẩm</a></h2>';
                    else {
                    ?>
                    <div class="card">
                        <div class="card-body total">
                            <h1>total</h1>
                            <h2 id="total"></h2>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-body d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Save change</button>
                            <button type="button" onclick="checkout()" class="btn btn-warning btn-block btn-lg">Proceed
                                to
                                Pay</button>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </form>

            </div>
        </div>
    </div>
    <div id="test"></div>
</section>



<script>
const checkout = () => {
    const form = document.querySelector('form');
    form.action = '?module=order&art=checkout'
    form.submit()

}
const handleDelete = (id) => {
    console.log('hihi')
    $.ajax({
        type: "GET",
        cache: false,
        url: "?module=order&art=delfood",
        data: {
            foodId: id
        },
        success: function(result) {
            $('#test').html(result);
        }
    })
}
const total = () => {
    elPrices = document.getElementsByClassName('price');
    let total = 0;
    for (const elPrice of elPrices) {
        total = (total + parseFloat(elPrice.innerHTML.substring(1)))
    }

    document.getElementById('total').innerHTML = '$' + total
}
document.addEventListener('DOMContentLoaded', () => {
    total()
})
const handleChangeUp = (el, price) => {
    const input = el.parentNode.querySelector('input[type=number]');
    const elPrice = el.parentNode.parentNode.querySelector('.price');
    input.stepUp()
    elPrice.innerHTML = '$' + (input.value * price)
    total()
}

const handleChangeDown = (id, el, price) => {
    const input = el.parentNode.querySelector('input[type=number]');
    const elPrice = el.parentNode.parentNode.querySelector('.price');
    input.stepDown()
    console.log(input.value == 0)
    if (input.value == 0)
        handleDelete(id);
    elPrice.innerHTML = '$' + (input.value * price)
    total()
}
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h3 class="card-title text-center mb-5">Info Person</h3>
                        <form action="?module=user&art=xulyupdate" method="post">
                            <div class="form-floating mb-3">
                                <input required value="<?= $data['name'] ?>" type="text" name="name"
                                    class="form-control" id="nameInput">
                                <label for="nameInput">Full Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input required value="<?= $data['email'] ?>" type="email" name="email"
                                    class="form-control" id="floatingInput">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input required value="<?= $data['address'] ?>" type="text" name="address"
                                    class="form-control" id="addressInput">
                                <label for="addressInput">Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input required value="<?= $data['telephone'] ?>" type="text" name="telephone"
                                    class="form-control" id="telephoneInput">
                                <label for="telephoneInput">Telephone</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input required value="<?= $data['password'] ?> " type="password" name="password"
                                    class="form-control" id="passwordInput">
                                <label for="passwordInput">Password</label>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold"
                                    type="submit">Update</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
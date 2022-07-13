<h1 class="text-center text-primary">
    Payment
</h1>
<!-- Modal -->
<form action="?module=order&art=xulycheckout" method="post">
    <div class="payment " id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                    <div class="tabs mt-3">
                        <ul class="nav nav-tabs text-center" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation"> <a class="nav-link active" id="visa-tab"
                                    data-toggle="tab" href="#visa" role="tab" aria-controls="visa" aria-selected="true">
                                    <img src="https://i.imgur.com/sB4jftM.png" width="80"> </a> </li>
                            <li class="nav-item" role="presentation"> <a class="nav-link" id="paypal-tab"
                                    data-toggle="tab" href="#paypal" role="tab" aria-controls="paypal"
                                    aria-selected="false"> <img src="https://i.imgur.com/yK7EDD1.png" width="80"> </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane  show active" id="visa" role="tabpanel" aria-labelledby="visa-tab">
                                <div class="mt-4 mx-4">
                                    <div class="text-center">
                                        <h3 class="mb-3 text-primary">Info</h3>
                                    </div>
                                    <div class="form mt-3">
                                        <div class="inputbox"> <input type="number" value="<?= $data['telephone'] ?>"
                                                name="telephone" class="form-control" required="required">
                                            <span>telephone</span>
                                        </div>
                                        <div class="inputbox"> <input type="text" value="<?= $data['address'] ?>"
                                                name="address" class="form-control" required="required">
                                            <span>address</span>
                                        </div>


                                        <div class="total">
                                            <div class="inputbox"> Total bill
                                            </div>
                                            <div class="price text-primary inputbox">$<?= $total ?> </div>
                                            <input type="hidden" name="totalorder" value="<?= $total ?>">
                                        </div>
                                        <div class="px-5 pay text-center"> <button type="submit"
                                                class="btn btn-success btn-block"><i
                                                    class="fa fa-rocket"></i>checkout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<!-- Button trigger modal -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
/* ------ modal ---------- */
#modal {
    display: block !important;
    background: #8585855c;
}

#modal a {
    text-decoration: none;
}

#modal .modal-header {
    display: block;
    background: #0d6efd;
    color: #28ff00;
}

@media (min-width: 576px) {
    .modal-dialog {
        max-width: 650px;
        margin: 10.75rem auto;
    }
}

.modal-body {
    height: 90px;
}
</style>

<!-- Modal -->
<div class="modal " id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Modal title</h5>
            </div>
            <div class="modal-body text-center text-primary">
                <?= $thongBao ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"><a class="text-light" href="<?= $linkTiepTuc ?>">Tiếp
                        tục</a></button>
            </div>
        </div>
    </div>
</div>
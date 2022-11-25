<?php
include "_header.php";
?>

    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Kategori Ekle</h6>

                        <form method="POST" action="process.php">

                            <div class="row">
                                <div class="mb-3 col-sm-12">
                                    <label for="exampleInputText1" class="form-label">Kategori İsmi</label>
                                    <input required type="text" class="form-control" id="exampleInputText1" name="kategori_isim"
                                           value="" placeholder="Kategori İsmi Giriniz">
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit" name="kategoriekle">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "_footer.php";
?>
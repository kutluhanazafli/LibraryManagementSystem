<?php
include "_header.php";
?>

    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Yazar Düzenle</h6>

                        <form method="POST" action="process.php">

                            <div class="row">
                                <div class="mb-3 col-sm-12">
                                    <label for="exampleInputText1" class="form-label">Yazar Ad</label>
                                    <input required type="text" class="form-control" id="exampleInputText1" name="yazar_isim"
                                           value="" placeholder="Yazar Adını Giriniz">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-sm-12">
                                    <label for="exampleInputText2" class="form-label">Yazar Soyad</label>
                                    <input required type="text" class="form-control" id="exampleInputText1" name="yazar_soyad"
                                           value="" placeholder="Yazar Soyadını Giriniz">
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit" name="yazarduzenle">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "_footer.php";
?>
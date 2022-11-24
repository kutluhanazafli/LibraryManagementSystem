<?php
include "_header.php";
?>

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Üye Ekle</h6>

                    <form method="POST" action="process.php">

                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label for="exampleInputText1" class="form-label">Üye İsmi</label>
                                <input required type="text" class="form-control" id="exampleInputText1" name="uye_isim"
                                       value="" placeholder="Üye İsmi Giriniz">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="exampleInputText2" class="form-label">Üye Soyadı</label>
                                <input required type="text" class="form-control" id="exampleInputText2" name="uye_soyad"
                                       value="" placeholder="Üye Soyadı Giriniz">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="exampleInputText3" class="form-label">E-posta</label>
                                <input required type="email" class="form-control" id="exampleInputText3" name="uye_mail"
                                       value="" placeholder="Üye E-posta Giriniz">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="exampleInputText4" class="form-label">Telefon</label>
                                <input required type="tel" class="form-control" id="exampleInputText4" name="uye_tel"
                                       value="" placeholder="Üye Telefon No Giriniz">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cinsiyet</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input required type="radio" class="form-check-input" name="cinsiyet"
                                           value="1"
                                           id="radioInline3">
                                    <label class="form-check-label" for="radioInline3">
                                        Erkek
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input required type="radio" class="form-check-input" name="cinsiyet"
                                           value="0"
                                           id="radioInline4">
                                    <label class="form-check-label" for="radioInline4">
                                        Kadın
                                    </label>
                                </div>
                            </div>
                        </div>

                        <hr style="color: red; height: 3px">

                        <div class="row">
                            <div class="mb-3 col-sm-3">
                                <label for="il" class="form-label">İl</label>
                                <input type="text" class="form-control" id="il" name="il"
                                       value="" placeholder="İl Giriniz">
                            </div>
                            <div class="mb-3 col-sm-3">
                                <label for="ilce" class="form-label">İlçe</label>
                                <input type="text" class="form-control" id="ilce" name="ilce"
                                       value="" placeholder="İlçe Giriniz">
                            </div>
                            <div class="mb-3 col-sm-3">
                                <label for="mahalle" class="form-label">Mahalle</label>
                                <input type="text" class="form-control" id="mahalle" name="mahalle"
                                       value="" placeholder="Mahalle Giriniz">
                            </div>
                            <div class="mb-3 col-sm-3">
                                <label for="cadde" class="form-label">Cadde</label>
                                <input type="text" class="form-control" id="cadde" name="cadde"
                                       value="" placeholder="Cadde Giriniz">
                            </div>
                            <div class="mb-3 col-sm-3">
                                <label for="sokak" class="form-label">Sokak</label>
                                <input type="text" class="form-control" id="sokak" name="sokak"
                                       value="" placeholder="Sokak Giriniz">
                            </div>
                            <div class="mb-3 col-sm-3">
                                <label for="binano" class="form-label">Bina No</label>
                                <input type="text" class="form-control" id="binano" name="binano"
                                       value="" placeholder="Bina No Giriniz">
                            </div>
                            <div class="mb-3 col-sm-3">
                                <label for="kat" class="form-label">Kat</label>
                                <input type="text" class="form-control" id="kat" name="kat"
                                       value="" placeholder="Kat No Giriniz">
                            </div>
                            <div class="mb-3 col-sm-3">
                                <label for="postakodu" class="form-label">Posta Kodu</label>
                                <input type="text" class="form-control" id="postakodu" name="postakodu"
                                       value="" placeholder="Posta Kodu Giriniz">
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit" name="uyeekle">Gönder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "_footer.php";
?>
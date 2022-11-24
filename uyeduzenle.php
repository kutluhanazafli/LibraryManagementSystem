<?php
include "_header.php";

$stmt = $db -> prepare('SELECT * FROM "Uyeler" WHERE uye_id=:uye_id');
$stmt -> execute([
    'uye_id' => $_GET['uye_id']
]);
$uye = $stmt -> fetch(PDO::FETCH_ASSOC);

$stmt2 = $db -> prepare('SELECT * FROM "Adresler" WHERE adres_id=:adres_id');
$stmt2 -> execute([
    'adres_id' => $uye['adres_id']
]);
$adres = $stmt2 -> fetch(PDO::FETCH_ASSOC);
?>

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Üye Düzenle</h6>

                    <form method="POST" action="process.php">

                        <input type="hidden" name="uye_id" value="<?php echo $_GET['uye_id'] ?>">
                        <input type="hidden" name="adres_id" value="<?php echo $adres['adres_id'] ?>">

                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label for="exampleInputText1" class="form-label">Üye İsmi</label>
                                <input required type="text" class="form-control" id="exampleInputText1" name="uye_isim"
                                       value="<?php echo $uye['uyeAd'] ?>" placeholder="Üye İsmi Giriniz">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="exampleInputText2" class="form-label">Üye Soyadı</label>
                                <input required type="text" class="form-control" id="exampleInputText2" name="uye_soyad"
                                       value="<?php echo $uye['uyeSoyad'] ?>" placeholder="Üye Soyadı Giriniz">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="exampleInputText3" class="form-label">E-posta</label>
                                <input required type="email" class="form-control" id="exampleInputText3" name="uye_mail"
                                       value="<?php echo $uye['eposta'] ?>" placeholder="Üye E-posta Giriniz">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="exampleInputText4" class="form-label">Telefon</label>
                                <input required type="tel" class="form-control" id="exampleInputText4" name="uye_tel"
                                       value="<?php echo $uye['telefon'] ?>" placeholder="Üye Telefon No Giriniz">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cinsiyet</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input required type="radio" class="form-check-input" name="cinsiyet"
                                           value="1" <?php if ($uye['cinsiyet'] == 1) echo "checked" ?>
                                           id="radioInline3">
                                    <label class="form-check-label" for="radioInline3">
                                        Erkek
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input required type="radio" class="form-check-input" name="cinsiyet"
                                           value="0" <?php if ($uye['cinsiyet'] == 0) echo "checked" ?>
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
                                       value="<?php echo $adres['il'] ?>" placeholder="İl Giriniz">
                            </div>
                            <div class="mb-3 col-sm-3">
                                <label for="ilce" class="form-label">İlçe</label>
                                <input type="text" class="form-control" id="ilce" name="ilce"
                                       value="<?php echo $adres['ilce'] ?>" placeholder="İlçe Giriniz">
                            </div>
                            <div class="mb-3 col-sm-3">
                                <label for="mahalle" class="form-label">Mahalle</label>
                                <input type="text" class="form-control" id="mahalle" name="mahalle"
                                       value="<?php echo $adres['mahalle'] ?>" placeholder="Mahalle Giriniz">
                            </div>
                            <div class="mb-3 col-sm-3">
                                <label for="cadde" class="form-label">Cadde</label>
                                <input type="text" class="form-control" id="cadde" name="cadde"
                                       value="<?php echo $adres['cadde'] ?>" placeholder="Cadde Giriniz">
                            </div>
                            <div class="mb-3 col-sm-3">
                                <label for="sokak" class="form-label">Sokak</label>
                                <input type="text" class="form-control" id="sokak" name="sokak"
                                       value="<?php echo $adres['sokak'] ?>" placeholder="Sokak Giriniz">
                            </div>
                            <div class="mb-3 col-sm-3">
                                <label for="binano" class="form-label">Bina No</label>
                                <input type="text" class="form-control" id="binano" name="binano"
                                       value="<?php echo $adres['binano'] ?>" placeholder="Bina No Giriniz">
                            </div>
                            <div class="mb-3 col-sm-3">
                                <label for="kat" class="form-label">Kat</label>
                                <input type="text" class="form-control" id="kat" name="kat"
                                       value="<?php echo $adres['kat'] ?>" placeholder="Kat No Giriniz">
                            </div>
                            <div class="mb-3 col-sm-3">
                                <label for="postakodu" class="form-label">Posta Kodu</label>
                                <input type="text" class="form-control" id="postakodu" name="postakodu"
                                       value="<?php echo $adres['postakodu'] ?>" placeholder="Posta Kodu Giriniz">
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit" name="uyeduzenle">Gönder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "_footer.php";
?>

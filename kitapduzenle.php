<?php
include "_header.php";

$stmt = $db->prepare('SELECT * FROM "Kitaplar" INNER JOIN "KitapYazar" ON "KitapYazar"."kitap_id" = "Kitaplar"."kitap_id" INNER JOIN "Yazarlar" ON "Yazarlar" . "yazar_id" = "KitapYazar"."yazar_id" INNER JOIN "KitapKategori" ON "KitapKategori"."kitap_id" = "Kitaplar"."kitap_id" INNER JOIN "Kategoriler" ON "Kategoriler"."kategori_id" = "KitapKategori"."kategori_id" WHERE "Kitaplar"."kitap_id"=:kitap_id');
$stmt->execute([
        'kitap_id' => $_GET['kitap_id']
    ]);
$kitap = $stmt->fetch(PDO::FETCH_ASSOC);

?>

    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Kitap Düzenle</h6>

                        <form method="POST" action="process.php">

                            <input type="hidden" name="kitap_id" value="<?php echo $_GET['kitap_id'] ?>">

                            <div class="row">
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleInputText1" class="form-label">Kitap Adı</label>
                                    <input required type="text" class="form-control" id="exampleInputText1" name="kitap_isim"
                                           value="<?php echo $kitap['kitapAdi']?>" placeholder="Kitap Adını Giriniz">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleInputText2" class="form-label">ISBN Numarası</label>
                                    <input required type="text" class="form-control" id="exampleInputText2" name="kitap_isbn"
                                           value="<?php echo $kitap['ISBN']?>" placeholder="Kitap ISBN Numarası Giriniz">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleInputText3" class="form-label">Sayfa Sayısı</label>
                                    <input required type="text" class="form-control" id="exampleInputText3" name="kitap_sayfa"
                                           value="<?php echo $kitap['sayfaSayisi']?>" placeholder="Kitap Sayfa Sayısını Giriniz">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleInputText4" class="form-label">Yayın Tarihi (GG-AA-YYYY)</label>
                                    <input required type="text" class="form-control" id="exampleInputText4" name="kitap_tarih"
                                           value="<?php echo $kitap['yayinTarihi']?>" placeholder="Kitap Yayın Tarihi Giriniz">
                                </div>
                                <div class="mb-3 col-sm-4">
                                    <label for="exampleFormControlSelect5" class="form-label">Kitap Yayınevini Seçiniz</label>
                                    <select required class="form-select" name="yayinevi" id="yayinevi">
                                        <option selected disabled>Yayınevi Seçiniz</option>
                                        <?php
                                        $yayineviSor = $db->query('SELECT * FROM "YayinEvleri"');
                                        while ($yayinevi = $yayineviSor->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <option
                                                <?php
                                            if ($yayinevi['yayinEvi_id'] == $kitap['yayinEvi_id']) {
                                                echo 'selected';
                                            }
                                            ?>
                                                value="<?php echo $yayinevi['yayinEvi_id'] ?>"><?php echo $yayinevi['yayinEviAd'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-4">
                                    <label for="exampleFormControlSelect6" class="form-label">Kitap Yazarını Seçiniz</label>
                                    <select required class="form-select" name="yazar" id="yazar">
                                        <option selected disabled>Yazar Seçiniz</option>
                                        <?php
                                        $yazarSor = $db->query('SELECT * FROM "Yazarlar"');
                                        while ($yazar = $yazarSor->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <option
                                                <?php
                                                if ($yazar['yazar_id'] == $kitap['yazar_id']) {
                                                    echo 'selected';
                                                }
                                                ?>
                                                    value="<?php echo $yazar['yazar_id'] ?>"><?php echo $yazar['yazarAd']." ".$yazar['yazarSoyad'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-4">
                                    <label for="exampleFormControlSelect7" class="form-label">Kitap Kategorisini Seçiniz</label>
                                    <select required class="form-select" name="kategori" id="kategori">
                                        <option selected disabled>Kategori Seçiniz</option>
                                        <?php
                                        $kategoriSor = $db->query('SELECT * FROM "Kategoriler"');
                                        while ($kategori = $kategoriSor->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <option
                                                <?php
                                                if ($kategori['kategori_id'] == $kitap['kategori_id']) {
                                                    echo 'selected';
                                                }
                                                ?>
                                                    value="<?php echo $kategori['kategori_id'] ?>"><?php echo $kategori['kategoriAd'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit" name="kitapduzenle">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "_footer.php";
?>
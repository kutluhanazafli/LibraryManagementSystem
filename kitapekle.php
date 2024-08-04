<?php
include "_header.php";
?>

    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Kitap Ekle</h6>

                        <form method="POST" action="process.php">

                            <div class="row">
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleInputText1" class="form-label">Kitap Adı</label>
                                    <input required type="text" class="form-control" id="exampleInputText1" name="kitap_isim"
                                           value="" placeholder="Kitap Adını Giriniz">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleInputText2" class="form-label">ISBN Numarası</label>
                                    <input required type="text" class="form-control" id="exampleInputText2" name="kitap_isbn"
                                           value="" placeholder="Kitap ISBN Numarası Giriniz">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleInputText3" class="form-label">Sayfa Sayısı</label>
                                    <input required type="text" class="form-control" id="exampleInputText3" name="kitap_sayfa"
                                           value="" placeholder="Kitap Sayfa Sayısını Giriniz">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleInputText4" class="form-label">Yayın Tarihi (GG-AA-YYYY)</label>
                                    <input required type="text" class="form-control" id="exampleInputText4" name="kitap_tarih"
                                           value="" placeholder="Kitap Yayın Tarihi Giriniz">
                                </div>
                                <div class="mb-3 col-sm-4">
                                    <label for="exampleFormControlSelect5" class="form-label">Kitap Yayınevini Seçiniz</label>
                                    <select required class="form-select" name="yayinevi" id="yayinevi">
                                        <option selected disabled>Yayınevi Seçiniz</option>
                                        <?php
                                        $yayineviSor = $db->query('SELECT * FROM "YayinEvleri"');
                                        while ($yayinevi = $yayineviSor->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <option value="<?php echo $yayinevi['yayinEvi_id'] ?>"><?php echo $yayinevi['yayinEviAd'] ?></option>
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
                                            <option value="<?php echo $yazar['yazar_id'] ?>"><?php echo $yazar['yazarAd']." ".$yazar['yazarSoyad'] ?></option>
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
                                            <option value="<?php echo $kategori['kategori_id'] ?>"><?php echo $kategori['kategoriAd'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleInputText3" class="form-label">Dolap</label>
                                    <input required type="text" class="form-control" id="exampleInputText3" name="dolap"
                                           value="" placeholder="Kitabın Bulunduğu Dolabı Giriniz">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleInputText3" class="form-label">Raf</label>
                                    <input required type="text" class="form-control" id="exampleInputText3" name="raf"
                                           value="" placeholder="Kitabın Bulunduğu Rafı Giriniz">
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit" name="kitapekle">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "_footer.php";
?>
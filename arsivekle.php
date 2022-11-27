<?php
include "_header.php";
?>

    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Kütüphaneye Kitap Ekle</h6>

                        <form method="POST" action="process.php">

                            <div class="row">
                                <div class="mb-3 col-sm-12">
                                    <label for="exampleInputText1" class="form-label">Adet</label>
                                    <input required type="text" class="form-control" id="exampleInputText1" name="adet"
                                           value="" placeholder="Kitap Adetini Giriniz">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleFormControlSelect5" class="form-label">Kitap Adını Seçiniz</label>
                                    <select required class="form-select" name="kitap_id" id="kitap">
                                        <option selected disabled>Kitap Adı Seçiniz</option>
                                        <?php
                                        $kitapSor = $db->query('SELECT * FROM "Kitaplar"');
                                        while ($kitap = $kitapSor->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <option value="<?php echo $kitap['kitap_id'] ?>"><?php echo $kitap['kitapAdi'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleFormControlSelect5" class="form-label">Kütüphaneyi Seçiniz</label>
                                    <select required class="form-select" name="kutuphane_id" id="kutuphane">
                                        <option selected disabled>Kütüphane Seçiniz</option>
                                        <?php
                                        $kutuphaneSor = $db->query('SELECT * FROM "Kutuphane"');
                                        while ($kutuphane = $kutuphaneSor->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <option value="<?php echo $kutuphane['kutuphane_id'] ?>"><?php echo $kutuphane['kutuphaneAd'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit" name="arsivekle">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "_footer.php";
?>
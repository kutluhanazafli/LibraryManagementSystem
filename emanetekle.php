<?php
include "_header.php";
?>

    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Emanet Ekle</h6>

                        <form method="POST" action="process.php">

                            <div class="row">
                                <div class="mb-3 col-sm-4">
                                    <label for="exampleFormControlSelect5" class="form-label">Üye Adını Seçiniz</label>
                                    <select required class="form-select" name="uye_id" id="uye_id">
                                        <option selected disabled>Üye Adı Seçiniz</option>
                                        <?php
                                        $uyeSor = $db->query('SELECT * FROM "Uyeler"');
                                        while ($uye = $uyeSor->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <option value="<?php echo $uye['uye_id'] ?>"><?php echo $uye['uyeAd'] . " " . $uye['uyeSoyad'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-4">
                                    <label for="exampleFormControlSelect5" class="form-label">Kitap Adını Seçiniz</label>
                                    <select required class="form-select" name="kitap_id" id="kitap_id">
                                        <option selected disabled>Kitap Adı Seçiniz</option>
                                        <?php
                                        $kitapSor = $db->query('SELECT * FROM "Kitaplar"');
                                        while ($kitap = $kitapSor->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <option value="<?php echo $kitap['kitap_id'] ?>"><?php echo $kitap['kitapAdi'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-4">
                                    <label for="exampleFormControlSelect5" class="form-label">Kütüphaneyi Seçiniz</label>
                                    <select required class="form-select" name="kutuphane_id" id="kutuphane_id">
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

                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="exampleFormControlSelect1" class="form-label">Emanet Verilme Tarihi</label>
                                    <div class="input-group date datepicker" id="datePickerExample1">
                                        <input type="text" class="form-control" name="emanetTarihi">
                                        <span class="input-group-text input-group-addon"><i
                                                    data-feather="calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-primary" type="submit" name="emanetekle">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "_footer.php";
?>
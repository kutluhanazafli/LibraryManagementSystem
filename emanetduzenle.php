<?php
include "_header.php";

$stmt = $db->prepare('SELECT * FROM "Emanet" WHERE emanet_id=:emanet_id');
$stmt->execute(array(
    'emanet_id' => $_GET['emanet_id']
));
$emanet = $stmt->fetch(PDO::FETCH_ASSOC);
?>

    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Emanet Düzenle</h6>

                        <form method="POST" action="process.php">

                            <input type="hidden" name="emanet_id" value="<?php echo $_GET['emanet_id'] ?>">

                            <div class="row">
                                <div class="mb-3 col-sm-4">
                                    <label for="exampleFormControlSelect5" class="form-label">Üye Adını Seçiniz</label>
                                    <select required class="form-select" name="uye_id" id="uye_id">
                                        <option selected disabled>Üye Adı Seçiniz</option>
                                        <?php
                                        $uyeSor = $db->query('SELECT * FROM "Uyeler"');
                                        while ($uye = $uyeSor->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <option
                                                <?php
                                                if ($emanet['uye_id'] == $uye['uye_id']) {
                                                    echo 'selected';
                                                }
                                                ?>
                                                    value="<?php echo $uye['uye_id'] ?>"><?php echo $uye['uyeAd'] . " " . $uye['uyeSoyad'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-4">
                                    <label for="exampleFormControlSelect5" class="form-label">Kitap Adını Seçiniz</label>
                                    <select required class="form-select" name="kitap_id" id="kitap">
                                        <option selected disabled>Kitap Adı Seçiniz</option>
                                        <?php
                                        $kitapSor = $db->query('SELECT * FROM "Kitaplar"');
                                        while ($kitap = $kitapSor->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <option
                                                <?php
                                                if ($emanet['kitap_id'] == $kitap['kitap_id']) {
                                                    echo 'selected';
                                                }
                                                ?>
                                                    value="<?php echo $kitap['kitap_id'] ?>"><?php echo $kitap['kitapAdi'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-4">
                                    <label for="exampleFormControlSelect5" class="form-label">Kütüphaneyi Seçiniz</label>
                                    <select required class="form-select" name="kutuphane_id" id="kutuphane">
                                        <option selected disabled>Kütüphane Seçiniz</option>
                                        <?php
                                        $kutuphaneSor = $db->query('SELECT * FROM "Kutuphane"');
                                        while ($kutuphane = $kutuphaneSor->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <option
                                                <?php
                                                if ($emanet['kutuphane_id'] == $kutuphane['kutuphane_id']) {
                                                    echo 'selected';
                                                }
                                                ?>
                                                    value="<?php echo $kutuphane['kutuphane_id'] ?>"><?php echo $kutuphane['kutuphaneAd'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mb-2">
                                    <label for="exampleFormControlSelect3" class="form-label">Emanet Verilme Tarihi</label>
                                    <div class="input-group date datepicker" id="datePickerExample3">
                                        <input type="text" class="form-control" name="emanetTarihi" value="<?php echo $emanet['emanetTarihi']?>">
                                        <span class="input-group-text input-group-addon"><i
                                                data-feather="calendar"></i></span>
                                    </div>
                                </div>
                                <br>
                                <div class="form-check mb-2 col-sm-12" id="checkbox">
                                    <input type="checkbox" class="form-check-input" id="checkDefault" name="teslimedildi">
                                    <label class="form-check-label" for="checkDefault">
                                        Teslim Alındı
                                    </label>
                                </div>
                                <br>
                                <div class="col-sm-12" id="teslim">
                                    <label for="exampleFormControlSelect4" class="form-label">Teslim Alınan Tarih</label>
                                    <div class="input-group date datepicker" id="datePickerExample4">
                                        <input type="text" class="form-control" name="teslimTarihi" value="<?php echo $emanet['teslimTarihi']?>">
                                        <span class="input-group-text input-group-addon"><i
                                                data-feather="calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <button class="btn btn-primary" type="submit" name="emanetduzenle">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
if ($emanet['teslimTarihi'] != null) {
    ?>
    <script>
        $('#teslim').show();
        $('#checkbox').hide();
        document.getElementById("checkDefault").checked = true;
    </script>
    <?php
} else {
    ?>
    <script>
        $('#teslim').hide();
    </script>
    <?php
}
?>


<script>
    $(document).ready(function () {
        $('#checkDefault').click(function () {
            if ($(this).is(':checked')) {
                $('#teslim').show();
            } else {
                $('#teslim').hide();
            }
        });
    });
</script>

<?php
include "_footer.php";
?>
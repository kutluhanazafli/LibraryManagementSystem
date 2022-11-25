<?php
include "_header.php";

$stmt = $db->prepare('SELECT * FROM "Yazarlar" WHERE yazar_id=:id');
$stmt->execute(array(
    'id' => $_GET['yazar_id']
));
$yazar = $stmt->fetch(PDO::FETCH_ASSOC);
?>

    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Yazar Düzenle</h6>

                        <form method="POST" action="process.php">

                            <input type="hidden" name="yazar_id" value="<?php echo $_GET['yazar_id']?>">

                            <div class="row">
                                <div class="mb-3 col-sm-12">
                                    <label for="exampleInputText1" class="form-label">Yazar Ad</label>
                                    <input required type="text" class="form-control" id="exampleInputText1" name="yazar_isim"
                                           value="<?php echo $yazar['yazarAd']?>" placeholder="Yazar Adını Giriniz">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-sm-12">
                                    <label for="exampleInputText2" class="form-label">Yazar Soyad</label>
                                    <input required type="text" class="form-control" id="exampleInputText1" name="yazar_soyad"
                                           value="<?php echo $yazar['yazarSoyad']?>" placeholder="Yazar Soyadını Giriniz">
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
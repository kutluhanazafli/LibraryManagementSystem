<?php
include "_header.php";

$stmt = $db->prepare('SELECT * FROM "Kategoriler" WHERE kategori_id=:kategori_id');
$stmt->execute(array(
    ':kategori_id' => $_GET['kategori_id']
));
$kategori = $stmt->fetch();

?>

    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Kategori Düzenle</h6>

                        <input type="hidden" name="kategori_id" value="<?php echo $_GET['kategori_id'] ?>">

                        <form method="POST" action="process.php">

                            <div class="row">
                                <div class="mb-3 col-sm-12">
                                    <label for="exampleInputText1" class="form-label">Kategori İsmi</label>
                                    <input required type="text" class="form-control" id="exampleInputText1" name="kategori_isim"
                                           value="<?php echo $kategori['kategoriAd']?>" placeholder="Kategori İsmi Giriniz">
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit" name="kategoriduzenle">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "_footer.php";
?>
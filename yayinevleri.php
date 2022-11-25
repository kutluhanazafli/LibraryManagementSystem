<?php
include "_header.php";
?>

    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title col-md-11" style="float: left">Yayınevleri</h6>
                        <a class="btn btn-primary col-md-1" href="yayineviekle.php" role="button">Yayınevi Ekle</a>
                        <div style="clear-after: both"></div>
                        <br>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Sıra</th>
                                    <th style="text-align: center">Ad</th>
                                    <th style="text-align: center">İl</th>
                                    <th style="text-align: center">İlçe</th>
                                    <th style="text-align: center">Mahalle</th>
                                    <th style="text-align: center">Düzenle</th>
                                    <th style="text-align: center">Sil</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $say = 0;
                                $YayineviSor = $db->query('SELECT * FROM "YayinEvleri" INNER JOIN "Adresler" ON "YayinEvleri".adres_id = "Adresler".adres_id');
                                while ($yayinevi = $YayineviSor->fetch(PDO::FETCH_ASSOC)) {
                                    $say++;

                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?php echo $say ?></td>
                                        <td style="text-align: center"><?php echo $yayinevi['yayinEviAd'] ?></td>
                                        <td style="text-align: center"><?php echo $yayinevi['il'] ?></td>
                                        <td style="text-align: center"><?php echo $yayinevi['ilce'] ?></td>
                                        <td style="text-align: center"><?php echo $yayinevi['mahalle'] ?></td>
                                        <td width="200" style="text-align: center">
                                            <a href="yayineviduzenle.php?yayinevi_id=<?php echo $yayinevi['yayinEvi_id']; ?>">
                                                <button class="btn btn-warning btn-xs">Düzenle</button>
                                            </a>
                                        </td>
                                        <td width="200" style="text-align: center">
                                            <a href="process.php?yayinevi_id=<?php echo $yayinevi['yayinEvi_id']; ?>&yayinevisil=ok">
                                                <button class="btn btn-danger btn-xs">Sil</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php
include "_footer.php";
?>
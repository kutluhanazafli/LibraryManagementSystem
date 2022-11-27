<?php
include "_header.php";
?>

    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title col-md-10" style="float: left">Yazarlar</h6>
                        <a class="btn btn-primary col-md-2" href="yazarekle.php" role="button">Yazar Ekle</a>
                        <div style="clear-after: both"></div>
                        <br>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Sıra</th>
                                    <th style="text-align: center">Ad</th>
                                    <th style="text-align: center">Soyad</th>
                                    <th style="text-align: center">Düzenle</th>
                                    <th style="text-align: center">Sil</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $say = 0;
                                $YazarSor = $db->query('SELECT * FROM "Yazarlar"');
                                while ($yazar = $YazarSor->fetch(PDO::FETCH_ASSOC)) {
                                    $say++;

                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?php echo $say ?></td>
                                        <td style="text-align: center"><?php echo $yazar['yazarAd'] ?></td>
                                        <td style="text-align: center"><?php echo $yazar['yazarSoyad'] ?></td>
                                        <td width="200" style="text-align: center">
                                            <a href="yazarduzenle.php?yazar_id=<?php echo $yazar['yazar_id']; ?>">
                                                <button class="btn btn-warning btn-xs">Düzenle</button>
                                            </a>
                                        </td>
                                        <td width="200" style="text-align: center">
                                            <a href="process.php?yazar_id=<?php echo $yazar['yazar_id']; ?>&yazarsil=ok">
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
<?php
include "_header.php";
?>

    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title col-md-10" style="float: left">Emanetler</h6>
                        <a class="btn btn-primary col-md-2" href="emanetekle.php" role="button">Emanet Ekle</a>
                        <div style="clear-after: both"></div>
                        <br>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Sıra</th>
                                    <th style="text-align: center">Emanet Alan</th>
                                    <th style="text-align: center">Emanet Alınan Kitap</th>
                                    <th style="text-align: center">Alındığı Kütüphane</th>
                                    <th style="text-align: center">Düzenle</th>
                                    <th style="text-align: center">Sil</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $say = 0;
                                $EmanetSor = $db->query('SELECT * FROM "Emanet" INNER JOIN "Kutuphane" ON "Emanet"."kutuphane_id" = "Kutuphane"."kutuphane_id" INNER JOIN "Kitaplar" ON "Emanet"."kitap_id" = "Kitaplar"."kitap_id" INNER JOIN "Uyeler" ON "Emanet"."uye_id" = "Uyeler"."uye_id"');
                                while ($emanet = $EmanetSor->fetch(PDO::FETCH_ASSOC)) {
                                    $say++;

                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?php echo $say ?></td>
                                        <td style="text-align: center"><?php echo $emanet['uyeAd'] . " " . $emanet['uyeSoyad'] ?></td>
                                        <td style="text-align: center"><?php echo $emanet['kitapAdi'] ?></td>
                                        <td style="text-align: center"><?php echo $emanet['kutuphaneAd'] ?></td>
                                        <td width="200" style="text-align: center">
                                            <a href="emanetduzenle.php?emanet_id=<?php echo $emanet['emanet_id']; ?>">
                                                <button class="btn btn-warning btn-xs">Düzenle</button>
                                            </a>
                                        </td>
                                        <td width="200" style="text-align: center">
                                            <a href="process.php?emanet_id=<?php echo $emanet['emanet_id']; ?>&emanetsil=ok">
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
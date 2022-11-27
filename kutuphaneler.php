<?php
include "_header.php";
?>

    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title col-md-10" style="float: left">Kütüphaneler</h6>
                        <a class="btn btn-primary col-md-2" href="kutuphaneekle.php" role="button">Kütüphane Ekle</a>
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
                                $KutuphaneSor = $db->query('SELECT * FROM "Kutuphane" INNER JOIN "Adresler" ON "Kutuphane".adres_id = "Adresler".adres_id');
                                while ($kutuphane = $KutuphaneSor->fetch(PDO::FETCH_ASSOC)) {
                                    $say++;

                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?php echo $say ?></td>
                                        <td style="text-align: center"><?php echo $kutuphane['kutuphaneAd'] ?></td>
                                        <td style="text-align: center"><?php echo $kutuphane['il'] ?></td>
                                        <td style="text-align: center"><?php echo $kutuphane['ilce'] ?></td>
                                        <td style="text-align: center"><?php echo $kutuphane['mahalle'] ?></td>
                                        <td width="200" style="text-align: center">
                                            <a href="kutuphaneduzenle.php?kutuphane_id=<?php echo $kutuphane['kutuphane_id']; ?>">
                                                <button class="btn btn-warning btn-xs">Düzenle</button>
                                            </a>
                                        </td>
                                        <td width="200" style="text-align: center">
                                            <a href="process.php?kutuphane_id=<?php echo $kutuphane['kutuphane_id']; ?>&kutuphanesil=ok">
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
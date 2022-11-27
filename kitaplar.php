<?php
include "_header.php";
?>

    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title col-md-10" style="float: left">Kitaplar</h6>
                        <a class="btn btn-primary col-md-2" href="kitapekle.php" role="button">Kitap Ekle</a>
                        <div style="clear-after: both"></div>
                        <br>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Sıra</th>
                                    <th style="text-align: center">Ad</th>
                                    <th style="text-align: center">Kategori</th>
                                    <th style="text-align: center">Yazar</th>
                                    <th style="text-align: center">Sayfa Sayısı</th>
                                    <th style="text-align: center">Düzenle</th>
                                    <th style="text-align: center">Sil</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $say = 0;
                                $KitapSor = $db->query('SELECT * FROM "Kitaplar" INNER JOIN "KitapYazar" ON "KitapYazar"."kitap_id" = "Kitaplar"."kitap_id" INNER JOIN "Yazarlar" ON "Yazarlar" . "yazar_id" = "KitapYazar"."yazar_id" INNER JOIN "KitapKategori" ON "KitapKategori"."kitap_id" = "Kitaplar"."kitap_id" INNER JOIN "Kategoriler" ON "Kategoriler"."kategori_id" = "KitapKategori"."kategori_id"');
                                while ($kitap = $KitapSor->fetch(PDO::FETCH_ASSOC)) {
                                    $say++;

                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?php echo $say ?></td>
                                        <td style="text-align: center"><?php echo $kitap['kitapAdi'] ?></td>
                                        <td style="text-align: center"><?php echo $kitap['kategoriAd'] ?></td>
                                        <td style="text-align: center"><?php echo $kitap['yazarAd']. " " . $kitap['yazarSoyad'] ?></td>
                                        <td style="text-align: center"><?php echo $kitap['sayfaSayisi'] ?></td>
                                        <td width="200" style="text-align: center">
                                            <a href="kitapduzenle.php?kitap_id=<?php echo $kitap['kitap_id']; ?>">
                                                <button class="btn btn-warning btn-xs">Düzenle</button>
                                            </a>
                                        </td>
                                        <td width="200" style="text-align: center">
                                            <a href="process.php?kitap_id=<?php echo $kitap['kitap_id']; ?>&kitapsil=ok">
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
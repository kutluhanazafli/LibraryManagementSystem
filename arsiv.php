<?php
include "_header.php";
?>

    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title col-md-10" style="float: left">Kütüphane Arşiv</h6>
                        <a class="btn btn-primary col-md-2" href="arsivekle.php" role="button">Kütüphaneye Kitap Ekle</a>
                        <div style="clear-after: both"></div>
                        <br>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Sıra</th>
                                    <th style="text-align: center">Kütüphane Adı</th>
                                    <th style="text-align: center">Kitap Adı</th>
                                    <th style="text-align: center">Kategori</th>
                                    <th style="text-align: center">Yazar</th>
                                    <th style="text-align: center">Adet</th>
                                    <th style="text-align: center">Düzenle</th>
                                    <th style="text-align: center">Sil</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $say = 0;
                                $ArsivSor = $db->query('SELECT * FROM "Arsiv" INNER JOIN "Kutuphane" ON "Arsiv"."kutuphane_id" = "Kutuphane"."kutuphane_id" INNER JOIN "Kitaplar" ON "Arsiv"."kitap_id" = "Kitaplar"."kitap_id" INNER JOIN "KitapKategori" ON "Kitaplar"."kitap_id" = "KitapKategori"."kitap_id" INNER JOIN "Kategoriler" ON "KitapKategori"."kategori_id" = "Kategoriler"."kategori_id" INNER JOIN "KitapYazar" ON "Kitaplar"."kitap_id" = "KitapYazar"."kitap_id" INNER JOIN "Yazarlar" ON "KitapYazar"."yazar_id" = "Yazarlar"."yazar_id" ORDER BY "Kutuphane"."kutuphane_id" ASC');
                                while ($arsiv = $ArsivSor->fetch(PDO::FETCH_ASSOC)) {
                                    $say++;

                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?php echo $say ?></td>
                                        <td style="text-align: center"><?php echo $arsiv['kutuphaneAd'] ?></td>
                                        <td style="text-align: center"><?php echo $arsiv['kitapAdi'] ?></td>
                                        <td style="text-align: center"><?php echo $arsiv['kategoriAd'] ?></td>
                                        <td style="text-align: center"><?php echo $arsiv['yazarAd'] . " " . $arsiv['yazarSoyad'] ?></td>
                                        <td style="text-align: center"><?php echo $arsiv['adet'] ?></td>
                                        <td width="200" style="text-align: center">
                                            <a href="arsivduzenle.php?arsiv_id=<?php echo $arsiv['arsiv_id']; ?>">
                                                <button class="btn btn-warning btn-xs">Düzenle</button>
                                            </a>
                                        </td>
                                        <td width="200" style="text-align: center">
                                            <a href="process.php?arsiv_id=<?php echo $arsiv['arsiv_id']; ?>&arsivsil=ok">
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
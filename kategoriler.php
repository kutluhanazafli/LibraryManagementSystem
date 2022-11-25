<?php
include "_header.php";
?>

    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title col-md-11" style="float: left">Kategoriler</h6>
                        <a class="btn btn-primary col-md-1" href="kategoriekle.php" role="button">Kategori Ekle</a>
                        <div style="clear-after: both"></div>
                        <br>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Sıra</th>
                                    <th style="text-align: center">Ad</th>
                                    <th style="text-align: center">Düzenle</th>
                                    <th style="text-align: center">Sil</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $say = 0;
                                $KategoriSor = $db->query('SELECT * FROM "Kategoriler"');
                                while ($kategori = $KategoriSor->fetch(PDO::FETCH_ASSOC)) {
                                    $say++;

                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?php echo $say ?></td>
                                        <td style="text-align: center"><?php echo $kategori['kategoriAd'] ?></td>
                                        <td width="200" style="text-align: center">
                                            <a href="kategoriduzenle.php?kategori_id=<?php echo $kategori['kategori_id']; ?>">
                                                <button class="btn btn-warning btn-xs">Düzenle</button>
                                            </a>
                                        </td>
                                        <td width="200" style="text-align: center">
                                            <a href="process.php?kategori_id=<?php echo $kategori['kategori_id']; ?>&kategorisil=ok">
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
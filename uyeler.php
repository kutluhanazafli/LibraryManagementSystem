<?php
include "_header.php";
?>

<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title col-md-11" style="float: left">Üyeler</h6>
                    <a class="btn btn-primary col-md-1" href="uyeekle.php" role="button">Üye Ekle</a>
                    <div style="clear-after: both"></div>
                    <br>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: center">Sıra</th>
                                <th style="text-align: center">Ad</th>
                                <th style="text-align: center">E-posta</th>
                                <th style="text-align: center">Telefon</th>
                                <th style="text-align: center">Cinsiyet</th>
                                <th style="text-align: center">Düzenle</th>
                                <th style="text-align: center">Sil</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $say = 0;
                            $uyeSor = $db->query('SELECT * FROM "Uyeler"');
                            while ($uye = $uyeSor->fetch(PDO::FETCH_ASSOC)) {
                                $say++;

                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $say ?></td>
                                    <td style="text-align: center"><?php echo $uye['uyeAd'] . " " . $uye['uyeSoyad'] ?></td>
                                    <td style="text-align: center"><?php echo $uye['eposta'] ?></td>
                                    <td style="text-align: center"><?php echo $uye['telefon'] ?></td>
                                    <td style="text-align: center"><?php if ($uye['cinsiyet'] == 1) {
                                            echo "Erkek";
                                        } elseif($uye['cinsiyet'] == 0) {
                                            echo "Kadın";
                                        } ?>
                                    </td>
                                    <td width="200" style="text-align: center">
                                        <a href="uyeduzenle.php?uye_id=<?php echo $uye['uye_id']; ?>">
                                            <button class="btn btn-warning btn-xs">Düzenle</button>
                                        </a>
                                    </td>
                                    <td width="200" style="text-align: center">
                                        <a href="process.php?uye_id=<?php echo $uye['uye_id']; ?>&uyesil=ok">
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
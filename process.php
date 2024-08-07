<?php
session_start();
include "connection.php";

if (isset($_POST['uyeekle'])) {
    $ad = $_POST['uye_isim'];
    $soyad = $_POST['uye_soyad'];
    $mail = $_POST['uye_mail'];
    $tel = $_POST['uye_tel'];
    $cinsiyet = (int)$_POST['cinsiyet'];
    $il = $_POST['il'];
    $ilce = $_POST['ilce'];
    $mahalle = $_POST['mahalle'];
    $cadde = $_POST['cadde'];
    $sokak = $_POST['sokak'];
    $binano = $_POST['binano'];
    $kat = $_POST['kat'];
    $postakodu = $_POST['postakodu'];

    $stmt = $db->prepare('INSERT INTO "Adresler"(il, ilce, mahalle, cadde, sokak, binano, kat, postakodu) VALUES(:il, :ilce, :mahalle, :cadde, :sokak, :binano, :kat, :postakodu) RETURNING adres_id as adres_id');
    $stmt->execute([
        'il' => $il,
        'ilce' => $ilce,
        'mahalle' => $mahalle,
        'cadde' => $cadde,
        'sokak' => $sokak,
        'binano' => $binano,
        'kat' => $kat,
        'postakodu' => $postakodu
    ]);

    $adres_id = $stmt->fetch(PDO::FETCH_ASSOC)['adres_id'];
    $adres_id = (int)$adres_id;

    $stmt = $db->prepare('INSERT INTO "Uyeler"("uyeAd", "uyeSoyad", eposta, telefon, cinsiyet, adres_id) VALUES (:ad, :soyad, :mail, :tel, :cinsiyet, :adres_id)');
    $stmt->execute([
        'ad' => $ad,
        'soyad' => $soyad,
        'mail' => $mail,
        'tel' => $tel,
        'cinsiyet' => $cinsiyet,
        'adres_id' => $adres_id
    ]);

    if ($stmt) {
        header("Location: uyeler.php?durum=ok");
    } else {
        header("Location: uyeler.php?durum=no");
    }
}


if (isset($_POST['uyeduzenle'])) {
    $ad = $_POST['uye_isim'];
    $soyad = $_POST['uye_soyad'];
    $mail = $_POST['uye_mail'];
    $tel = $_POST['uye_tel'];
    $cinsiyet = (int)$_POST['cinsiyet'];
    $il = $_POST['il'];
    $ilce = $_POST['ilce'];
    $mahalle = $_POST['mahalle'];
    $cadde = $_POST['cadde'];
    $sokak = $_POST['sokak'];
    $binano = $_POST['binano'];
    $kat = $_POST['kat'];
    $postakodu = $_POST['postakodu'];

    $uye_id = (int)$_POST['uye_id'];
    $adres_id = (int)$_POST['adres_id'];

    $stmt = $db->prepare('UPDATE "Adresler" SET il=:il, ilce=:ilce, mahalle=:mahalle, cadde=:cadde, sokak=:sokak, binano=:binano, kat=:kat, postakodu=:postakodu WHERE adres_id=:adres_id');
    $stmt->execute([
        'il' => $il,
        'ilce' => $ilce,
        'mahalle' => $mahalle,
        'cadde' => $cadde,
        'sokak' => $sokak,
        'binano' => $binano,
        'kat' => $kat,
        'postakodu' => $postakodu,
        'adres_id' => $adres_id
    ]);

    $stmt = $db->prepare('UPDATE "Uyeler" SET "uyeAd"=:ad, "uyeSoyad"=:soyad, eposta=:mail, telefon=:tel, cinsiyet=:cinsiyet WHERE uye_id=:uye_id');
    $stmt->execute([
        'ad' => $ad,
        'soyad' => $soyad,
        'mail' => $mail,
        'tel' => $tel,
        'cinsiyet' => $cinsiyet,
        'uye_id' => $uye_id
    ]);

    if ($stmt) {
        header("Location: uyeduzenle.php?uye_id=$uye_id&durum=ok");
    } else {
        header("Location: uyeduzenle.php?uye_id=$uye_id&durum=no");
    }
}


if (isset($_GET['uyesil'])) {
    $uye_id = $_GET['uye_id'];

    $stmt1 = $db->prepare('DELETE FROM "Uyeler" WHERE uye_id=:uye_id RETURNING adres_id as adres_id');
    $stmt1->execute([
        'uye_id' => $uye_id
    ]);

    $adres_id = $stmt1->fetch(PDO::FETCH_ASSOC)['adres_id'];
    $adres_id = (int)$adres_id;

    $stmt2 = $db->prepare('DELETE FROM "Adresler" WHERE adres_id=:adres_id');
    $stmt2->execute([
        'adres_id' => $adres_id
    ]);

    if ($stmt1 && $stmt2) {
        header("Location: uyeler.php?durum=ok");
    } else {
        header("Location: uyeler.php?durum=no");
    }
}


if (isset($_POST['kutuphaneekle'])) {
    $ad = $_POST['kutuphane_isim'];
    $il = $_POST['il'];
    $ilce = $_POST['ilce'];
    $mahalle = $_POST['mahalle'];
    $cadde = $_POST['cadde'];
    $sokak = $_POST['sokak'];
    $binano = $_POST['binano'];
    $kat = $_POST['kat'];
    $postakodu = $_POST['postakodu'];

    $stmt = $db->prepare('INSERT INTO "Adresler"(il, ilce, mahalle, cadde, sokak, binano, kat, postakodu) VALUES (:il, :ilce, :mahalle, :cadde, :sokak, :binano, :kat, :postakodu) RETURNING adres_id as adres_id');
    $stmt->execute([
        'il' => $il,
        'ilce' => $ilce,
        'mahalle' => $mahalle,
        'cadde' => $cadde,
        'sokak' => $sokak,
        'binano' => $binano,
        'kat' => $kat,
        'postakodu' => $postakodu
    ]);

    $adres_id = $stmt->fetch(PDO::FETCH_ASSOC)['adres_id'];
    $adres_id = (int)$adres_id;

    $stmt = $db->prepare('INSERT INTO "Kutuphane"("kutuphaneAd", adres_id) VALUES (:ad, :adres_id)');
    $stmt->execute([
        'ad' => $ad,
        'adres_id' => $adres_id
    ]);

    if ($stmt) {
        header("Location: kutuphaneler.php?durum=ok");
    } else {
        header("Location: kutuphaneler.php?durum=no");
    }
}


if (isset($_POST['kutuphaneduzenle'])) {
    $ad = $_POST['kutuphane_isim'];
    $il = $_POST['il'];
    $ilce = $_POST['ilce'];
    $mahalle = $_POST['mahalle'];
    $cadde = $_POST['cadde'];
    $sokak = $_POST['sokak'];
    $binano = $_POST['binano'];
    $kat = $_POST['kat'];
    $postakodu = $_POST['postakodu'];

    $kutuphane_id = (int)$_POST['kutuphane_id'];
    $adres_id = (int)$_POST['adres_id'];

    $stmt = $db->prepare('UPDATE "Adresler" SET il=:il, ilce=:ilce, mahalle=:mahalle, cadde=:cadde, sokak=:sokak, binano=:binano, kat=:kat, postakodu=:postakodu WHERE adres_id=:adres_id');
    $stmt->execute([
        'il' => $il,
        'ilce' => $ilce,
        'mahalle' => $mahalle,
        'cadde' => $cadde,
        'sokak' => $sokak,
        'binano' => $binano,
        'kat' => $kat,
        'postakodu' => $postakodu,
        'adres_id' => $adres_id
    ]);

    $stmt = $db->prepare('UPDATE "Kutuphane" SET "kutuphaneAd"=:ad WHERE kutuphane_id=:kutuphane_id');
    $stmt->execute([
        'ad' => $ad,
        'kutuphane_id' => $kutuphane_id
    ]);

    if ($stmt) {
        header("Location: kutuphaneduzenle.php?kutuphane_id=$kutuphane_id&durum=ok");
    } else {
        header("Location: kutuphaneduzenle.php?kutuphane_id=$kutuphane_id&durum=no");
    }
}


if (isset($_GET['kutuphanesil'])) {
    $kutuphane_id = $_GET['kutuphane_id'];

    $stmt1 = $db->prepare('DELETE FROM "Kutuphane" WHERE kutuphane_id=:kutuphane_id RETURNING adres_id as adres_id');
    $stmt1->execute([
        'kutuphane_id' => $kutuphane_id
    ]);

    $adres_id = $stmt1->fetch(PDO::FETCH_ASSOC)['adres_id'];
    $adres_id = (int)$adres_id;

    $stmt2 = $db->prepare('DELETE FROM "Adresler" WHERE adres_id=:adres_id');
    $stmt2->execute([
        'adres_id' => $adres_id
    ]);

    if ($stmt1 && $stmt2) {
        header("Location: kutuphaneler.php?durum=ok");
    } else {
        header("Location: kutuphaneler.php?durum=no");
    }
}


if (isset($_POST['yayineviekle'])) {
    $ad = $_POST['yayinevi_isim'];
    $il = $_POST['il'];
    $ilce = $_POST['ilce'];
    $mahalle = $_POST['mahalle'];
    $cadde = $_POST['cadde'];
    $sokak = $_POST['sokak'];
    $binano = $_POST['binano'];
    $kat = $_POST['kat'];
    $postakodu = $_POST['postakodu'];

    $stmt = $db->prepare('INSERT INTO "Adresler"(il, ilce, mahalle, cadde, sokak, binano, kat, postakodu) VALUES (:il, :ilce, :mahalle, :cadde, :sokak, :binano, :kat, :postakodu) RETURNING adres_id as adres_id');
    $stmt->execute([
        'il' => $il,
        'ilce' => $ilce,
        'mahalle' => $mahalle,
        'cadde' => $cadde,
        'sokak' => $sokak,
        'binano' => $binano,
        'kat' => $kat,
        'postakodu' => $postakodu
    ]);

    $adres_id = $stmt->fetch(PDO::FETCH_ASSOC)['adres_id'];
    $adres_id = (int)$adres_id;

    $stmt = $db->prepare('INSERT INTO "YayinEvleri"("yayinEviAd", adres_id) VALUES (:ad, :adres_id)');
    $stmt->execute([
        'ad' => $ad,
        'adres_id' => $adres_id
    ]);

    if ($stmt) {
        header("Location: yayinevleri.php?durum=ok");
    } else {
        header("Location: yayinevleri.php?durum=no");
    }
}


if (isset($_POST['yayineviduzenle'])) {
    $ad = $_POST['yayinevi_isim'];
    $il = $_POST['il'];
    $ilce = $_POST['ilce'];
    $mahalle = $_POST['mahalle'];
    $cadde = $_POST['cadde'];
    $sokak = $_POST['sokak'];
    $binano = $_POST['binano'];
    $kat = $_POST['kat'];
    $postakodu = $_POST['postakodu'];

    $yayinevi_id = (int)$_POST['yayinevi_id'];
    $adres_id = (int)$_POST['adres_id'];

    $stmt = $db->prepare('UPDATE "Adresler" SET il=:il, ilce=:ilce, mahalle=:mahalle, cadde=:cadde, sokak=:sokak, binano=:binano, kat=:kat, postakodu=:postakodu WHERE adres_id=:adres_id');
    $stmt->execute([
        'il' => $il,
        'ilce' => $ilce,
        'mahalle' => $mahalle,
        'cadde' => $cadde,
        'sokak' => $sokak,
        'binano' => $binano,
        'kat' => $kat,
        'postakodu' => $postakodu,
        'adres_id' => $adres_id
    ]);

    $stmt = $db->prepare('UPDATE "YayinEvleri" SET "yayinEviAd"=:ad WHERE "yayinEvi_id"=:yayinevi_id');
    $stmt->execute([
        'ad' => $ad,
        'yayinevi_id' => $yayinevi_id
    ]);

    if ($stmt) {
        header("Location: yayineviduzenle.php?yayinevi_id=$yayinevi_id&durum=ok");
    } else {
        header("Location: yayineviduzenle.php?yayinevi_id=$yayinevi_id&durum=no");
    }
}


if (isset($_GET['yayinevisil'])) {
    $yayinevi_id = $_GET['yayinevi_id'];

    $stmt1 = $db->prepare('DELETE FROM "YayinEvleri" WHERE "yayinEvi_id"=:yayinevi_id RETURNING adres_id as adres_id');
    $stmt1->execute([
        'yayinevi_id' => $yayinevi_id
    ]);

    $adres_id = $stmt1->fetch(PDO::FETCH_ASSOC)['adres_id'];
    $adres_id = (int)$adres_id;

    $stmt2 = $db->prepare('DELETE FROM "Adresler" WHERE adres_id=:adres_id');
    $stmt2->execute([
        'adres_id' => $adres_id
    ]);

    if ($stmt1 && $stmt2) {
        header("Location: yayinevleri.php?durum=ok");
    } else {
        header("Location: yayinevleri.php?durum=no");
    }
}


if (isset($_POST['kategoriekle'])) {
    $ad = $_POST['kategori_isim'];

    $stmt = $db->prepare('INSERT INTO "Kategoriler"("kategoriAd") VALUES (:ad)');
    $stmt->execute([
        'ad' => $ad
    ]);

    if ($stmt) {
        header("Location: kategoriler.php?durum=ok");
    } else {
        header("Location: kategoriler.php?durum=no");
    }
}


if (isset($_POST['kategoriduzenle'])) {
    $ad = $_POST['kategori_isim'];
    $kategori_id = (int)$_POST['kategori_id'];

    $stmt = $db->prepare('UPDATE "Kategoriler" SET "kategoriAd"=:ad WHERE "kategori_id"=:kategori_id');
    $stmt->execute([
        'ad' => $ad,
        'kategori_id' => $kategori_id
    ]);

    if ($stmt) {
        header("Location: kategoriduzenle.php?kategori_id=$kategori_id&durum=ok");
    } else {
        header("Location: kategoriduzenle.php?kategori_id=$kategori_id&durum=no");
    }
}


if (isset($_GET['kategorisil'])) {
    $kategori_id = $_GET['kategori_id'];

    $stmt = $db->prepare('DELETE FROM "Kategoriler" WHERE "kategori_id"=:kategori_id');
    $stmt->execute([
        'kategori_id' => $kategori_id
    ]);

    if ($stmt) {
        header("Location: kategoriler.php?durum=ok");
    } else {
        header("Location: kategoriler.php?durum=no");
    }
}


if (isset($_POST['yazarekle'])) {
    $ad = $_POST['yazar_isim'];
    $soyad = $_POST['yazar_soyad'];

    $stmt = $db->prepare('INSERT INTO "Yazarlar"("yazarAd", "yazarSoyad") VALUES (:ad, :soyad)');
    $stmt->execute([
        'ad' => $ad,
        'soyad' => $soyad
    ]);

    if ($stmt) {
        header("Location: yazarlar.php?durum=ok");
    } else {
        header("Location: yazarlar.php?durum=no");
    }
}


if (isset($_POST['yazarduzenle'])) {
    $ad = $_POST['yazar_isim'];
    $soyad = $_POST['yazar_soyad'];
    $yazar_id = (int)$_POST['yazar_id'];

    $stmt = $db->prepare('UPDATE "Yazarlar" SET "yazarAd"=:ad, "yazarSoyad"=:soyad WHERE "yazar_id"=:yazar_id');
    $stmt->execute([
        'ad' => $ad,
        'soyad' => $soyad,
        'yazar_id' => $yazar_id
    ]);

    if ($stmt) {
        header("Location: yazarduzenle.php?yazar_id=$yazar_id&durum=ok");
    } else {
        header("Location: yazarduzenle.php?yazar_id=$yazar_id&durum=no");
    }
}


if (isset($_GET['yazarsil'])) {
    $yazar_id = $_GET['yazar_id'];

    $stmt = $db->prepare('DELETE FROM "Yazarlar" WHERE "yazar_id"=:yazar_id');
    $stmt->execute([
        'yazar_id' => $yazar_id
    ]);

    if ($stmt) {
        header("Location: yazarlar.php?durum=ok");
    } else {
        header("Location: yazarlar.php?durum=no");
    }
}


if (isset($_POST['kitapekle'])) {
    $ad = $_POST['kitap_isim'];
    $isbn = $_POST['kitap_isbn'];
    $sayfa = $_POST['kitap_sayfa'];
    $tarih = $_POST['kitap_tarih'];
    $yayinevi = $_POST['yayinevi'];
    $yazar = $_POST['yazar'];
    $kategori = $_POST['kategori'];
    $dolap = $_POST['dolap'];
    $raf = $_POST['raf'];
    $dil = $_POST['dil'];

    $stmt = $db->prepare('INSERT INTO "Kitaplar"("kitapAdi", "ISBN", "sayfaSayisi", "yayinTarihi", "yayinEvi_id", "dolap", "raf", "dil") VALUES (:ad, :isbn, :sayfa, :tarih, :yayinevi, :dolap, :raf, :dil) RETURNING kitap_id as kitap_id');
    $stmt->execute([
        'ad' => $ad,
        'isbn' => $isbn,
        'sayfa' => $sayfa,
        'tarih' => $tarih,
        'yayinevi' => $yayinevi,
        'dolap' => $dolap,
        'raf' => $raf,
        'dil' => $dil
    ]);

    $kitap_id = $stmt->fetch(PDO::FETCH_ASSOC)['kitap_id'];
    $kitap_id = (int)$kitap_id;

    $stmt = $db->prepare('INSERT INTO "KitapYazar"("kitap_id", "yazar_id") VALUES (:kitap_id, :yazar)');
    $stmt->execute([
        'kitap_id' => $kitap_id,
        'yazar' => $yazar
    ]);

    $stmt = $db->prepare('INSERT INTO "KitapKategori"("kitap_id", "kategori_id") VALUES (:kitap_id, :kategori)');
    $stmt->execute([
        'kitap_id' => $kitap_id,
        'kategori' => $kategori
    ]);

    if ($stmt) {
        header("Location: kitaplar.php?durum=ok");
    } else {
        header("Location: kitaplar.php?durum=no");
    }
}


if (isset($_POST['kitapduzenle'])){
    $ad = $_POST['kitap_isim'];
    $isbn = $_POST['kitap_isbn'];
    $sayfa = $_POST['kitap_sayfa'];
    $tarih = $_POST['kitap_tarih'];
    $yayinevi = $_POST['yayinevi'];
    $yazar = $_POST['yazar'];
    $kategori = $_POST['kategori'];
    $dolap = $_POST['dolap'];
    $raf = $_POST['raf'];
    $dil = $_POST['dil'];
    $kitap_id = (int)$_POST['kitap_id'];

    $stmt = $db->prepare('UPDATE "Kitaplar" SET "kitapAdi"=:ad, "ISBN"=:isbn, "sayfaSayisi"=:sayfa, "yayinTarihi"=:tarih, "yayinEvi_id"=:yayinevi, "dolap"=:dolap, "raf"=:raf, "dil"=:dil WHERE "kitap_id"=:kitap_id');
    $stmt->execute([
        'ad' => $ad,
        'isbn' => $isbn,
        'sayfa' => $sayfa,
        'tarih' => $tarih,
        'yayinevi' => $yayinevi,
        'dolap' => $dolap,
        'raf' => $raf,
        'dil' => $dil,
        'kitap_id' => $kitap_id
    ]);

    $stmt = $db->prepare('UPDATE "KitapYazar" SET "yazar_id"=:yazar WHERE "kitap_id"=:kitap_id');
    $stmt->execute([
        'yazar' => $yazar,
        'kitap_id' => $kitap_id
    ]);

    $stmt = $db->prepare('UPDATE "KitapKategori" SET "kategori_id"=:kategori WHERE "kitap_id"=:kitap_id');
    $stmt->execute([
        'kategori' => $kategori,
        'kitap_id' => $kitap_id
    ]);

    if ($stmt) {
        header("Location: kitapduzenle.php?kitap_id=$kitap_id&durum=ok");
    } else {
        header("Location: kitapduzenle.php?kitap_id=$kitap_id&durum=no");
    }
}


if (isset($_GET['kitapsil'])) {
    $kitap_id = $_GET['kitap_id'];

    $stmt = $db->prepare('DELETE FROM "KitapYazar" WHERE "kitap_id"=:kitap_id');
    $stmt->execute([
        'kitap_id' => $kitap_id
    ]);

    $stmt = $db->prepare('DELETE FROM "KitapKategori" WHERE "kitap_id"=:kitap_id');
    $stmt->execute([
        'kitap_id' => $kitap_id
    ]);

    $stmt = $db->prepare('DELETE FROM "Kitaplar" WHERE "kitap_id"=:kitap_id');
    $stmt->execute([
        'kitap_id' => $kitap_id
    ]);

    if ($stmt) {
        header("Location: kitaplar.php?durum=ok");
    } else {
        header("Location: kitaplar.php?durum=no");
    }
}


if (isset($_POST['arsivekle'])){
    $kitap_id = $_POST['kitap_id'];
    $kutuphane_id = $_POST['kutuphane_id'];
    $adet = $_POST['adet'];

    $stmt = $db->prepare('INSERT INTO "Arsiv"("kitap_id", "kutuphane_id", "adet") VALUES (:kitap_id, :kutuphane_id, :adet)');
    $stmt->execute([
        'kitap_id' => $kitap_id,
        'kutuphane_id' => $kutuphane_id,
        'adet' => $adet
    ]);

    if ($stmt) {
        header("Location: arsiv.php?durum=ok");
    } else {
        header("Location: arsiv.php?durum=no");
    }
}


if (isset($_POST['arsivduzenle'])){
    $kitap_id = $_POST['kitap_id'];
    $kutuphane_id = $_POST['kutuphane_id'];
    $adet = $_POST['adet'];
    $arsiv_id = $_POST['arsiv_id'];

    $stmt = $db->prepare('UPDATE "Arsiv" SET "kitap_id"=:kitap_id, "kutuphane_id"=:kutuphane_id, "adet"=:adet WHERE "arsiv_id"=:arsiv_id');
    $stmt->execute([
        'kitap_id' => $kitap_id,
        'kutuphane_id' => $kutuphane_id,
        'adet' => $adet,
        'arsiv_id' => $arsiv_id
    ]);

    if ($stmt) {
        header("Location: arsivduzenle.php?arsiv_id=$arsiv_id&durum=ok");
    } else {
        header("Location: arsivduzenle.php?arsiv_id=$arsiv_id&durum=no");
    }
}


if (isset($_GET['arsivsil'])) {
    $arsiv_id = $_GET['arsiv_id'];

    $stmt = $db->prepare('DELETE FROM "Arsiv" WHERE "arsiv_id"=:arsiv_id');
    $stmt->execute([
        'arsiv_id' => $arsiv_id
    ]);

    if ($stmt) {
        header("Location: arsiv.php?durum=ok");
    } else {
        header("Location: arsiv.php?durum=no");
    }
}


if (isset($_POST['emanetekle'])){
    $uye_id = $_POST['uye_id'];
    $kitap_id = $_POST['kitap_id'];
    $kutuphane_id = $_POST['kutuphane_id'];
    $emanetTarihi = $_POST['emanetTarihi'];

    $stmt = $db->prepare('UPDATE "Arsiv" SET "adet"="adet"-1 WHERE "kitap_id"=:kitap_id AND "kutuphane_id"=:kutuphane_id AND "adet">0');
    $stmt->execute([
        'kitap_id' => $kitap_id,
        'kutuphane_id' => $kutuphane_id
    ]);

    if ($stmt) {
        $stmt = $db->prepare('INSERT INTO "Emanet"("uye_id", "kitap_id", "kutuphane_id", "emanetTarihi") VALUES (:uye_id, :kitap_id, :kutuphane_id, :emanetTarihi)');
        $stmt->execute([
            'uye_id' => $uye_id,
            'kitap_id' => $kitap_id,
            'kutuphane_id' => $kutuphane_id,
            'emanetTarihi' => $emanetTarihi
        ]);

        if ($stmt) {
            header("Location: emanetler.php?durum=ok");
        } else {
            header("Location: emanetler.php?durum=no");
        }
    } else {
        header("Location: emanetler.php?durum=nobook");
    }
}


if (isset($_POST['emanetduzenle'])){
    $emanet_id = $_POST['emanet_id'];
    $uye_id = $_POST['uye_id'];
    $kitap_id = $_POST['kitap_id'];
    $kutuphane_id = $_POST['kutuphane_id'];
    $emanetTarihi = $_POST['emanetTarihi'];
    $teslimTarihi = $_POST['teslimTarihi'];

    if ($_POST['teslimedildi'] != null) {
        $teslimedildi = $_POST['teslimedildi'];

        $kontrol = $db->prepare('SELECT * FROM "Emanet" WHERE "emanet_id"=:emanet_id');
        $kontrol->execute([
            'emanet_id' => $emanet_id
        ]);
        $kontrol = $kontrol->fetch(PDO::FETCH_ASSOC);

        if ($kontrol['teslimTarihi'] == null){
            $stmt = $db->prepare('UPDATE "Arsiv" SET "adet"="adet"+1 WHERE "kitap_id"=:kitap_id AND "kutuphane_id"=:kutuphane_id');
            $stmt->execute([
                'kitap_id' => $kitap_id,
                'kutuphane_id' => $kutuphane_id
            ]);
        }

        $stmt = $db->prepare('UPDATE "Emanet" SET "uye_id"=:uye_id, "kitap_id"=:kitap_id, "kutuphane_id"=:kutuphane_id, "emanetTarihi"=:emanetTarihi, "teslimTarihi"=:teslimTarihi WHERE "emanet_id"=:emanet_id');
        $stmt->execute([
            'uye_id' => $uye_id,
            'kitap_id' => $kitap_id,
            'kutuphane_id' => $kutuphane_id,
            'emanetTarihi' => $emanetTarihi,
            'teslimTarihi' => $teslimTarihi,
            'emanet_id' => $emanet_id
        ]);

        if ($stmt) {
            header("Location: emanetduzenle.php?emanet_id=$emanet_id&durum=ok");
        } else {
            header("Location: emanetduzenle.php?emanet_id=$emanet_id&durum=no");
        }

    } elseif ($_POST['teslimedildi'] == null) {
        $stmt = $db->prepare('UPDATE "Emanet" SET "uye_id"=:uye_id, "kitap_id"=:kitap_id, "kutuphane_id"=:kutuphane_id, "emanetTarihi"=:emanetTarihi, "teslimTarihi"=:teslimTarihi WHERE "emanet_id"=:emanet_id');
        $stmt->execute([
            'uye_id' => $uye_id,
            'kitap_id' => $kitap_id,
            'kutuphane_id' => $kutuphane_id,
            'emanetTarihi' => $emanetTarihi,
            'emanet_id' => $emanet_id,
            'teslimTarihi' => null
        ]);

        if ($stmt) {
            header("Location: emanetduzenle.php?emanet_id=$emanet_id&durum=ok");
        } else {
            header("Location: emanetduzenle.php?emanet_id=$emanet_id&durum=no");
        }
    }
}


if (isset($_GET['emanetsil'])) {
    $emanet_id = $_GET['emanet_id'];

    $stmt = $db->prepare('INSERT INTO "Arsiv"("kitap_id", "kutuphane_id", "adet") VALUES (:kitap_id, :kutuphane_id, 1) ON CONFLICT ("kitap_id", "kutuphane_id") DO UPDATE SET "adet"="adet"+1');

    $stmt1 = $db->prepare('DELETE FROM "Emanet" WHERE emanet_id=:emanet_id');
    $stmt1->execute([
        'emanet_id' => $emanet_id
    ]);

    if ($stmt) {
        header("Location: emanetler.php?durum=ok");
    } else {
        header("Location: emanetler.php?durum=no");
    }
}
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

    $stmt = $db -> prepare('INSERT INTO "Adresler"(il, ilce, mahalle, cadde, sokak, binano, kat, postakodu) VALUES(:il, :ilce, :mahalle, :cadde, :sokak, :binano, :kat, :postakodu) RETURNING adres_id as adres_id');
    $stmt -> execute([
        'il' => $il,
        'ilce' => $ilce,
        'mahalle' => $mahalle,
        'cadde' => $cadde,
        'sokak' => $sokak,
        'binano' => $binano,
        'kat' => $kat,
        'postakodu' => $postakodu
    ]);

    $adres_id = $stmt -> fetch(PDO::FETCH_ASSOC)['adres_id'];
    $adres_id = (int)$adres_id;

    $stmt = $db -> prepare('INSERT INTO "Uyeler"("uyeAd", "uyeSoyad", eposta, telefon, cinsiyet, adres_id) VALUES (:ad, :soyad, :mail, :tel, :cinsiyet, :adres_id)');
    $stmt -> execute([
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


if (isset($_POST['uyeduzenle'])){
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

    $stmt = $db -> prepare('UPDATE "Adresler" SET il=:il, ilce=:ilce, mahalle=:mahalle, cadde=:cadde, sokak=:sokak, binano=:binano, kat=:kat, postakodu=:postakodu WHERE adres_id=:adres_id');
    $stmt -> execute([
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

    $stmt = $db -> prepare('UPDATE "Uyeler" SET "uyeAd"=:ad, "uyeSoyad"=:soyad, eposta=:mail, telefon=:tel, cinsiyet=:cinsiyet WHERE uye_id=:uye_id');
    $stmt -> execute([
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

    $stmt1 = $db -> prepare('DELETE FROM "Uyeler" WHERE uye_id=:uye_id RETURNING adres_id as adres_id');
    $stmt1 -> execute([
        'uye_id' => $uye_id
    ]);

    $adres_id = $stmt1 -> fetch(PDO::FETCH_ASSOC)['adres_id'];
    $adres_id = (int)$adres_id;

    $stmt2 = $db -> prepare('DELETE FROM "Adresler" WHERE adres_id=:adres_id');
    $stmt2 -> execute([
        'adres_id' => $adres_id
    ]);

    if ($stmt1 && $stmt2) {
        header("Location: uyeler.php?durum=ok");
    } else {
        header("Location: uyeler.php?durum=no");
    }
}




<?php

include 'class.db.php';

$name = $_POST["name"];
$email = $_POST["email"];
$phones = $_POST["phones"];
$street = $_POST["street"];
$home = $_POST["home"];
$part = $_POST["part"];
$appt = $_POST["appt"];
$floor = $_POST["floor"];
$comment = $_POST["comment"];


$q = "SELECT * FROM user WHERE email LIKE '$email' LIMIT 1";
$db = Db::getInstance();
$ret = $db->fetchAll($q, [], __FILE__);
$user_id = $ret[0]['id'];

if ($ret[0]['email'] == $email) {
    $name = $ret[0]['name'];
    echo "Добро пожаловать " . "$name !!";
    $dates = date("Y-m-d");
    // увеличить число заказов по данному е мейлу - пользователю
    $qw = "INSERT INTO goods (user_id, date) VALUES ('$user_id', '$dates');";
    $db = Db::getInstance();
    $req = $db->exec($qw);

    $qr = "SELECT * FROM goods ORDER BY id DESC LIMIT 1";
    $db = Db::getInstance();
    $req = $db->fetchAll($qr);
    $ID = $req[0]['id'];

    $qt = "SELECT COUNT(*) as count FROM goods WHERE user_id='$user_id'";
    $db = Db::getInstance();
    $req = $db->fetchAll($qt);
    $n = $req[0]['count'];

    $alarm = "Спасибо, ваш заказ будет доставлен по адресу: " . "$street " . "$home " . "$part " . "$appt " . "<br>" . "Номер вашего заказа: #" . "$ID. " . "<br>" . "Это ваш " . "$n" . "-й заказ!";

} elseif ($ret[0]['email'] !== $email) {
    echo 'Поздравляем с новой регистрацией !!!';
    // добавить нового пользователя с этим е мейлом
    $w = "INSERT INTO user (name, email, phones, street, home, part, appt, floor, comment) VALUES ('$name', '$email', '$phones', '$street', '$home', '$part', '$appt', '$floor','$comment');";
    $db = Db::getInstance();
    $rer = $db->exec($w);

    $qtq = "SELECT * FROM user ORDER BY id DESC LIMIT 1";
    $db = Db::getInstance();
    $req = $db->fetchAll($qtq, [], __FILE__);
    $user_id = $req[0]['id'];

    $dates = date("Y-m-d");
    $qwy = "INSERT INTO goods (user_id, date) VALUES ('$user_id', '$dates');";
    $db = Db::getInstance();
    $req = $db->exec($qwy);

    $qry = "SELECT * FROM goods ORDER BY id DESC LIMIT 1";
    $db = Db::getInstance();
    $req = $db->fetchAll($qry, [], __FILE__);
    $ID = $req[0]['id'];

    $qtg = "SELECT COUNT(*) as count FROM goods WHERE user_id='$user_id'";
    $db = Db::getInstance();
    $req = $db->fetchAll($qtg);
    $n = $req[0]['count'];

    $alarm = "Спасибо, ваш заказ будет доставлен по адресу: " . "$street " . "$home " . "$part " . "$appt " . "<br>" . "Номер вашего заказа: #" . "$ID. " . "<br>" . "Это ваш " . "$n" . "-й заказ!";

} else {
    echo "Что то необычное";
}


?><br><?
echo $alarm;
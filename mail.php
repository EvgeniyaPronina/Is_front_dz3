<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Model.php';
//получить текущие дату и время
date_default_timezone_set('Europe/Moscow');
$cur_day = date('Y-m-d');
$cur_time = date('H') . ':00:00';
//получаем выгрузку из БД: массив с данными, соотвествующими текущей дате и времени
$mod = new Model;
$letters = $mod->getarray('date', $cur_day, 'time', $cur_time);
//отправляем письма каждому адресату в массиве
foreach ($letters as $letter) {
    $email = $letter['email'];
    $mes = $letter['mes'];
    $subject = 'Сообщение из прошлого';

    $mailer = new PHPMailer\PHPMailer\PHPMailer();
    $mailer->IsSMTP();
    $mailer->Host = "smtp.mail.ru";//todo insert your host
    $mailer->SMTPAuth = true;
    $mailer->SMTPSecure = "ssl";
    $mailer->Port = 465;
    $mailer->CharSet = 'UTF-8';

    $mailer->Username = "";//todo insert your e-mail address
    $mailer->Password = "";// todo insert your password
    $mailer->SetFrom('mail@', 'Робот');//todo insert your data
    $mailer->Subject = $subject;
    $mailer->msgHTML($mes);
    $mailer->addAddress($email, '');
    if($mailer->send()) {
        $FileName = 'logs/success.csv';
        $csv = fopen($FileName, 'a');
        $record = array($letter['id'], 'письмо с указанным id отправлено, дата отправки:', date('Y-m-d H:i:s'));
        fputcsv($csv, $record, ';');
        fclose($csv);
    } else {
        $FileName = 'logs/failed.csv';
        $csv = fopen($FileName, 'a');
        $record = array($letter['id'], 'письмо с указанным id не отправлено, сбой произошел:', date('Y-m-d H:i:s'));
        fputcsv($csv, $record, ';');
        fclose($csv);
    }

}

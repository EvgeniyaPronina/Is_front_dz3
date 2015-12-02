<?php
if (!empty($_POST)) {

    $error = array();

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $date = $_POST['date'];
    if ($date <= date('Y-m-d')) {
        $error[] = 'Наиболее ранняя доступная дата - завтрашний день.';
    }
    $time = $_POST['time'];
    $mes = filter_var($_POST['message'],FILTER_SANITIZE_STRING);

    $secret = '';//todo скрыть при размещении на github
    $captcha = $_POST['g-recaptcha-response'];
    $user_id = $_SERVER['REMOTE_ADDR'];

    $curl = curl_init('https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, array(
        'secret' => $secret,
        'response' => $captcha,
        'remoteip' => $user_id
    ));
    $data = curl_exec($curl);
    $info = curl_getinfo($curl);
    curl_close($curl);

    if($info['http_code'] == 200) {
        $data_json = json_decode($data, true);
        if (!($data_json['success'] == true)) {
            $error[] = 'Заполните, пожалуйста, капчу.';
        }
    }
    if (!empty($error)) {
        echo json_encode($error);//('ошибка');//json_encode('ошибка');//
    }else {
        //запись данных в БД
        require_once 'Model.php';
        $mod = new Model;
        $mod->insertOne($email, $date, $time, $mes);
        $success = 'Ваше письмо будет отправлено в назначенное время!';
        echo json_encode($success);
    }
}







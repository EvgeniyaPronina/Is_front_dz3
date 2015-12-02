<?php
include_once 'vendor/autoload.php';
class Model{

    protected $table = 'list';

    public function __construct(){
        \ORM::configure('mysql:host=localhost;dbname=igorpronin_list');
        \ORM::configure('username', 'igorpronin_list');
        \ORM::configure('password', '');//todo скрыть при размещении на github
    }

    public function insertOne($email, $date, $time, $mes)
    {
        $current = \ORM::for_table($this->table)->create();

        $current->email = $email;
        $current->date = $date;
        $current->time = $time;
        $current->mes = $mes;

        $current->save();
    }

    public function getarray($field1, $value1, $field2, $value2){
        return \ORM::for_table($this->table)->where(array($field1 => $value1, $field2 => $value2))->find_array();
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/20
 * Time: 0:32
 */

namespace Chatbox\TmpData;

use \Illuminate\Database\Capsule\Manager as Capsule;

class TmpDataProvider {

    public $tableName;

    /**
     * @var \Illuminate\Database\Capsule\Manager
     */
    public $capsule;

    function __construct()
    {

        $this->capsule = new Capsule;

        $this->capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'misaki',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
    }

    /**
     * @param array $data
     * @return TmpData
     */
    protected function getModel(array $data){
        $data = $data + [

            ];
        $model = new TmpData($data);
        $model->setTable($this->tableName);
        return $model;
    }

    public function set($key,$value){
        $model = $this->getModel([
            "key" => $key,
            "value" => $value
        ]);
        return $model->save();
    }

    public function pickUp($key,$updateTimestamp=true){
        $model = $this->getModel([]);
        $model = $model->find($key);

    }

    public function read($key){
        $this->pickUp($key,false);
    }



} 
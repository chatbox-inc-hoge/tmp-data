<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/20
 * Time: 0:32
 */

namespace Chatbox\TmpData;

class TmpDataProvider {

    /**
     * @var Eloquent\TmpData
     */
    public $model;

    function __construct(Eloquent\TmpData $eloquent)
    {

        $this->model = $eloquent;
    }

    public function set($key,$value){
        return $this->model->create([
            "key" => $key,
            "value" => $value
        ]);
    }

    public function getAll(){

    }

    /**
     * @param $key
     * @param bool $updateTimestamp
     * @return TmpData
     */
    public function pickUp($key,$updateTimestamp=true){
        return $this->model->find($key);
    }


    /**
     * @param $key
     * @return TmpData
     */
    public function read($key){
        return $this->pickUp($key,false);
    }



} 
<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/20
 * Time: 0:58
 */

namespace Chatbox\TmpData;

use Illuminate\Database\Capsule\Manager as Capsule;

class TmpData extends \Illuminate\Database\Eloquent\Model{

    protected $table;

    /**
     * @var Capsule
     */
    protected $con;

    protected $data;

    ##
    # Getter Section
    ##

    protected function getData($key){
        return $this->data[$key];
    }
    protected function getDateWithFomat($key,$fomat = "Y-m-d H:i:s"){
        return date($fomat,$this->data[$key]);
    }
    public function getKey(){
        $this->getData("key");
    }
    public function getValue(){
        $this->getData("value");
    }
    public function getCreatedAt($fomat="Y-m-d H:i:s"){
        $this->getDateWithFomat("createdAt",$fomat);
    }
    public function getUpdatedAt($fomat="Y-m-d H:i:s"){
        $this->getDateWithFomat("createdAt",$fomat);
    }
    public function getExpiredAt($fomat="Y-m-d H:i:s"){
        $this->getDateWithFomat("createdAt",$fomat);
    }
    public function getAccessdAt($fomat="Y-m-d H:i:s"){
        $this->getDateWithFomat("createdAt",$fomat);
    }
    public function getDeletedAt($fomat="Y-m-d H:i:s"){
        $this->getDateWithFomat("createdAt",$fomat);
    }


    ##
    # Mapper Section
    ##

    public function update($value){
        $this->con->table($this->table)->update([
            "value" => $value,
            "updated_at" => time()
        ]);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/20
 * Time: 0:58
 */

namespace Chatbox\TmpData\Eloquent;

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class TmpData extends \Illuminate\Database\Eloquent\Model{

//    use SoftDeletingTrait;

    protected $table;

    protected $fillable = ["key","value"];
//    protected $guarded = ["*"];

    public function getDates(){
        return ["created_at","updated_at","access_at","expired_at","deleted_at"];
    }

    public function getValueAttribute($value){
        return json_decode($value,true);
    }
    public function setValueAttribute($value){
        $this->attributes["value"] = json_encode($value);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/21
 * Time: 1:10
 */

namespace Chatbox\TmpData;

use \Illuminate\Database\Schema\Blueprint;

class SchemaBuilder{

    static function getBuilder(){
        return function(Blueprint $blueprint){
            $blueprint->string("key");
            $blueprint->text("value");
            $blueprint->timestamp("created_at");
            $blueprint->timestamp("updated_at");
            $blueprint->timestamp("access_at");
            $blueprint->timestamp("expired_at");
            $blueprint->timestamp("deleted_at");
        };
    }
}
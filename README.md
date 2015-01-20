# tmp kvs

一時的なKVS形式のデータを取り扱う際のユーティリティ

## Usage

````
$tmpData = new \TmpData\TempDataProvider([
    "tableName" => "tmp_token",
    "dns" => "mysql://hogehoge"
]);

$tmpData->set($key,$value); // write data

$token = $tmpData->pickUp($key); //read data and update timestamp
$token = $tmpData->read($key); //just read data

//token will be null or \Chatbox\TempData Object

if($token->isUsable()){ // check if token in term
    $key = $token->key;
    $value = $token->value;
    $createdAt = $token->createdAt;
    $updatedAt = $token->updatedAt;
    $expiredAt = $token->expiredAt;
    $accessedAt = $token->accessedAt;
    $deletedAt = $token->deletedAt;
}

$token->update($value); // update data
$token->delete(); // soft delete

$tmpData->flush(); // delete all data
````

## schema

key string
value string
createdAt timestamp
updatedAt timestamp
accessedAt timestamp
expiredAt timestamp
deletedAt timestamp

Simply you can use `\Chatbox\TmpData\SchemaBuilder` to generate Builder Closure

````
# in laravel4

Schema::create('tmp_token', new \Chatbox\TmpData\SchemaBuilder());

Schema::create('tmp_confirm_mail', new \Chatbox\TmpData\SchemaBuilder([
    "useAccessedAt" => false,
    "defaultExpiredAt" => "200000",
]));

````


<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Query\Builder;

return [
    "schema" => [
        "cb_room" => function(Blueprint $table){
                $table->unsignedInteger("id",true);
                $table->string("srug");
                $table->unsignedInteger("tenants");
                $table->text("prop");
                $table->dateTime("created_at");
                $table->dateTime("updated_at");
            },
        "cb_room_tag" => function(Blueprint $table){
                $table->unsignedInteger("id",true);
                $table->unsignedInteger("room_id");
                $table->string("type");
                $table->string("value");
                $table->dateTime("created_at");
                $table->dateTime("updated_at");
            },
        "cb_user" => function(Blueprint $table){
                $table->unsignedInteger("id",true);
                $table->string("name");
                $table->string("enter_key");
                $table->text("prop");
                $table->dateTime("created_at");
                $table->dateTime("updated_at");
            },
        "cb_user_tag" => function(Blueprint $table){
                $table->unsignedInteger("id",true);
                $table->unsignedInteger("user_id");
                $table->string("type");
                $table->string("value");
                $table->dateTime("created_at");
                $table->dateTime("updated_at");
            },
        "cb_tenants" => function(Blueprint $table){
                $table->unsignedInteger("id",true);
                $table->unsignedInteger("room_id");
                $table->unsignedInteger("user_id");
                $table->boolean("is_kicked");
                $table->dateTime("created_at");
                $table->dateTime("updated_at");
            },
        "cb_message" => function(Blueprint $table){
                $table->unsignedInteger("id",true);
                $table->unsignedInteger("room_id");
                $table->unsignedInteger("user_id");
                $table->string("type");
                $table->text("message");
                $table->dateTime("created_at");
                $table->dateTime("updated_at");
            },
    ],
    "seeds" => [
        ["master_user",function(Builder $builder){
            $builder->insert([
                "name"=>"Tom",
                "sex" => "1"
            ]);
        }],
    ],
    "include" => [
        "user" => __DIR__."/data/user.php"
    ]
];

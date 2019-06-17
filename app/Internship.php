<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model{
    //定义常量
    protected $table = 'internship';

    //允许批量赋值
    protected $fillable = ['name','company','detail','boss','contact'];
    public $timestamps = true;

    public function getDateFormat(){
        return time();
    }

    public function asDateTime($val){
        return $val;
    }

}
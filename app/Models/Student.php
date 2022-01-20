<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{

    const SEX_UN = 10;
    const SEX_BOY = 20;
    const SEX_GIRL = 30;


    protected $table = 'students';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'age', 'sex'];

    protected $guarded = [];

    // public $timestamps = true;

    // public function getDateFormat()
    // {
    //     return time();
    // }

    // public function asDateTime($value)
    // {
    //     return $value;
    // }


    public function sex($ind = null)
    {
        $arr = [
            self::SEX_UN => 'unknown',
            self::SEX_BOY => 'boy',
            self::SEX_GIRL => 'girl',
        ];

        if ($ind !== null) {
            return array_key_exists($ind, $arr) ? $arr[$ind] : $arr[self::SEX_UN];
        }

        return $arr;
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    // public static $rules = array(
    //     'image' => 'required',
    // );

    // public static function getImage()
    // {
    //     return $this->image;
    // }
}

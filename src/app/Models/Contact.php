<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];

    public function contact()
    {
      return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function getGenderAttribute($value)
    {
        return $value === 1 ? '男性' : '女性' ;
    }
}

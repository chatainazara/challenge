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

    public function category()
    {
      return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function getGenderAttribute($value)
    {
        if($value == 1){
            return $value='男性';
        }elseif($value == 2){
            return $value='女性';
        }else{
            return $value='その他';
        }
    }

    // 検索に必要
    public function scopeEmailOrNameSearch($query, $search)
 {
  if (!empty($search)) {
    $query->where('email', 'like', '%' . $search . '%')
    ->orWhere('first_name', 'like', '%' . $search . '%')->orWhere('last_name','like','%'.$search.'%');
  }
 }

public function scopeGenderSearch($query, $gender)
 {
  if (!empty($gender)) {
    $query->where('gender', $gender);
  }
 }

  public function scopeCategorySearch($query, $category_id)
  {
    if (!empty($category_id)) {
      $query->where('category_id', $category_id);
    }
  }
  
  public function scopeDateSearch($query, $date)
  {
    if (!empty($date)) {
      $query->whereDate('created_at', $date);
    }
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'type',
        'description',
        'start_date',
        'tags',
        'advertiser',
        'category'
    ];

    protected $cast=[
        'tags'=>'array'
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category');
    }
    public function advertiser()
    {
        return $this->belongsTo(User::class,'advertiser');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'categorie_id',
        'name',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'categorie_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    // public function categories()
    // {
    //     return $this->hasMany(TypeUser::class,'categorie_id');
    // }
    public function users()
    {
        return $this->belongsToMany(User::class, 'type_users', 'categorie_id', 'user_id');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Category extends Model
{
    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class,'createdBy','id');
    }
    
}

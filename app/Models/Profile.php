<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    public function tags()
    {
        return $this->belongstoMany('App\Models\Tag');
    }
    
    public function campus()
    {
        return $this->belongstoMany('App\Models\Campus');
    }
}

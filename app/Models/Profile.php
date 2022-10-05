<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    public function tags()
    {
        return $this->belongstoMany(Tag::class);
    }
    
    public function campus()
    {
        return $this->belongstoMany(Campus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)
    }
}

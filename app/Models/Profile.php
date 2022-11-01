<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $casts = [ 
        'tags' => 'array'
    ];

    protected $dates = ['date'];

    protected $guarded = [];
    
    public function campus()
    {
        return $this->belongstoMany(Campus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

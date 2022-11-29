<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    protected $casts = [ 
        'tags' => 'array'
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class)->withPivot('situacao', 'type');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function tags()
    {
        return $this->belongstoMany('App\Models\Tag');
    }
    
    public function campus()
    {
        return $this->belongstoMany('App\Models\Campus');
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }
}

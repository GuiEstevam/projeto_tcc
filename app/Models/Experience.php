<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $dates = ['firstDate', 'lastDate'];

public function user()
{
    return $this->belongsTo('App\Models\User');
}    
}
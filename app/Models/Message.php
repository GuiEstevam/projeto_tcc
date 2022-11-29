<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $timestamps = true;

    public function projetos()
    {
        return $this->belongsTo(Projeto::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

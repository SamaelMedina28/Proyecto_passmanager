<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory;
    protected $table = 'passwords';

    protected $fillable = [
        'place',
        'username',
        'password',
        'url',
        'category',
        'user_id',
    ];
}

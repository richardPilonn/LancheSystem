<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'password',
        'user_id'
    ];




}

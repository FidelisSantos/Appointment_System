<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'cpf',
        'phones',
        'address',
        'created_at',
        'birth_date',
        'updated_at',
        'user_id',
        'name',
        'password',
        'email'
    ];
}

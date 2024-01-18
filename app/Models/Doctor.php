<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
            'name',
            'crm',
            'email',
            'specialty_id',
            'password',
        ];

    public function specialty()
    {
        $this->hasOne(Specialty::class, ['id' => 'specialty_id']);
    }
}

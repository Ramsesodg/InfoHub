<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Ajoutez cette ligne pour importer la classe Authenticatable
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'prenom',
        'phone',
        'username',
        'type',
        'status',
    ];

    protected $guarded =[];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

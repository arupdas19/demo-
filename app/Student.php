<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Student extends Model
{

    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'address',
        'ph',
        'email',  
    ];
    //
}

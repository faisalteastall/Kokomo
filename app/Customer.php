<?php

 namespace App;

 use Illuminate\Notifications\Notifiable;
 use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'customer';

    protected $fillable = [
        'firstname', 'email', 'password','lastname','mobile','customer_id'
    ];

    protected $hidden = [
        'password',
    ];
}
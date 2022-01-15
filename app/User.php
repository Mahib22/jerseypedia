<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // One to Many dengan Order
    // Setiap user punya banyak order
    public function orders() {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    // One to Many dengan Wislist
    // Setiap user punya banyak Wislist
    public function wishlists() {
        return $this->hasMany(Wishlist::class, 'user_id', 'id');
    }
}

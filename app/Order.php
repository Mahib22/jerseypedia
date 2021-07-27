<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // One to Many dengan Order Detail
    // Setiap order punya banyak order detail
    public function order_details() {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    // One to Many dengan User
    // Setiap order punya sebuah user
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

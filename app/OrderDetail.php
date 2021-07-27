<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // One to Many dengan Order
    // Setiap order detail punya sebuah order
    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    // One to Many dengan User
    // Setiap order detail punya sebuah product
    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}

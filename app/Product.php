<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // One to Many dengan Liga
    // Setiap product punya sebuah liga
    public function league() {
        return $this->belongsTo(League::class, 'league_id', 'id');
    }

    // One to Many dengan Category
    // Setiap product punya sebuah kategori
    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // One to Many dengan Order Detail
    // Setiap product punya banyak order detail
    public function order_details() {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }

    // One to Many dengan Wishlist
    // Setiap product punya banyak Wishlist
    public function wishlists() {
        return $this->hasMany(Wishlist::class, 'product_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // One to Many dengan product
    // Setiap category punya banyak product
    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}

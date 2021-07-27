<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    // One to Many dengan Product
    // Setiap liga punya banyak product
    public function products() {
        return $this->hasMany(Product::class, 'league_id', 'id');
    }
}

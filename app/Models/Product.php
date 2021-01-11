<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'stock', 'description', 'image', 'is_active', 'discount', 'sold'
    ];

    public function outOfStock() {
        return $this->stock == 0;
    }

    public function hasLowStock() {

        if($this->outOfStock()) {
            return false;
        }
        return (bool) ($this->stock <= 10);
    }

    public function hasStock($stock) {
        return $this->stock >= $stock;
    }

    public function inStock() {
        return $this->stock >= 1;
    }

    public function calculatePrice() {
        return $this->price - ($this->price * $this->discount / 100);
    }

}

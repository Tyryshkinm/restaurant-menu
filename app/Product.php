<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}

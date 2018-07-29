<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Product extends Model
{
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'menu_id', 'position',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}

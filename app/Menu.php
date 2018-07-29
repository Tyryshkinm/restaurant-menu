<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Menu extends Model
{
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'enabledFrom', 'enabledUntil',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

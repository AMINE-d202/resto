<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'some_field', // Add other fillable fields as needed
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingGroup extends Model
{
    public function items()
    {
        return $this->hasMany('App\ShoppingItem');
    }
}

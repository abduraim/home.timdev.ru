<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingItem extends Model
{
    public function group()
    {
        return $this->belongsTo('App\ShoppingGroup', 'shopping_group_id');
    }
}

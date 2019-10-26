<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{

    public function item()
    {
        return $this->belongsTo('App\ShoppingItem', 'shopping_item_id');
    }

    public function added_user()
    {
        return $this->belongsTo('App\User', 'added_user_id');
    }

}

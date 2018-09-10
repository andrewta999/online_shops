<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'items';
    protected $guarded = [];
    protected $primaryKey = 'item_id';
}

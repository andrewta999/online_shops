<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'vp_product';
    protected $guarded = [];
    protected $primaryKey = 'pro_id';
}

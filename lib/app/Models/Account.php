<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Account extends Model
{	
    protected $table = 'account';
    protected $guarded = [];
    protected $primaryKey = 'acc_id';
}

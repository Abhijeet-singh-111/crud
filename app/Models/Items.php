<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'sub_cate_id',
        'item_name',
        'item_code',
        'item_image',
        'status',
        'created_at',
        'updated_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
    protected $table = 'subcategories';

    protected $fillable = [
        'categorie_id',
        'name',
        'status',
        'created_at',
        'updated_at'
    ];
}

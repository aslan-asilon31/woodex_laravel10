<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageMaster extends Model
{
    use HasFactory;

    protected $table = 'image_masters';
    protected $primaryKey = 'image_master_id';

    protected $fillable = [
        'image_master_id',
        'product_id',
        'status_id',
        'category_id',
        'name',
        'image',
        'description',
        'lang',
        'lang_id',
    ];
}

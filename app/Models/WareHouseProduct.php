<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WareHouseProduct extends Model
{
    use HasFactory;
    protected $fillable=[
        'office_id',
        'product_code',
        'product_name',
        'image_path',
        'product_type',
        'product_maker',
        'quantity',
        'price',
        'date',
        'product_detail'
    ];
    protected $table = 'warehouse_products'; // Correct table name

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}

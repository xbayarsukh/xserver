<?php

namespace App\Models;

use App\Models\Corp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Calculation extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'tsag',
        'value',
        'number',
        'created_at',
        'updated_at',
        'corps_id'
    ];

    public function corp()
    {
        return $this->belongsTo(Corp::class, 'corps_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniformOrderRequest extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function request()
    {
        return $this->morphOne(Request::class, 'applicationable');
    }
}

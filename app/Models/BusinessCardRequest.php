<?php

namespace App\Models;

use App\Models\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessCardRequest extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'office',
        'departure',
        'name',
        'request_date1',
        'use_where',
        'number',
        'created_at',
        'updated_at'
    ];
    public function request()
    {
        return $this->morphOne(Request::class, 'applicationable');
    }

}

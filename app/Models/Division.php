<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'name',
        'office_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }
    public function corp()
    {
        return $this->belongsTo(Corp::class);
    }

}

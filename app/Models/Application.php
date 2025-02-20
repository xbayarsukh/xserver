<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use SoftDeletes;
    use HasFactory;
    // protected $guarded=[];
    protected $fillable=[
        'user_id',
        'boss_id',
        'applicationable_type',
        'applicationable_id',
        'status',
        'is_checked',
        'checked_by',
        'checked_at',
        'division_id',
        'if_first_approval'
    ];
    protected $casts = [
        'is_checked' => 'boolean',
        'checked_at' => 'datetime',
        'is_first_approval' => 'boolean', // Add this line

    ];

    public function applicationable()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function boss()
{
    return $this->belongsTo(User::class, 'boss_id');
}
public function division()
{
    return $this->belongsTo(Division::class);
}




}

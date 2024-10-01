<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actionSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'office_id'];
    protected $table ='action_schedule';



    public function office()
    {
        return $this->belongsTo(Office::class);
    }


}

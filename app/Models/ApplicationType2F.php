<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationType2F extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $table = 'application_type_2_f'; // Correct table name
    public function application()
    {
        return $this->morphOne(Application::class, 'applicationable');
    }
}

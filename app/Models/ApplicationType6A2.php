<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationType6A2 extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table = 'application_type_6_a_2'; // Correct table name
    public function application()
    {
        return $this->morphOne(Application::class, 'applicationable');
    }
}

<?php

namespace App\Models;

use App\Models\WareHouseProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Office extends Model
{
    use HasFactory;


    protected $fillable = ['corp_id', 'office_name', 'image_path'];
    public function corp()
    {
        return $this->belongsTo(Corp::class);
    }

public function users()
{
    return $this->hasMany(User::class);
}

public function vacationCalendars()
    {
        return $this->hasMany(VacationCalendar::class);
    }

    public function divisions()
    {
        return $this->hasMany(Division::class, 'office_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function actionSchedules()
    {
        return $this->hasMany(Room::class);
    }


    public function warehouseProducts()
    {
        return $this->hasMany(WareHouseProduct::class);
    }
}

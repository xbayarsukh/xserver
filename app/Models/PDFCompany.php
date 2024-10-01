<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDFCompany extends Model
{
    use HasFactory;

    protected $table = '_p_d_f_companies';
    protected $fillable=['name'];



    public function pdfs()
    {
        return $this->hasMany(PDF::class, 'pdf_company_id');

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDF extends Model
{
    use HasFactory;

    protected $table = 'pdfs';
    protected $fillable=[
        'filename',
        'path',
        'type',
        'pdf_company_id'
    ];

    public function pdfCompany()
    {
        return $this->belongsTo(PDFCompany::class, 'pdf_company_id');
    }
}

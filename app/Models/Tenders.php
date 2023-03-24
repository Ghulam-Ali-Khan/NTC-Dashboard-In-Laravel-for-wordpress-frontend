<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenders extends Model
{
    use HasFactory;
    protected $fillable =[
      
        'name',
        'type',
        'tender_no',
        
        'tender_desp',
        'tender_pdf',
        'tender_deadline',
        'tender_extension_corrigendum',
        'language',
        
        
        
    ];
}

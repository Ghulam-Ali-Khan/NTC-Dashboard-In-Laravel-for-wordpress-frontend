<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policies extends Model
{
    use HasFactory;
    protected $fillable =[
      
        'title',
        
        'policy_no',
        
        'policy_desp',
        'policy_pdf',
        'language',
        
        
        
        
    ];
}

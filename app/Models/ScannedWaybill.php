<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScannedWaybill extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'waybill_number',
        'receiver_name',
        'receiver_address',
        'image_path',
        'raw_ocr_data',
    ];
    
    protected $casts = [
        'raw_ocr_data' => 'array',
    ];
}

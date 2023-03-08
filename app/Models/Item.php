<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
       'item_no',
       'description',
       'unit',
       'model_no',
       'serial_no',
       'brand',
       'acquisition_date',
       'acquisition_cost',
       'market_appraisal',
       'appraisal_date',
       'remarks',
       'class_id',
       'nature_occupancy',
    ];
}
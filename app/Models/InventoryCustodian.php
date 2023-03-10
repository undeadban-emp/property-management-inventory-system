<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryCustodian extends Model
{
    protected $connection = 'PROPERTY_MANAGEMENT_INVENTORY_CONNECTION';
    use HasFactory;
    protected $fillable = [
        'office_code',
        'fund_id',
        'ics_no',
        'received_from',
        'received_from_pos',
        'received_by',
        'received_by_pos',
        'received_from_date',
        'received_by_date',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryCustodianItem extends Model
{
    protected $connection = 'PROPERTY_MANAGEMENT_INVENTORY_CONNECTION';
    use HasFactory;
    protected $fillable = [
        'ic_id',
        'item_id',
        'quantity',
        'unit',
        'unit_cost',
        'unit_total_cost',
        'est_useful_life',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    protected $connection = 'PROPERTY_MANAGEMENT_INVENTORY_CONNECTION';
    use HasFactory;
    protected $fillable = [
        'description',
        'classgroup_id',
    ];

    public function classGroup()
    {
        return $this->hasOne(ClassGroup::class, 'id', 'classgroup_id');
    }
}
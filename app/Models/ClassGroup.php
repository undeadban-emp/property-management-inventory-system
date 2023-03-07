<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
    ];
    public function classification()
    {
        return $this->hasOne(Classification::class, 'classgroup_id', 'id');
    }
}

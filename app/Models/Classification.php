<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
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

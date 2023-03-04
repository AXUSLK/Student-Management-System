<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lov extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'remarks',
        'parent_id',
        'lov_category_id'
    ];

    public function lovCategory()
    {
        return $this->hasOne(lovCategory::class, 'id', 'lov_category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'sku',
        'asin',
    ];

    public function parentSku()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id')->withDefault(['sku' => null]);
    }
}

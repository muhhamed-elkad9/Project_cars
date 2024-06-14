<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function processes()
    {
        return $this->hasMany(Process::class);
    }


    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class);
    }

    public function opportunities()
    {
        return $this->belongsToMany(Opportunity::class);
    }
}

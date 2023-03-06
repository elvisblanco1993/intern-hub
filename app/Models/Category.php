<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function opportunities()
    {
        return $this->belongsToMany(Opportunity::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class);
    }
}

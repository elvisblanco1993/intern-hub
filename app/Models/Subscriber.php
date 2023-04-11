<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    // User can only fill the email field in the forms.
    // This helps prevent DB injection in the server side.
    protected $fillable = [
        'email',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

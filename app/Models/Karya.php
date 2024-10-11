<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;

    protected $table ="karya";
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'category',
        'is_published',
    ];

    //relasi dengan user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

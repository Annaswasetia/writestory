<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cerpen extends Model
{
    use HasFactory;

    protected $table ="cerpen";
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'category',
        'is_published',
        'karya_id',
    ];


    // Hubungan dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Hubungan dengan model Karya
    public function karya()
    {
        return $this->belongsTo(Karya::class);
    }
}

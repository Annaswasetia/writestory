<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puisi extends Model
{
    use HasFactory;

    protected $table = "puisi";
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

    // Di dalam model Puisi
    public function karya()
    {
        return $this->belongsTo(Karya::class, 'karya_id', 'id'); 
    }
}

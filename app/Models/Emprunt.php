<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    use HasFactory;
    protected $fillable = ['date_emprunt', 'livre_id', 'user_id'];
    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

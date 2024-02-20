<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
    public function emprunts()
    {
    return $this->hasMany(Emprunt::class);
    }
}

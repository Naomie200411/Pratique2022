<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Oeuvre extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'annee'
    ];
    public function artiste(): BelongsTo
    {
        return $this->belongsTo(Artiste::class,'artiste_id');
    }

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class,'categorie_id');
    }
}

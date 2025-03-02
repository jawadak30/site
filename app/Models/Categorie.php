<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
    /** @use HasFactory<\Database\Factories\CategorieFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $table  = "categories";
    protected $fillable = [
        'name',
        'description',
    ];
    public function livres()
    {
        return $this->hasMany(Livre::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'nom',
        'email',
        'telephone',
        'adresse',
        'organisation'
    ];

    public function application()
    {
        return $this->hasMany(Application::class);
    }
}

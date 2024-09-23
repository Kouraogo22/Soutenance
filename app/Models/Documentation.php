<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'contenu',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}

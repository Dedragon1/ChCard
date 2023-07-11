<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Сategory extends Model
{   

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'image',
    ];

    public function test(): HasMany
    {
        return $this->hasMany(Test::class, 'category_id');
    }

    use HasFactory;
}

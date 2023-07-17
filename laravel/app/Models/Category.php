<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{   
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'image',
        'deleted_at',
    ];

    public function test(): HasMany
    {
        return $this->hasMany(Test::class, 'category_id');
    }

    use HasFactory;
}

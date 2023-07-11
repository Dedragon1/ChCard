<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TableObject extends Model
{

    protected $table = 'table_object';

    protected $fillable = [
        'test_id',
        'name',
        'description',
        'image',
    ];

    public function result(): HasMany
    {
        return $this->hasMany(Result::class);
    }

    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }

    use HasFactory;
}

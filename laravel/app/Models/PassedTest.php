<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\SoftDeletes;

class PassedTest extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $table = 'passed_test';

    protected $fillable = [
        'test_id',
        'user_id',
        'date',
        'comment',
        'score',
        'status',
        'deleted_at',
    ];

    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function result(): HasMany
    {
        return $this->hasMany(Result::class,);
    }

    use HasFactory;
}

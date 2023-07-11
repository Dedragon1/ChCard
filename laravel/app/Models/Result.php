<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    
    protected $table = 'result';

    protected $fillable = [
        'passed_test_id',
        'table_object_id',
        'count',
    ];

    public function table_object(): BelongsTo
    {
        return $this->belongsTo(TableObject::class);
    }
    public function passed_test(): BelongsTo
    {
        return $this->belongsTo(PassedTest::class);
    }

    use HasFactory;
}

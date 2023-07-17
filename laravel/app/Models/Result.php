<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $table = 'result';

    protected $fillable = [
        'passed_test_id',
        'table_object_id',
        'count',
        'deleted_at',
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

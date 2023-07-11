<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Test extends Model
{

    protected $table = 'test';

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'user_id',
        'number_passes',
        'activity',
    ];

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }
    public function passed_test(): HasMany
    {
        return $this->hasMany(PassedTest::class);
    }
    public function table_object(): HasMany
    {
        return $this->hasMany(TableObject::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Сategory::class, 'category_id');
    }



    use HasFactory;
}

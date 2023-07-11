<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    protected $table = 'notification';

    protected $fillable = [
        'test_id',
        'user_sender_id',
        'user_recipient_id',
        'message',
    ];

    public function users_sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_sender_id');
    }
    public function users_recipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_recipient_id');
    }
    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }
    
    use HasFactory;
}

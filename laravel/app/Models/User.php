<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
// use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Http\Response;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'deleted_at',
    ];

    public function notifications_sender(): HasMany
    {
        return $this->hasMany(Notification::class, 'user_sender_id');
    }
    public function notifications_recipient(): HasMany
    {
        return $this->hasMany(Notification::class, 'user_recipient_id');
    }
    public function test(): HasMany
    {
        return $this->hasMany(Test::class);
    }
    public function passed_test(): HasMany
    {
        return $this->hasMany(PassedTest::class);
    }

    public function test_models_can_be_instantiated()
    {
        $user = User::factory()->make();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}




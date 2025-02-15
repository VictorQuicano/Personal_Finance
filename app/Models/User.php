<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\MustVerifyEmail;

class User extends Model 
{
    use HasFactory, HasRoles, MustVerifyEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'email_verified_at',
        'profile_picture',
        'plan_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'plan_nullable_id' => 'integer',
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }
    public function accountTypes(): HasMany
    {
        return $this->hasMany(AccountType::class);
    }
    public function Transaction(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
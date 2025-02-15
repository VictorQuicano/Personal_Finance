<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_picture',
        'first_name',
        'last_name',
        'plan_nullable_id',
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

    public function planNullable(): BelongsTo
    {
        return $this->belongsTo(PlanNullable::class);
    }

    public function accountTransactionCategoriesAccountTypes(): HasMany
    {
        return $this->hasMany(AccountTransactionCategoriesAccountType::class);
    }
}

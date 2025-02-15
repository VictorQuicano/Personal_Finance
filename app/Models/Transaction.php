<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount',
        'is_payment',
        'account_nullable_user_categories_nullable_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_payment' => 'boolean',
        'account_nullable_user_categories_nullable_id' => 'integer',
    ];

    public function accountNullableUserCategoriesNullable(): BelongsTo
    {
        return $this->belongsTo(AccountNullableUserCategoriesNullable::class);
    }
}

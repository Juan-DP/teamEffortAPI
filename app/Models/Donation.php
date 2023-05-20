<?php

namespace App\Models;

use UniqueIdentifier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UniqueIdentifier;

    /** @var String $uid unique identifier */
    protected $uid = 'udid';

    protected $fillable = [
        'udid',
        'user_id',
        'challenge_id',
        'team_id',
        'amount',
        'deleted_at'
    ];

    /**
     * Get the user that owns the Donation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}

<?php

namespace App\Models;

use UniqueIdentifier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UniqueIdentifier;
    
    /** @var String $uid unique identifier */
    protected $uid = 'utid';

    protected $fillable = [
        'utid',
        'name',
        'deleted_at'
    ];

    /**
     * Get all of the donations for the Charity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    /**
     * Get all of the comments for the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teamChallenges(): BelongsToMany
    {
        return $this->BelongsToMany(TeamChallenge::class);
    }
}

<?php

namespace App\Models;

use UniqueIdentifier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Challenge extends Model
{
    use HasFactory;
    use UniqueIdentifier;

    /** @var String $uid unique identifier */
    protected $uid = 'uchid';

    protected $fillable = [
        'uchid',
        'charity_id',
        'deleted_at'
    ];

    /**
     * Get the charity that owns the Challenge
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function charity(): BelongsTo
    {
        return $this->belongsTo(Charity::class);
    }

    /**
     * The roles that belong to the Challenge
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Teams::class);
    }
}

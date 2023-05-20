<?php

namespace App\Models;

use UniqueIdentifier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Charity extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UniqueIdentifier;
    
    /** @var String $uid unique identifier */
    protected $uid = 'ucid';

    protected $fillable = [
        'ucid',
        'name',
        'description',
        'mission_statement',
        'address',
        'email',
        'website',
        'deleted_at'
    ];

    /**
     * Get all of the challenges for the Charity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function challenges(): HasMany
    {
        return $this->hasMany(Challenge::class);
    }
}

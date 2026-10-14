<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class League extends Model
{

    protected $fillable = ['name'];

    /**
     * Gets the user that owns the league
     * @return BelongsTo
     */
    public function owner() : BelongsTo
    {
       return $this->belongsTo(User::class, 'user_id');
    }

        public function getRouteKeyName() : string
    {
        return 'slug';
    }
}
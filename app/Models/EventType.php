<?php

namespace App\Models;

use App\Enums\EventTypes;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected function casts()
    {
        return [
            'type' => EventTypes::class,
        ];
    }

    public function abilities()
    {
        return $this->hasMany(Ability::class);
    }
}

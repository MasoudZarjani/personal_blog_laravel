<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Relation extends Model
{
    use SoftDeletes;

    public function scopeOfType($query, $from_type, $to_type = null)
    {
        if ($to_type != null)
            return $query->where(['from_type' => config('constants.relation.type.' . $from_type), 'to_type' => config('constants.relation.type.' . $to_type)]);

        return $query->where(['from_type' => config('constants.relation.type.' . $from_type)]);
    }
}

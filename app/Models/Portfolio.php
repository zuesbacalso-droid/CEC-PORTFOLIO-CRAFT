<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['id', 'user_id', 'full_name', 'email', 'data'])]
class Portfolio extends Model
{
    use SoftDeletes;
    public $incrementing = false;

    protected $keyType = 'string';

    protected function casts(): array
    {
        return [
            'data' => 'array',
        ];
    }
}
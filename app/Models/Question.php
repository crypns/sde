<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    /**
     * Связь с моделью Comment
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
}

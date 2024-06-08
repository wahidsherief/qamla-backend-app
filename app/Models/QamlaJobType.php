<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QamlaJobType extends Model
{
    use HasFactory;

    protected $table = 'qamla_job_types';

    protected $fillable = ['title'];
}

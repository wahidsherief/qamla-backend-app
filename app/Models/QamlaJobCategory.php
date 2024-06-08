<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QamlaJobCategory extends Model
{
    use HasFactory;

    protected $table = 'qamla_job_categories';

    protected $fillable = ['title'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QamlaJobTitle extends Model
{
    use HasFactory;

    protected $table = 'qamla_job_titles';

    protected $fillable = ['title'];

    public $timestamps = false;
}

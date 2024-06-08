<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QamlaJob;

class QamlaJob extends Model
{
    use HasFactory;

    protected $table = 'qamla_jobs';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }

    public function type()
    {
        return $this->belongsTo(QamlaJobType::class, 'qamla_job_type_id')->select('id', 'title');
    }

    public function category()
    {
        return $this->belongsTo(QamlaJobCategory::class, 'qamla_job_category_id')->select('id', 'title');
    }

    public function title()
    {
        return $this->belongsTo(QamlaJobTitle::class, 'qamla_job_title_id')->select('id', 'title');
    }
}

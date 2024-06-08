<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\QamlaJobService;
use App\Services\BaseService;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    private $qamlaJobService;

    public function __construct(QamlaJobService $qamlaJobService)
    {
        $this->qamlaJobService = $qamlaJobService;
    }

    public function getJobs()
    {
        $jobs = $this->qamlaJobService->getJobs();

        if (!$jobs) {
            return errorResponse('Job fetch failed !');
        }

        return successResponse('Job fetched successfully !', $jobs);
    }
}

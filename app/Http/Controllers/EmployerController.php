<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\QamlaJobService;
use Illuminate\Http\Request;

class EmployerController extends Controller
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

    public function getJobTitles()
    {
        $titles = $this->qamlaJobService->getTitles();

        if (!$titles) {
            return errorResponse('Job titles fetch failed !');
        }

        return successResponse('Job titles fetched successfully !', $titles);
    }

    public function searchJob(Request $request)
    {
        $results = $this->qamlaJobService->searchJob($request->key);

        if (!$results) {
            return errorResponse('Job search failed !');
        }

        return successResponse('Job results found !', $results);
    }

    public function saveJob(Request $request)
    {
        $savedJob = $this->qamlaJobService->saveJob($request);

        if (!$savedJob) {
            return errorResponse('Job save failed !');
        }

        return successResponse('Job saved successfully !', $savedJob);
    }

    public function updateJob(Request $request, $id)
    {
        $updatedJob = $this->qamlaJobService->updateJob($request, $id);

        if (!$updatedJob) {
            return errorResponse('Job fetch failed !');
        }

        return successResponse('Job updated successfully !', $updatedJob);
    }

    public function deleteJob($id)
    {
        $deletedJob = $this->qamlaJobService->deleteJob($id);

        if (!$deletedJob) {
            return errorResponse('Job delete failed !');
        }

        return successResponse('Job delete successfully !');
    }
}

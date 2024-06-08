<?php

namespace App\Services;

use App\Models\QamlaJob;
use App\Models\QamlaJobTitle;

class QamlaJobService extends BaseService
{
    public function getJobs()
    {
        return $this->getWithRelations(new QamlaJob(), ['title']);
    }

    public function getTitles()
    {
        return $this->all(new QamlaJobTitle());
    }

    public function searchJob($request)
    {
        $query = QamlaJob::query();

        // Filter by job title
        if ($request->has('title')) {
            $query->whereHas('title', function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->title . '%');
            });
        }

        // Filter by job types
        if ($request->has('type_id')) {
            // return $request->type_id;
            $query->where('qamla_job_type_id', $request->type_id);
        }

        // Filter by category
        if ($request->has('category_id')) {
            $query->where('qamla_job_category_id', $request->category_id);
        }

        // Filter by salary range
        if ($request->has('minsalary')) {
            $query->where('min_salary', '>=', $request->minsalary);
        }
        if ($request->has('maxsalary')) {
            $query->where('max_salary', '<=', $request->maxsalary);
        }

        // Filter by date posted (days ago)
        if ($request->has('dayago')) {
            $date = Carbon::now()->subDays($request->dayago);
            $query->where('created_at', '>=', $date);
        }

        return $query->with(['title', 'category', 'type'])->get();
    }

    public function saveJob($request)
    {
        return $this->save(new QamlaJob(), $request);
    }

    public function updateJob($request, $id)
    {
        return $this->update(new QamlaJob(), $request, $id);
    }

    public function deleteJob($id)
    {
        return $this->delete(new QamlaJob(), $id);
    }
}

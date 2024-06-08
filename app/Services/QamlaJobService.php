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

    public function searchJob($key)
    {
        return QamlaJob::whereHas('title', fn ($query) => $query
                ->where('title', 'like', "%$key%"))
                ->with('title')
                ->get();
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

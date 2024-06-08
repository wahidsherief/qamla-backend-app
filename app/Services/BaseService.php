<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\ValidationException;

use Illuminate\Database\Eloquent\Model;

class BaseService
{
    // public function uploadImage($image)
    // {
    //     $path = config('global.' . $this->modelName . '_image_path');

    //     $image_name = 'B' . time() . '.' . $image->getClientOriginalExtension();

    //     $image->move($path, $image_name);

    //     return $image_name;
    // }

    // public function deleteImage($item)
    // {
    //     $filePath = config('global.' . $this->modelName . '_image_path') . $item;

    //     if (file_exists($filePath)) {
    //         unlink($filePath);
    //     }
    // }


    private function processData($model, $request)
    {
        $data = $request->all();

        // for upload image on save item
        if ($request->hasFile('image') && !$request->has('shouldUpload')) {
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        // for upload image on update item
        if ($request->hasFile('image') && $request->shouldUpload == true) {
            $modelInstance = $model::find($request->id);
            $this->deleteImage($modelInstance->image);
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        // if (isset($request->password)) {
        //     $data['password'] = bcrypt($request->password);
        // }

        return $data;
    }

    public function all(Model $model)
    {
        return $model::all();
    }

    public function getWithRelations(Model $model, array $relations = [])
    {
        return $model::with($relations)->get();
    }

    public function save(Model $model, $request)
    {
        $data = $this->processData($model, $request);

        return $model::create($data);
    }



    public function update(Model $model, $request, $id)
    {
        $data = $this->processData($model, $request);

        return tap($model::find($id))->update($data);

    }

    public function delete($model, $id)
    {
        return $model::find($id)->delete();

        // if ($modelData && isset($modelData->image)) {
        //     $this->deleteImage($modelData->image);
        // }

        // return $modelData && $modelData->delete();
    }
}

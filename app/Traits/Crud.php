<?php

namespace App\Traits;

trait Crud
{
    public function store($request)
    {
        $model = new $this->modelClass;
        $model = $this->modelClass::create($request->only($model->fillable));
        $model = $this->attachTranslates($model, $request);
        $this->attachFiles($model, $request);
        return $model;
    }

    public function attachTranslates($model, $request)
    {
        if (isset($model->translatable)) {
            if (is_array($model->translatable)) {
                $model->setTranslationsArray($request->only($model->translatable) ?? []);
            }
        }
        return $model;
    }

    public function attachFiles($model, $request): void
    {
        if ($model->fileFields) {
            foreach ($model->fileFields as $item) {
//                dd($request->file($item));
                if ($request->file($item))
                    $model->$item = uploadFile($request->file($item), $model->getTable(), $model->$item);
            }
            $model->save();
        }
    }

    public function update($id, $request)
    {
        $model = $this->modelClass::find($id);
        $model->update($request->only($model->fillable));
        $model = $this->attachTranslates($model, $request);
        $this->attachFiles($model, $request);
        return $model;
    }
}

<?php

namespace App\Traits;

use Throwable;

// request()->route()->getName() . ".index"
trait CommonControllerMethods
{
    public function index()
    {
        return view("dashboard.pages." . request()->route()->getName());
    }

    public function show($id)
    {
        $model = $this->modelClass::findOrFail($id);
        return view("dashboard.pages." . request()->route()->getName(), compact('model'));
    }

    public function create()
    {
        $model = new $this->modelClass;
        return view("dashboard.pages." . request()->route()->getName(), compact('model'));
    }

    public function edit($id)
    {
        $model = $this->modelClass::findOrFail($id);
        return view("dashboard.pages." . request()->route()->getName(), compact('model'));
    }

    public function delete($id)
    {
        try {
            $this->modelClass::findOrFail($id)->delete();
        } catch (Throwable $e) {
            return back()->with('not-allowed', "Эта информация не может быть удалена: $id. Потому что к нему прикреплены данные.");
        }
        return back()->with('success', "Успешно удалено: $id!");
    }
}

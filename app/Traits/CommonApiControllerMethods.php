<?php

namespace App\Traits;

trait CommonApiControllerMethods
{
    public function show($id)
    {
        return $this->success($this->modelClass::find($id));
    }

    public function delete($id)
    {
        return $this->success($this->modelClass::destroy($id));
    }
}

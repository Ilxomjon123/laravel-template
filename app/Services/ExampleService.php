<?php

namespace App\Services;

use App\Models\Example;
use App\Services\Contracts\ExampleServiceInterface;
use App\Traits\Crud;

class ExampleService implements ExampleServiceInterface
{
    use Crud;

    public $modelClass = Example::class;

    public function filter()
    {
        return $this->modelClass::whereLike('name')
            ->whereEqual('key')
            ->whereBetween2('created_at')
            ->whereBetween2('updated_at')
            ->sort()
            ->customPaginate();
    }

    public function customStore($request)
    {
        return $this->store($request);
    }

    public function customUpdate($id, $request)
    {
        return $this->update($id, $request);
    }
}

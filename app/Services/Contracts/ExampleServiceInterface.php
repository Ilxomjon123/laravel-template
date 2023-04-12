<?php

namespace App\Services\Contracts;

interface ExampleServiceInterface
{
    public function filter();

    public function customStore($request);

    public function customUpdate($id, $request);
}

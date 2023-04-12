<?php

namespace App\Traits;

trait CommonUserMethods
{
    public function defaultPassword($id): void
    {
        $user = $this->modelClass::findOrFail($id);
        $user->password = bcrypt($user->phone_number);
        $user->save();
    }
}

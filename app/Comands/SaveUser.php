<?php

namespace App\Comands;

use App\Models\User;
use ArtisanSdk\CQRS\Command;

class SaveUser extends Command
{
    protected $model;

    public function __construct(User  $model)
    {
        $this->model = $model;
    }

    public function run()
    {
        $user = $this->model;
        $user->email = $this-> argument ('email');
        $user->save();

        return  $user;
    }
}

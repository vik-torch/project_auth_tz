<?php

namespace App\Commands;

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
        $user->name = $this-> argument ('name');
        $user->password = $this-> argument ('password');
        $user->save();

        return  $user;
    }
}

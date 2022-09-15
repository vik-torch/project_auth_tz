<?php

namespace App\Queries;

use App\Models\User;
use ArtisanSdk\CQRS\Query;

class VerificationUser extends Query
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function builder()
    {
        return $this->model->query()
            ->where('email', $this->argument('email', ['email']))
            ->where('password', $this->argument('password'));
    }

    /**
     * @inheritDoc
     */
    public function run()
    {
        return $this->builder()->first();
    }

    public function firstOrFail()
    {
        return $this->builder()->firstOrFail();
    }

    public static function find(string $email)
    {
        return static::make()->email($email)->run();
    }

    public static function findOrFail(string $email)
    {
        return static::make()->email($email)->firstOrFail();
    }

}

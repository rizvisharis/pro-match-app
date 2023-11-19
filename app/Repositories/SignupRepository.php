<?php

namespace App\Repositories;

use App\Models\SignupUser;
use App\Repositories\Contracts\SignupRepositoryInterface;

class SignupRepository extends BasicRepository implements SignupRepositoryInterface
{
    public function __construct(SignupUser $model)
    {
        $this->model = $model;
    }
}
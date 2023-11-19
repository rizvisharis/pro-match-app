<?php

namespace App\Services;

use App\Repositories\Contracts\SignupRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Utils\Constants;
use Exception;

class UserService
{
    private $signupRepository;
    private $userRepository;

    public function __construct(
        SignupRepositoryInterface $signupRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->signupRepository = $signupRepository;
        $this->userRepository = $userRepository;
    }

    public function userActivate($id)
    {
        $signupUser = $this->signupRepository->find($id);

        if (!$signupUser) {
            throw new Exception(Constants::$ERROR_MESSAGE['id_not_exist'], Constants::$ERROR_CODE['not_found']);
        }

        return $this->userRepository->create($signupUser->toArray());
    }
}

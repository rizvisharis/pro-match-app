<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Repositories\Contracts\SignupRepositoryInterface;
use App\Utils\Constants;
use Exception;

class AuthenticateService
{
    private $signupRepository;

    public function __construct(SignupRepositoryInterface $signupRepository)
    {
        $this->signupRepository = $signupRepository;
    }
    public function login(array $requestData): array
    {
        try {
            if (!auth()->attempt($requestData)) throw new Exception(
                Constants::$ERROR_MESSAGE['no_email_password'],
                Constants::$ERROR_CODE['not_found']
            );

            return [
                'token' => auth()->user()->createToken(auth()->user()->email)->plainTextToken,
                'user' => new UserResource(auth()->user())
            ];
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function signup(array $requestData)
    {
        try {
            $requestData['password'] = bcrypt($requestData['password']);
            return $this->signupRepository->create($requestData);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}

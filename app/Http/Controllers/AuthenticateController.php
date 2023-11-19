<?php

namespace App\Http\Controllers;

use Exception;
use App\Traits\ResponseTraits;
use App\Services\AuthenticateService;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\signupRequest;
use App\Services\UserService;
use Illuminate\Validation\ValidationException;

class AuthenticateController extends Controller
{
    use ResponseTraits;
    
    public function login(LoginRequest $request, AuthenticateService $authenticateService)
    {
        try {
            $request = $request->validated();
            $loginData = $authenticateService->login($request);
            return $this->successResponse($loginData, 'User login successfully');
        } catch (ValidationException $validationException) {
            return $this->validationErrorResponse($validationException);
        } catch (Exception $exception) {
            return $this->exceptionErrorResponse($exception);
        }
    }
    
    public function signup(signupRequest $request, AuthenticateService $authenticateService)
    {
        try {
            $request = $request->validated();
            $signupData = $authenticateService->signup($request);
            return $this->successResponse($signupData, 'user account signup successfully');
        } catch (ValidationException $validationException) {
            return $this->validationErrorResponse($validationException);
        } catch (Exception $exception) {
            return $this->exceptionErrorResponse($exception);
        }
    }
    
    public function userActivate($id, UserService $userService)
    {
        try {
            $signupData = $userService->userActivate($id);
            return $this->successResponse($signupData, 'user account activate successfully');
        } catch (ValidationException $validationException) {
            return $this->validationErrorResponse($validationException);
        } catch (Exception $exception) {
            return $this->exceptionErrorResponse($exception);
        }
    }
}
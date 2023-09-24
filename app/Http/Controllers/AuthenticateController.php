<?php

namespace App\Http\Controllers;

use Exception;
use App\Traits\ResponseTraits;
use App\Services\AuthenticateService;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

class AuthenticateController extends Controller
{
    use ResponseTraits;
    
    public function login(LoginRequest $request, AuthenticateService $authenticateService)
    {
        try {
            $request = $request->validated();
            $loginData = $authenticateService->login($request);
            return $this->successResponse($loginData, 'Admin login successfully');
        } catch (ValidationException $validationException) {
            return $this->validationErrorResponse($validationException);
        } catch (Exception $exception) {
            return $this->exceptionErrorResponse($exception);
        }
    }
}
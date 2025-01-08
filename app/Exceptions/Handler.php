<?php

namespace App\Exceptions;

use App\Helpers\Response;
use App\Helpers\ResponseStatus;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Stancl\Tenancy\Exceptions\TenantCouldNotBeIdentifiedOnDomainException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            if (request()->wantsJson()) {
                $exceptionHandlers = [
                    MethodNotAllowedHttpException::class => [Response::NOT_ALLOWED, ResponseStatus::NOT_ALLOWED],
                    NotFoundHttpException::class => [Response::NOT_FOUND, ResponseStatus::NOT_FOUND],
                    ModelNotFoundException::class => [Response::NOT_FOUND, ResponseStatus::NOT_FOUND],
                    AccessDeniedHttpException::class => [Response::NOT_AUTHORIZED, ResponseStatus::FORBIDDEN],
                    AuthenticationException::class => [Response::NOT_AUTHENTICATED, ResponseStatus::NETWORK_AUTHENTICATION_REQUIRED],
                    ValidationException::class => [fn($e) => $e->getMessage(), ResponseStatus::VALIDATION_ERROR],
                    TenantCouldNotBeIdentifiedOnDomainException::class => [fn($e) => $e->getMessage(), ResponseStatus::NOT_FOUND],
                    // Uncomment if needed
                    // ErrorException::class => [Response::LDAP_CONNECTION_FAILD, ResponseStatus::NOT_FOUND],
                ];

                foreach ($exceptionHandlers as $exceptionClass => $responseData) {
                    $this->renderable(function ($exception, $request) use ($exceptionClass, $responseData) {
                        if ($exception instanceof $exceptionClass) {
                            $message = is_callable($responseData[0]) ? $responseData[0]($exception) : $responseData[0];
                            return Response::respondError($message, $responseData[1]);
                        }
                    });
                }
            }

        });
    }
}

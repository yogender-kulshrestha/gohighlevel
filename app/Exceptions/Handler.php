<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
            //
        });
    }

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException && $request->is('api/*')) {
            return response()->json(['statusCode' => 404, 'message' => 'Api Not Found'], 404);
        }

        if ($exception instanceof MethodNotAllowedHttpException && $request->is('api/*')) {
            return response()->json(['statusCode' => 405, 'message' => $request->method().' Method Not Allowed'], 405);
        }

        if ($exception instanceof MissingScopeException && $request->is('api/*')){
            return response()->json(['statusCode' => 403, 'message' => 'Unauthorized user.'], 403);
        }

        return parent::render($request, $exception);
    }
}

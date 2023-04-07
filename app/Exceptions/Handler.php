<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    private function transformErrors(ValidationException $exception)
    {
        $errors = '';
        $i = 0;

        foreach ($exception->errors() as $message) {
            $i++;
            $errors .= $i === count($exception->errors()) ? $message[0] : $message[0] . ',';
        }

        return $errors;
    }

    public function render($request, Throwable $e)
    {
//        dd($request);
        if ($e instanceof ValidationException) {
            return response()->json([
                'status'    => 'error',
                'data'      => 'application/json',
                'message'   => $this->transformErrors($e)
            ],422);
        }

        if ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException) {
            return response()->json([
                'status'    => 'error',
                'data'      => 'application/json',
                'message'   => 'صفحه مورد نظر یافت نشد!'
            ],404);
        }

        // custom error message
        if ($e instanceof \ErrorException) {
            return response()->json([
                'status'    => 'error',
                'data'      => 'application/json',
                'message'   => $e->getMessage()
            ],500);
        }

        return parent::render($request, $e);
    }
}

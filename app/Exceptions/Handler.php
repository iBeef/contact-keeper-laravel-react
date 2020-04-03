<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use \App\Exceptions\RedirectException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        // Api's return JSON
        if($exception instanceof RedirectException) {
            return $exception->getResponse();
        } else if($request->is('api/*')) {
            if($exception instanceof ModelNotFoundException) {
                return response()->json([
                    'success' => false,
                    'error' => "Resource not available"
                ], 400);
            } else {
                return response()->json([
                    'success' => false,
                    'error' => $exception->getMessage()
                ], 500);
            }
        }
        // If not api return as normal.
        return parent::render($request, $exception);
    }
}

<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Throwable;

use App\Common\Facade\Console;
use App\Models\Factory\BaseResponse;

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
        $this->reportable(function (Throwable $exception) {
            Console::writeLine(
                $exception->getMessage() . " at \n" .
                $exception->getFile() . ":" . $exception->getLine() . 
                "\n\n" 
                . $exception->getTraceAsString()
                . "\n\n\n\n"
            );
    
            return BaseResponse::error(
                $exception->getMessage(),
                $exception->getCode() === 0 ? 500 : $exception->getCode(),
                $exception->getFile() . ":" . $exception->getLine()
            );
        });
    }
}

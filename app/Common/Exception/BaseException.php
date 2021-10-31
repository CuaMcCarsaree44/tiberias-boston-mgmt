<?php

namespace App\Common\Exception;

use Error;
use Throwable;

/**
 * @author https://github.com/CuaMcCarsaree44
 * @since July, 7/24/2021 2021 03:08:17
 *
 * BaseException
 * Insert Description Here...
 */
class BaseException extends Error
{
    protected $code;
    protected $message;
    protected mixed $data = null;

    public function __construct(string $message = "", string $code = "", mixed $data = null)
    {
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;

        parent::__construct("Error [$code] : $message", 500, null);

    }
}
<?php

namespace Mega\Services\Authentication\Exceptions;

use Mega\Services\Core\Exception\Abstracts\ApiException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AuthenticationFailedException
 *
 * @type Exception
 * @package  Mega\Services\Authentication\Exceptions
 * @author   Mahmoud Zalt <mahmoud@zalt.me>
 */
class LogoutFailedException extends ApiException
{
    public $httpStatusCode = Response::HTTP_BAD_REQUEST;

    public $message = 'Failed to logout!';
}

<?php

namespace Arrow\Application\Event;

use Arrow\Event\Event;
use Exception;

/**
 * Class ExceptionEvent
 *
 * @package Arrow\Application\Event
 */
class ExceptionEvent extends Event
{

    const EXCEPTION = 'exception';

    /**
     * @var Exception
     */
    protected $exception;

    /**
     * @param Exception $exception
     * @return $this
     */
    public function setException(Exception $exception)
    {
        $this->exception = $exception;

        return $this;
    }

    /**
     * @return Exception
     */
    public function getException()
    {
        return $this->exception;
    }

}
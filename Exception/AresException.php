<?php

namespace Edge\Ares\Exception;

/**
 * @author Marek Makovec <marek.makovec@edgedesign.cz>
 */
class AresException extends \Exception implements ExceptionInterface
{
    /** @var string */
    private $aresMessage;

    /** @var int */
    private $aresCode;

    public function __construct($message, $aresMessage, $aresCode, $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->aresCode = $aresCode;
        $this->aresMessage = $aresMessage;
    }

    /**
     * @return int
     */
    public function getAresCode()
    {
        return $this->aresCode;
    }

    /**
     * @return string
     */
    public function getAresMessage()
    {
        return $this->aresMessage;
    }
}

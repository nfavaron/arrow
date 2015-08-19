<?php

namespace Arrow\Http\Response;

use Arrow\Http\Response\Content\ResponseContentInterface;

/**
 * Class Response
 *
 * @package Arrow\Http\Response
 */
class Response implements ResponseInterface
{

    /**
     * List of status code descriptions
     *
     * http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
     *
     * @var array
     */
    protected $statusCodeDescription = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-status',
        208 => 'Already Reported',
        226 => 'IM Used',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Payload Too Large',
        414 => 'URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Range Not Satisfiable',
        417 => 'Expectation Failed',
        421 => 'Misdirected Request',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        425 => 'Unassigned',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        510 => 'Not Extended',
        511 => 'Network Authentication Required'
    ];

    /**
     * HTTP status code
     *
     * @var int
     */
    protected $statusCode = 200;

    /**
     * Associative array of header name => header value
     *
     * @var array
     */
    protected $headers = [];

    /**
     * @var null|ResponseContentInterface
     */
    protected $content;

    /**
     * @inheritdoc
     */
    public function setStatusCode($statusCode)
    {

        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getStatusCode()
    {

        return $this->statusCode;
    }

    /**
     * @inheritdoc
     */
    public function setHeader($name, $value)
    {

        $this->headers[$name] = $value;

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function removeHeader($name)
    {

        if (isset($this->headers[$name])) {
            unset($this->headers[$name]);
        }

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function setContent(ResponseContentInterface $content)
    {

        $this->content = $content;

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function getContent()
    {

        return $this->content;

    }

    /**
     * @inheritdoc
     */
    public function sendHeaders()
    {

        // Status code
        header(
            sprintf(
                'HTTP/1.1 %s %s',
                $this->getStatusCode(),
                $this->statusCodeDescription[$this->getStatusCode()]
            )
        );

        // Headers
        foreach ($this->headers as $name => $value) {
            header(sprintf('%s: %s', $name, $value));
        }

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function sendContent()
    {

        $content = $this->getContent();

        if ($content instanceof ResponseContentInterface === true) {

            // Content type
            header(sprintf('Content-Type: %s', $content->getContentType()));

            // Content output
            $output = $content->getOutput();

            if (!empty($output)) {

                // Content length
                header(sprintf('Content-Length: %s', mb_strlen($output)));

                // Content output
                echo $output;

            }

        }

        return $this;

    }

}
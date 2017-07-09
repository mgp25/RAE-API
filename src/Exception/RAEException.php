<?php

namespace RAE\Exception;

/**
 * The core exception that ALL other library exceptions derive from.
 *
 * If you catch this exception, you KNOW it came from our Instagram-API library.
 */
class RAEException extends \RuntimeException
{
    /**
     * The full response that triggered the exception, if available.
     *
     * @var ResponseInterface|null
     */
    private $_response = null;

    /**
     * Check whether the exception has a full server response.
     *
     * @return bool TRUE if a full response is available, otherwise FALSE.
     */
    public function hasResponse()
    {
        return $this->_response !== null ? true : false;
    }

    /**
     * Get the full server response.
     *
     * @return ResponseInterface|null The full response if one exists,
     *                                otherwise NULL.
     *
     * @see InstagramException::hasResponse()
     */
    public function getResponse()
    {
        return $this->_response;
    }

    /**
     * Internal. Sets the value of the full server response.
     *
     * @param ResponseInterface|null $response The response value.
     */
    public function setResponse(
        ResponseInterface $response = null)
    {
        $this->_response = $response;
    }
}

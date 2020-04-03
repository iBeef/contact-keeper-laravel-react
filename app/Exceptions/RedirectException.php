<?php

namespace App\Exceptions;

Class RedirectException extends \Exception
{
    protected $response;

    /**
     * Gets the redirect response
     * 
     * @return \Illuminate\Http\Response
     */
    public function getResponse() 
    {
        return $this->response;
    }

    /**
     * Sets the redirect response
     * 
     * @return \App\Exceptions\RedirectException
     */
    public function setResponse($response) 
    {
        $this->response = $response;
        return $this;
    }
}
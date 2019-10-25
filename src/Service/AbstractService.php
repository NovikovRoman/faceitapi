<?php

namespace FaceitApi\Service;

use FaceitApi\Exception\ExceptionForbidden;
use FaceitApi\Exception\ExceptionNotFound;
use FaceitApi\Exception\ExceptionTemporarilyUnavailable;
use FaceitApi\Exception\ExceptionTooManyRequests;
use FaceitApi\Exception\ExceptionUnauthorized;
use FaceitApi\FaceitClient;
use GuzzleHttp\Exception\GuzzleException;

abstract class AbstractService
{
    /** @var FaceitClient */
    protected $faceitClient;

    public function __construct(FaceitClient $faceitClient)
    {
        $this->faceitClient = $faceitClient;
    }

    /**
     * @param $url
     * @param array $vars
     * @param array $params
     * @return array
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws ExceptionTemporarilyUnavailable
     * @throws ExceptionTooManyRequests
     * @throws ExceptionUnauthorized
     */
    protected function requestGet($url, $vars = [], $params = [])
    {
        $resp = $this->faceitClient->requestGet($url, $vars, $params);

        return json_decode($resp->getBody()->getContents(), true);
    }
}
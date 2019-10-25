<?php

namespace FaceitApi\Service\Data;

use Faceit\Service\AbstractService;
use FaceitApi\Exception\ExceptionForbidden;
use FaceitApi\Exception\ExceptionNotFound;
use FaceitApi\Exception\ExceptionTemporarilyUnavailable;
use FaceitApi\Exception\ExceptionTooManyRequests;
use FaceitApi\Exception\ExceptionUnauthorized;
use GuzzleHttp\Exception\GuzzleException;

class Match extends AbstractService
{
    const url = '/matches';

    /**
     * @param string $id
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws ExceptionTemporarilyUnavailable
     * @throws ExceptionTooManyRequests
     * @throws ExceptionUnauthorized
     * @throws GuzzleException
     */
    public function getId(string $id)
    {
        $url = self::url . '/:id';
        return $this->requestGet($url, ['id' => $id]);
    }

    /**
     * @param string $id
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws ExceptionTemporarilyUnavailable
     * @throws ExceptionTooManyRequests
     * @throws ExceptionUnauthorized
     * @throws GuzzleException
     */
    public function stats(string $id)
    {
        $url = self::url . '/:id/stats';
        return $this->requestGet($url, ['id' => $id]);
    }
}
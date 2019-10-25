<?php

namespace FaceitApi\Service\Data;

use Faceit\Service\AbstractService;
use FaceitApi\Exception\ExceptionForbidden;
use FaceitApi\Exception\ExceptionNotFound;
use FaceitApi\Exception\ExceptionTemporarilyUnavailable;
use FaceitApi\Exception\ExceptionTooManyRequests;
use FaceitApi\Exception\ExceptionUnauthorized;
use GuzzleHttp\Exception\GuzzleException;

class Team extends AbstractService
{
    const url = '/teams';

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
     * @param string $gameId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws ExceptionTemporarilyUnavailable
     * @throws ExceptionTooManyRequests
     * @throws ExceptionUnauthorized
     * @throws GuzzleException
     */
    public function stats(string $id, string $gameId)
    {
        $url = self::url . '/:id/stats/:gameId';
        return $this->requestGet($url, ['id' => $id, 'gameId' => $gameId]);
    }

    /**
     * @param string $id
     * @param int $offset
     * @param int $limit
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws ExceptionTemporarilyUnavailable
     * @throws ExceptionTooManyRequests
     * @throws ExceptionUnauthorized
     * @throws GuzzleException
     */
    public function tournaments(string $id, int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/:id/tournaments';
        return $this->requestGet($url, ['id' => $id], ['offset' => $offset, 'limit' => $limit]);
    }
}
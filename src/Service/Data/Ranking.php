<?php

namespace FaceitApi\Service\Data;

use Faceit\Service\AbstractService;
use FaceitApi\Exception\ExceptionForbidden;
use FaceitApi\Exception\ExceptionNotFound;
use FaceitApi\Exception\ExceptionTemporarilyUnavailable;
use FaceitApi\Exception\ExceptionTooManyRequests;
use FaceitApi\Exception\ExceptionUnauthorized;
use GuzzleHttp\Exception\GuzzleException;

class Ranking extends AbstractService
{
    const url = '/rankings/games';

    /**
     * @param string $gameId
     * @param string $region
     * @param string $country
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
    public function region(string $gameId, string $region, string $country = '', int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/:gameId/regions/:region';
        return $this->requestGet($url, ['gameId' => $gameId, 'region' => $region],
            ['country' => $country, 'offset' => $offset, 'limit' => $limit]);
    }

    /**
     * @param string $gameId
     * @param string $region
     * @param string $playerId
     * @param string $country
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
    public function player(string $gameId, string $region, string $playerId, string $country = '', int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/:gameId/regions/:region/players/:playerId';
        return $this->requestGet($url, ['gameId' => $gameId, 'region' => $region, 'playerId' => $playerId],
            ['country' => $country, 'offset' => $offset, 'limit' => $limit]);
    }
}
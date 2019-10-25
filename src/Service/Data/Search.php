<?php

namespace FaceitApi\Service\Data;

use FaceitApi\Service\AbstractService;
use FaceitApi\Exception\ExceptionForbidden;
use FaceitApi\Exception\ExceptionNotFound;
use FaceitApi\Exception\ExceptionTemporarilyUnavailable;
use FaceitApi\Exception\ExceptionTooManyRequests;
use FaceitApi\Exception\ExceptionUnauthorized;
use GuzzleHttp\Exception\GuzzleException;

class Search extends AbstractService
{
    const url = '/search';

    /**
     * @param string $name
     * @param string $game
     * @param string $region
     * @param string $type
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
    public function championships(string $name, string $game = '', string $region = '', string $type = '', int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/championships';
        return $this->requestGet($url, [],
            ['name' => $name, 'game' => $game, 'region' => $region, 'type' => $type, 'offset' => $offset, 'limit' => $limit]);
    }

    /**
     * @param string $name
     * @param string $game
     * @param string $region
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
    public function hubs(string $name, string $game = '', string $region = '', int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/hubs';
        return $this->requestGet($url, [],
            ['name' => $name, 'game' => $game, 'region' => $region, 'offset' => $offset, 'limit' => $limit]);
    }

    /**
     * @param string $name
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
    public function organizers(string $name, int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/organizers';
        return $this->requestGet($url, [],
            ['name' => $name, 'offset' => $offset, 'limit' => $limit]);
    }

    /**
     * @param string $nickname
     * @param string $game
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
    public function players(string $nickname, string $game = '', string $country = '', int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/players';
        return $this->requestGet($url, [],
            ['nickname' => $nickname, 'game' => $game, 'country' => $country, 'offset' => $offset, 'limit' => $limit]);
    }

    /**
     * @param string $nickname
     * @param string $game
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
    public function teams(string $nickname, string $game = '', int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/teams';
        return $this->requestGet($url, [],
            ['nickname' => $nickname, 'game' => $game, 'offset' => $offset, 'limit' => $limit]);
    }

    /**
     * @param string $name
     * @param string $game
     * @param string $region
     * @param string $type
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
    public function tournaments(string $name, string $game = '', string $region = '', string $type = '', int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/tournaments';
        return $this->requestGet($url, [],
            ['name' => $name, 'game' => $game, 'region' => $region, 'type' => $type, 'offset' => $offset, 'limit' => $limit]);
    }
}
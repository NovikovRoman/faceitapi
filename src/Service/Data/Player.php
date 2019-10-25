<?php

namespace FaceitApi\Service\Data;

use Faceit\Service\AbstractService;
use FaceitApi\Exception\ExceptionForbidden;
use FaceitApi\Exception\ExceptionNotFound;
use FaceitApi\Exception\ExceptionTemporarilyUnavailable;
use FaceitApi\Exception\ExceptionTooManyRequests;
use FaceitApi\Exception\ExceptionUnauthorized;
use GuzzleHttp\Exception\GuzzleException;

class Player extends AbstractService
{
    const url = '/players';

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
     * @param string $nickname
     * @param string $game
     * @param string $gamePlayerId
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws ExceptionTemporarilyUnavailable
     * @throws ExceptionTooManyRequests
     * @throws ExceptionUnauthorized
     * @throws GuzzleException
     */
    public function list(string $nickname, string $game = '', string $gamePlayerId = '')
    {
        return $this->requestGet(self::url, [],
            ['nickname' => $nickname, 'game' => $game, 'gamePlayerId' => $gamePlayerId]);
    }

    /**
     * @param string $id
     * @param string $game
     * @param int $from
     * @param int $to
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
    public function history(string $id, string $game, int $from = 0, int $to = 0, int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/:id/history';
        return $this->requestGet($url, ['id' => $id],
            ['game' => $game, 'from' => $from, 'to' => $to, 'offset' => $offset, 'limit' => $limit]);
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
    public function hubs(string $id, int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/:id/hubs';
        return $this->requestGet($url, ['id' => $id], ['offset' => $offset, 'limit' => $limit]);
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
}
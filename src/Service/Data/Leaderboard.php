<?php

namespace FaceitApi\Service\Data;

use Faceit\Service\AbstractService;
use FaceitApi\Exception\ExceptionForbidden;
use FaceitApi\Exception\ExceptionNotFound;
use FaceitApi\Exception\ExceptionTemporarilyUnavailable;
use FaceitApi\Exception\ExceptionTooManyRequests;
use FaceitApi\Exception\ExceptionUnauthorized;
use GuzzleHttp\Exception\GuzzleException;

class Leaderboard extends AbstractService
{
    const url = '/leaderboards';

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
    public function getId(string $id, int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/:id';
        return $this->requestGet($url, ['id' => $id], ['offset' => $offset, 'limit' => $limit]);
    }

    /**
     * @param string $championshipId
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
    public function championship(string $championshipId, int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/championships/:championshipId';
        return $this->requestGet($url, ['championshipId' => $championshipId], ['offset' => $offset, 'limit' => $limit]);
    }


    /**
     * @param string $championshipId
     * @param string $group
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
    public function championshipGroup(string $championshipId, string $group, int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/championships/:championshipId/groups/:group';
        return $this->requestGet($url,
            ['championshipId' => $championshipId, 'group' => $group], ['offset' => $offset, 'limit' => $limit]);
    }

    /**
     * @param string $hubId
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
    public function hub(string $hubId, int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/hubs/:hubId';
        return $this->requestGet($url, ['hubId' => $hubId], ['offset' => $offset, 'limit' => $limit]);
    }

    /**
     * @param string $hubId
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
    public function hubGeneral(string $hubId, int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/hubs/:hubId/general';
        return $this->requestGet($url, ['hubId' => $hubId], ['offset' => $offset, 'limit' => $limit]);
    }

    /**
     * @param string $hubId
     * @param string $season
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
    public function hubSeason(string $hubId, string $season, int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/hubs/:hubId/seasons/:season';
        return $this->requestGet($url, ['hubId' => $hubId, 'season' => $season], ['offset' => $offset, 'limit' => $limit]);
    }
}
<?php

namespace FaceitApi\Service\Data;

use Faceit\Service\AbstractService;
use FaceitApi\Exception\ExceptionForbidden;
use FaceitApi\Exception\ExceptionNotFound;
use FaceitApi\Exception\ExceptionTemporarilyUnavailable;
use FaceitApi\Exception\ExceptionTooManyRequests;
use FaceitApi\Exception\ExceptionUnauthorized;
use GuzzleHttp\Exception\GuzzleException;

class Organizer extends AbstractService
{
    const url = '/organizers';

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
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws ExceptionTemporarilyUnavailable
     * @throws ExceptionTooManyRequests
     * @throws ExceptionUnauthorized
     * @throws GuzzleException
     */
    public function list()
    {
        return $this->requestGet(self::url);
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
    public function championships(string $id, int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/:id/championships';
        return $this->requestGet($url, ['id' => $id], ['offset' => $offset, 'limit' => $limit]);
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
    public function games(string $id)
    {
        $url = self::url . '/:id/games';
        return $this->requestGet($url, ['id' => $id]);
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
    public function tournaments(string $id, string $type = '', int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/:id/tournaments';
        return $this->requestGet($url, ['id' => $id], ['type' => $type, 'offset' => $offset, 'limit' => $limit]);
    }
}
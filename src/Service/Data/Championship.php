<?php

namespace FaceitApi\Service\Data;

use Faceit\Service\AbstractService;
use FaceitApi\Exception\ExceptionForbidden;
use FaceitApi\Exception\ExceptionNotFound;
use FaceitApi\Exception\ExceptionTemporarilyUnavailable;
use FaceitApi\Exception\ExceptionTooManyRequests;
use FaceitApi\Exception\ExceptionUnauthorized;
use GuzzleHttp\Exception\GuzzleException;

class Championship extends AbstractService
{
    const url = '/championships';

    /**
     * @param string $id
     * @param array $expanded
     * @return array
     * @throws ExceptionForbidden
     * @throws ExceptionNotFound
     * @throws ExceptionTemporarilyUnavailable
     * @throws ExceptionTooManyRequests
     * @throws ExceptionUnauthorized
     * @throws GuzzleException
     */
    public function getId(string $id, array $expanded = [])
    {
        $url = self::url . '/:id';
        return $this->requestGet($url, ['id' => $id], ['expanded' => $expanded]);
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
    public function matches(string $id, string $type = 'all', int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/:id/matches';
        return $this->requestGet($url, ['id' => $id], ['type' => $type, 'offset' => $offset, 'limit' => $limit]);
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
    public function subscriptions(string $id, int $offset = 0, int $limit = 0)
    {
        $url = self::url . '/:id/subscriptions';
        return $this->requestGet($url, ['id' => $id], ['offset' => $offset, 'limit' => $limit]);
    }
}
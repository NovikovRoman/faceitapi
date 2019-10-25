<?php

namespace FaceitApi;

use FaceitApi\Exception\ExceptionForbidden;
use FaceitApi\Exception\ExceptionTemporarilyUnavailable;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use FaceitApi\Exception\ExceptionNotFound;
use FaceitApi\Exception\ExceptionTooManyRequests;
use FaceitApi\Exception\ExceptionUnauthorized;

class FaceitClient
{
    const API_URL = 'https://open.faceit.com/data/v4';

    private $apiKey;
    /** @var Client */
    private $httpClient;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->httpClient = new Client();
    }

    /**
     * @param $url
     * @param array $vars
     * @param array $params
     * @return ResponseInterface
     * @throws ExceptionNotFound
     * @throws ExceptionTooManyRequests
     * @throws ExceptionUnauthorized
     * @throws GuzzleException
     * @throws ExceptionForbidden
     * @throws ExceptionTemporarilyUnavailable
     */
    public function requestGet($url, $vars = [], $params = [])
    {
        $url = self::API_URL . $url;
        foreach ($vars as $code => $value) {
            $url = str_replace(':' . $code, urldecode($value), $url);
        }

        $url .= empty($params) ? '' : '?' . http_build_query($params);

        $request = new Request('GET', $url);
        $resp = $this->httpClient->send($request, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
            ]
        ]);

        switch ($resp->getStatusCode()) {
            case 200:
                return $resp;
                break;

            case 401:
                throw new ExceptionUnauthorized('Unauthorized.', $request, $resp);
                break;

            case 403:
                throw new ExceptionForbidden('Forbidden', $request, $resp);
                break;

            case 404:
                throw new ExceptionNotFound('Not Found.', $request, $resp);
                break;

            case 429:
                throw new ExceptionTooManyRequests('Too many requests.', $request, $resp);
                break;

            case 503:
                throw new ExceptionTemporarilyUnavailable('Temporarily unavailable.', $request, $resp);
                break;
        }

        throw new RequestException('Bad status code  ' . $resp->getStatusCode() . '.', $request, $resp);
    }
}
<?php
declare(strict_types=1);

namespace gumione\ZenSdk\Http;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Class HttpClient provides methods for sending HTTP requests and receiving responses.
 *
 * @package gumione\ZenSdk\Http
 */
class HttpClient {

    private GuzzleClient $client;
    private array $headers;

    /**
     * HttpClient constructor.
     *
     * @param string $baseUri The base URI of the API endpoint.
     * @param array $headers Additional headers to be added to each request.
     */
    public function __construct(string $baseUri, array $headers = []) {
        $this->client = new GuzzleClient([
            'base_uri' => $baseUri
        ]);

        $this->headers = $headers;
    }

    /**
     * Generates unique ID for the request.
     *
     * @return string
     * @throws \Exception
     */
    public function generateRequestId(): string {
        $uuid = bin2hex(random_bytes(16));
        $id = substr_replace($uuid, '|', 8, 0);
        $id .= '.';

        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789?&:_|-=+.,#/';
        $id .= substr(str_shuffle($alphabet), 0, 1000);

        return substr($id, 0, 1024);
    }

    /**
     * Sends a GET request to the API endpoint.
     *
     * @param string $uri The URI to which the request is sent.
     * @param array $additionalHeaders Additional headers to be added to the request.
     * @return array The JSON decoded response body.
     */
    public function get(string $uri, array $additionalHeaders = []): array {
        $response = $this->client->get($uri, [
            'headers' => array_merge($this->headers, $additionalHeaders) + ['request-id' => $this->generateRequestId()]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Sends a POST request to the API endpoint.
     *
     * @param string $uri The URI to which the request is sent.
     * @param array $body The JSON encoded request body.
     * @param array $additionalHeaders Additional headers to be added to the request.
     * @return array The JSON decoded response body.
     */
    public function post(string $uri, array $body = [], array $additionalHeaders = []): array {
        $response = $this->client->post($uri, [
            'headers' => array_merge($this->headers, $additionalHeaders) + ['request-id' => $this->generateRequestId()],
            'json' => $body
        ]);

        return json_decode($response->getBody(), true);
    }
}

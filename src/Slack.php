<?php

namespace Shucream0117\SlackPHP;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Slack
{
    /** @var string */
    private $incomingWebHookUrl;

    /** @var Client */
    private $httpClient;

    public function __construct(string $url, Client $client = null)
    {
        $this->incomingWebHookUrl = $url;
        $this->httpClient = $client ?: new Client();
    }

    /**
     * @param string $message
     * @throws RequestException
     */
    public function send(string $message): void
    {
        $this->httpClient->post($this->incomingWebHookUrl, [
            'form_params' => [
                'payload' => json_encode(['text' => $message]),
            ],
        ]);
    }
}
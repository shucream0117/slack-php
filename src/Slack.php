<?php

namespace Shucream0117\SlackPHP;

use GuzzleHttp\Client;

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
     * @param bool $linkNames
     */
    public function send(string $message, bool $linkNames = true): void
    {
        $params = ['text' => $message];
        if ($linkNames) {
            $params['link_names'] = 1;
        }
        $this->httpClient->post($this->incomingWebHookUrl, [
            'form_params' => [
                'payload' => json_encode($params),
            ],
        ]);
    }
}
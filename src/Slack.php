<?php

namespace Shucream0117\SlackPHP;

use GuzzleHttp\Client;

class Slack
{
    private string $incomingWebHookUrl;
    private Client $httpClient;
    private array $params = [];

    public function __construct(string $webhookUrl, Client $client = null)
    {
        $this->incomingWebHookUrl = $webhookUrl;
        $this->httpClient = $client ?: new Client();
    }

    /**
     * @param string $message
     * @param string[] $mentionMemberIds ユーザー名ではないSlackの内部ID的なもの。
     * @return void
     */
    public function send(string $message, array $mentionMemberIds = []): void
    {
        $mention = '';
        foreach ($mentionMemberIds as $id) {
            $mention .= "<@{$id}> ";
        }
        $this->httpClient->post($this->incomingWebHookUrl, [
            'form_params' => [
                'payload' => json_encode(array_merge($this->params, [
                    'text' => $mention . $message
                ])),
            ],
        ]);
    }
}

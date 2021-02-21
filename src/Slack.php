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

    public function setChannel(string $channel): self
    {
        $this->params['channel'] = $channel;
        return $this;
    }

    public function setUserName(string $userName): self
    {
        $this->params['username'] = $userName;
        return $this;
    }

    public function setIconEmoji(string $iconEmoji): self
    {
        $this->params['icon_emoji'] = $iconEmoji;
        return $this;
    }

    /**
     * @see https://api.slack.com/changelog/2017-09-the-one-about-usernames
     * @deprecated
     */
    public function setLinkNames(bool $linkNames): self
    {
        $this->params['link_names'] = (int)$linkNames;
        return $this;
    }

    /**
     * @param string $message
     */
    public function send(string $message): void
    {
        $this->httpClient->post($this->incomingWebHookUrl, [
            'form_params' => [
                'payload' => json_encode(array_merge($this->params, ['text' => $message])),
            ],
        ]);
    }
}

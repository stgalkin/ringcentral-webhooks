<?php

namespace Stgalkin\RingCentral;

use Stgalkin\RingCentral\Message\MessageContract;

/**
 * Class RingCentralAdapter
 *
 * @package Stgalkin\RingCentral
 */
class RingCentralAdapter
{
    /**
     * @var string
     */
    private $webhook;

    /**
     * @param $webhook
     */
    public function __construct(string $webhook)
    {
        $this->webhook = $webhook;
    }

    /**
     * Sends card message as POST request
     *
     * @param MessageContract $card
     *
     * @return bool
     * @throws \Exception
     */
    public function send(MessageContract $card): bool
    {
        $json = json_encode($card->message());

        $ch = curl_init($this->_webhook());
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        $result = json_decode(curl_exec($ch), true);

        return array_key_exists('status', $result) && $result['status'] === 'ok';
    }

    /**
     * @return string
     * @throws \UnexpectedValueException
     */
    private function _webhook(): string
    {
        if (!is_string($this->webhook)) {
            throw new \UnexpectedValueException("Webhook is not provided at construct");
        }

        if (!filter_var($this->webhook, FILTER_VALIDATE_URL)) {
            throw new \UnexpectedValueException("Webhook is not valid");
        }

        return $this->webhook;
    }
}

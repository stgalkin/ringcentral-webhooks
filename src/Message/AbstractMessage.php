<?php

namespace Stgalkin\RingCentral\Message;

/**
 * Class AbstractMessage
 *
 * @package Stgalkin\RingCentral\Message
 */
abstract class AbstractMessage implements MessageContract
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $body;

    /**
     * @var array
     */
    public $attachments;

    /**
     * AbstractMessage constructor.
     *
     * @param string $title
     * @param string $body
     * @param array  $attachments
     */
    public function __construct(string $title, string $body, array $attachments = [])
    {
        $this->setTitle($title)->setBody($body);

        $this->attachments = $attachments;
    }

    /**
     * @param string $title
     *
     * @return AbstractMessage
     */
    private function setTitle(string $title): AbstractMessage
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $body
     *
     * @return AbstractMessage
     */
    private function setBody(string $body): AbstractMessage
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    protected function title(): string
    {
        if (!is_string($this->title)) {
            throw new \UnexpectedValueException("Title was not init properly");
        }

        return $this->title;
    }

    /**
     * @return string
     */
    protected function body(): string
    {
        if (!is_string($this->body)) {
            throw new \UnexpectedValueException("Body was not init properly");
        }

        return $this->body;
    }

    /**
     * @inheritDoc
     */
    abstract public function message(): array;
}

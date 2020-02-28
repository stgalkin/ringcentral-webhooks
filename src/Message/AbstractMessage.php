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
    private $text;

    /**
     * @var array
     */
    public $attachments;

    /**
     * AbstractMessage constructor.
     *
     * @param string $title
     * @param string $text
     * @param array  $attachments
     */
    public function __construct(string $title, string $text, array $attachments = [])
    {
        $this->setTitle($title)->setText($text);

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
     * @param string $text
     *
     * @return AbstractMessage
     */
    private function setText(string $text): AbstractMessage
    {
        $this->text = $text;

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
    protected function text(): string
    {
        if (!is_string($this->text)) {
            throw new \UnexpectedValueException("Text was not init properly");
        }

        return $this->text;
    }

    /**
     * @inheritDoc
     */
    abstract public function message(): array;
}

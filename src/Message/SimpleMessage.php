<?php

namespace Stgalkin\RingCentral\Message;

/**
 * Class SimpleMessage
 *
 * @package Stgalkin\RingCentral\Message
 */
class SimpleMessage extends AbstractMessage
{
    /**
     * @inheritDoc
     */
    public function message(): array
    {
        // TODO process attachments ?
        return [
            "title" => $this->title(),
            "text" => $this->text(),
            "attachments" => $this->attachments
        ];
    }
}

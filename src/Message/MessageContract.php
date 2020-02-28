<?php

namespace Stgalkin\RingCentral\Message;

/**
 * Interface MessageContract
 *
 * @package Stgalkin\RingCentral\Message
 */
interface MessageContract
{
    /**
     * Returns message
     *
     * @return array
     */
    public function message(): array;
}

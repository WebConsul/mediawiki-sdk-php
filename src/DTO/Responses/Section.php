<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Ekut\SpatieDtoValidators\GreaterThanOrEqual;
use Ekut\SpatieDtoValidators\LessThanOrEqual;
use Spatie\DataTransferObject\DataTransferObject;

class Section extends DataTransferObject
{
    /**
     *  Heading level, 1 through 4
     */
    #[GreaterThanOrEqual(1)]
    #[LessThanOrEqual(4)]
    public int $level;

    /**
     * Text of the heading line, in wikitext
     */
    public string $heading;

    /**
     * Location of the heading, in bytes from the beginning of the page
     */
    public int $offset;
}

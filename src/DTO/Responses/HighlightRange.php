<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Ekut\SpatieDtoValidators\Choice;
use Spatie\DataTransferObject\DataTransferObject;

class HighlightRange extends DataTransferObject
{
    /**
     * Where the highlighted text should start, in the number of bytes from the beginning of the line.
     */
    public int $start;

    /**
     * The length of the highlighted section, in bytes.
     */
    public int $length;

    /**
     * The type of highlight:
     * 0 indicates an addition.
     * 1 indicates a deletion.
     */
    #[Choice([0, 1])]
    public int $type;
}

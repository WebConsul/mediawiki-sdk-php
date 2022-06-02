<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Ekut\SpatieDtoValidators\Choice;
use Spatie\DataTransferObject\DataTransferObject;

class FileProperties extends DataTransferObject
{
    #[Choice([
        'BITMAP',
        'DRAWING',
        'AUDIO',
        'VIDEO',
        'MULTIMEDIA',
        'UNKNOWN',
        'OFFICE',
        'TEXT',
        'EXECUTABLE',
        'ARCHIVE',
        '3D',
    ])]
    public string $mediatype;

    public ?int $size;

    /**
     * Maximum recommended image width in pixels or null if not available
     */
    public ?int $width;

    /**
     *  Maximum recommended image height in pixels or null if not available
     */
    public ?int $height;

    /**
     * The length of the video, audio, or multimedia file or null for other media types
     */
    public ?int $duration;

    public string $url;
}

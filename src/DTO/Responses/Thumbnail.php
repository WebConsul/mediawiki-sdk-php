<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class Thumbnail extends DataTransferObject
{
    /**
     * Thumbnail media type
     */
    public string $mimetype;

    /**
     * FileResource size in bytes or null if not available
     */
    public ?int $size = null;

    /**
     * Maximum recommended image width in pixels or null if not available
     */
    public ?int $width = null;

    /**
     * Maximum recommended image height in pixels or null if not available
     */
    public ?int $height = null;

    /**
     * Length of the video, audio, or multimedia file or null for other media types
     */
    public ?int $duration = null;

    /**
     * URL to download the file
     * @ToDo Add URL validator
     */
    public string $url;
}

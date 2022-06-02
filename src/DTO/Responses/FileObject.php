<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class FileObject extends DataTransferObject
{
    public string $title;

    public string $file_description_url;

    public LatestRevisionOfFile $latest;

    public FileProperties $preferred;

    public FileProperties $original;
}

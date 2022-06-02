<?php

namespace MediawikiSdkPhp\Resources;

use MediawikiSdkPhp\DTO\Requests\FileRequest;
use MediawikiSdkPhp\DTO\Responses\GetFile;
use MediawikiSdkPhp\Exceptions\MediaWikiException;

class FileResource extends AbstractResource
{
    /**
     * @throws MediaWikiException
     */
    public function get(array $params): GetFile
    {
        $this->validateParams(FileRequest::class, $params);
        $url = "file/{$params['title']}";

        return $this->adapter->handle('get', $url, GetFile::class);
    }
}

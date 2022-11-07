<?php

namespace MediawikiSdkPhp\Resources\MediaWiki;

use MediawikiSdkPhp\DTO\Requests\FileRequest;
use MediawikiSdkPhp\DTO\Responses\GetFile;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\Resources\AbstractMediaWikiResource;

class FileResource extends AbstractMediaWikiResource
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

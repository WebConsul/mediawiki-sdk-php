<?php

namespace MediawikiSdkPhp\Resources;

use MediawikiSdkPhp\DTO\Requests\CompareRevisionsRequest;
use MediawikiSdkPhp\DTO\Requests\GetRevisionRequest;
use MediawikiSdkPhp\DTO\Responses\CompareRevisions;
use MediawikiSdkPhp\DTO\Responses\RevisionObject;
use MediawikiSdkPhp\Exceptions\MediaWikiException;

class RevisionResource extends AbstractMediaWikiResource
{
    /**
     * @throws MediaWikiException
     */
    public function get(array $params): RevisionObject
    {
        $this->validateParams(GetRevisionRequest::class, $params);
        $url = "revision/{$params['id']}/bare";

        return $this->adapter->handle('get', $url, RevisionObject::class);
    }

    /**
     * @throws MediaWikiException
     */
    public function compare(array $params): CompareRevisions
    {
        $this->validateParams(CompareRevisionsRequest::class, $params);
        $url = "revision/{$params['from']}/compare/{$params['to']}";

        return $this->adapter->handle('get', $url, CompareRevisions::class);
    }
}

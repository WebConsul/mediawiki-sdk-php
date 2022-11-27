<?php

namespace MediawikiSdkPhp\Resources\WikiMedia;

use JsonException;
use MediawikiSdkPhp\DTO\Requests\PageRequest;
use MediawikiSdkPhp\DTO\Requests\PageRevisionRequest;
use MediawikiSdkPhp\DTO\Responses\GetPageSummary;
use MediawikiSdkPhp\DTO\Responses\GetPageTitlesList;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\Resources\AbstractWikiMediaResource;

class PageContentResource extends AbstractWikiMediaResource
{
    /**
     * @param array $params
     * @return mixed
     * @throws JsonException
     * @throws MediaWikiException
     */
    public function getSummary(array $params): mixed
    {
        $this->validateParams(PageRequest::class, $params);

        $url = "page/summary/{$params['title']}";

        return $this->adapter->handle('get', $url, GetPageSummary::class);
    }

    /**
     * @param array $params
     * @return GetPageTitlesList
     * @throws MediaWikiException
     * @throws JsonException
     */
    public function getTitle(array $params): GetPageTitlesList
    {
        $this->validateParams(PageRequest::class, $params);

        $url = "page/title/{$params['title']}";
        return $this->adapter->handle('get', $url, GetPageTitlesList::class);
    }

    /**
     * @param array $params
     * @return GetPageTitlesList
     * @throws MediaWikiException
     * @throws JsonException
     */
    public function getTitleRevision(array $params): GetPageTitlesList
    {
        $this->validateParams(PageRevisionRequest::class, $params);

        $url = "page/title/{$params['title']}/{$params['revision']}";
        return $this->adapter->handle('get', $url, GetPageTitlesList::class);
    }
}

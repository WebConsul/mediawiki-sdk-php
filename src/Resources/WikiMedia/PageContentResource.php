<?php

namespace MediawikiSdkPhp\Resources\WikiMedia;

use JsonException;
use MediawikiSdkPhp\DTO\Requests\PageRequest;
use MediawikiSdkPhp\DTO\Responses\GetPageSummary;
use MediawikiSdkPhp\DTO\Responses\GetPageTitlesList;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\Resources\AbstractWikiMediaResource;

class PageContentResource extends AbstractWikiMediaResource
{
    /**
     * @throws MediaWikiException
     */
    public function summary(array $params)
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
    public function title(array $params): GetPageTitlesList
    {
        $this->validateParams(PageRequest::class, $params);

        $url = "page/title/{$params['title']}";
        return $this->adapter->handle('get', $url, GetPageTitlesList::class);
    }
}

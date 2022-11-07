<?php

namespace MediawikiSdkPhp\Resources\WikiMedia;

use MediawikiSdkPhp\DTO\Requests\PageRequest;
use MediawikiSdkPhp\DTO\Responses\GetPageSummary;
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
}

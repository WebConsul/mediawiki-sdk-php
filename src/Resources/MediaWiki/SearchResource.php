<?php

namespace MediawikiSdkPhp\Resources\MediaWiki;

use MediawikiSdkPhp\DTO\Requests\SearchRequest;
use MediawikiSdkPhp\DTO\Responses\SearchResults;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\Resources\AbstractMediaWikiResource;

class SearchResource extends AbstractMediaWikiResource
{
    /**
     * @throws MediaWikiException
     */
    public function pages(array $params): SearchResults
    {
        $this->validateParams(SearchRequest::class, $params);
        $url = 'search/page' . "?" . http_build_query($params);

        return $this->adapter->handle('get', $url, SearchResults::class);
    }

    /**
     * @throws MediaWikiException
     */
    public function autocompletePageTitle(array $params): SearchResults
    {
        $this->validateParams(SearchRequest::class, $params);

        $url = 'search/title' . "?" . http_build_query($params);

        return $this->adapter->handle('get', $url, SearchResults::class);
    }
}

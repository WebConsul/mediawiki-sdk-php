<?php

namespace MediawikiSdkPhp\Resources\WikiMedia;

use JsonException;
use MediawikiSdkPhp\DTO\Requests\PageHtmlRequest;
use MediawikiSdkPhp\DTO\Requests\PageRequest;
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
     * @return string
     * @throws MediaWikiException
     */
    public function getHtml(array $params): string
    {
        $this->validateParams(PageHtmlRequest::class, $params);

        $url = "page/html/{$params['title']}";
        unset($params['title']);

        if (!empty($params)){
            $queryParams = http_build_query($params);
            $url .= "?{$queryParams}";
        }

        $response = $this->adapter->get($url);

        if ($response->getStatusCode() !== 200){
            throw new MediaWikiException([
                'message' => 'Not found',
                'reason' => 'Nothing found by this name',
                'code' => 404,
            ]);
        }

        return $response->getContent();
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
     * @return string
     * @throws MediaWikiException
     */
    public function getHtml(array $params): string
    {
        $this->validateParams(PageHtmlRequest::class, $params);

        $url = "page/html/{$params['title']}";
        unset($params['title']);

        if (!empty($params)){
            $queryParams = http_build_query($params);
            $url .= "?{$queryParams}";
        }

        $error = [];

        $response = $this->adapter->get($url);
        $data = $response->toArray();
        $status = $response->getStatusCode();

        if ($status !== 200){
            $error = $this->adapter->generateError($data, $status);
        }

        if ($error) {
            throw new MediaWikiException($error);
        }

        return $response->getContent();
    }
}

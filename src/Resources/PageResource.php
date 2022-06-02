<?php

namespace MediawikiSdkPhp\Resources;

use MediawikiSdkPhp\DTO\Requests\GetPageHistoryCountsRequest;
use MediawikiSdkPhp\DTO\Requests\GetPageHistoryRequest;
use MediawikiSdkPhp\DTO\Requests\PageRequest;
use MediawikiSdkPhp\DTO\Responses\GetFilesOnPage;
use MediawikiSdkPhp\DTO\Responses\GetLanguages;
use MediawikiSdkPhp\DTO\Responses\GetPage;
use MediawikiSdkPhp\DTO\Responses\GetPageHistoryCounts;
use MediawikiSdkPhp\DTO\Responses\GetPageHistory;
use MediawikiSdkPhp\DTO\Responses\GetPageHtml;
use MediawikiSdkPhp\DTO\Responses\GetPageOffline;
use MediawikiSdkPhp\DTO\Responses\GetPageWithSource;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PageResource extends AbstractResource
{
    /**
     * @throws MediaWikiException
     */
    public function get(array $params): GetPage
    {
        $this->validateParams(PageRequest::class, $params);
        $url = "page/{$params['title']}/bare";

        return $this->adapter->handle('get', $url, GetPage::class);
    }

    /**
     * @throws MediaWikiException
     */
    public function getOffline(array $params): GetPageOffline
    {
        $this->validateParams(PageRequest::class, $params);
        $url = "page/{$params['title']}/with_html";

        return $this->adapter->handle('get', $url, GetPageOffline::class);
    }

    /**
     * @throws MediaWikiException
     */
    public function getSource(array $params): GetPageWithSource
    {
        $this->validateParams(PageRequest::class, $params);
        $url = "page/{$params['title']}";

        return $this->adapter->handle('get', $url, GetPageWithSource::class);
    }

    /**
     * @throws MediaWikiException
     */
    public function getHtml(array $params): ?GetPageHtml
    {
        $this->validateParams(PageRequest::class, $params);
        $res      = null;
        $url      = "page/{$params['title']}/html";
        $response = $this->adapter->get($url);
        $error    = [];

        if ($response->getStatusCode() !== 200) {
            $error = $this->adapter->generateError($response->toArray());
        }
        try {
            $res = new GetPageHtml(['html' => $response->getContent()]);
        } catch (UnknownProperties $e) {
            $error = [
                'reason'  => 'Response validation: Unknown properties',
                'code'    => $e->getCode(),
                'message' => $e->getMessage(),
            ];
        }

        if ($error) {
            throw new MediaWikiException($error);
        }

        return $res;
    }

    /**
     * @throws MediaWikiException
     */
    public function getLanguages(array $params): GetLanguages
    {
        $this->validateParams(PageRequest::class, $params);
        $url = "page/{$params['title']}/links/language";

        return $this->adapter->handle('get', $url, GetLanguages::class);
    }

    /**
     * @throws MediaWikiException
     */
    public function getFiles(array $params): GetFilesOnPage
    {
        $this->validateParams(PageRequest::class, $params);
        $url = "page/{$params['title']}/links/media";

        return $this->adapter->handle('get', $url, GetFilesOnPage::class);
    }

    /**
     * @throws MediaWikiException
     */
    public function getHistory(array $params): GetPageHistory
    {
        $this->validateParams(GetPageHistoryRequest::class, $params);
        $url = "page/{$params['title']}/history";

        return $this->adapter->handle('get', $url, GetPageHistory::class);
    }

    /**
     * @throws MediaWikiException
     */
    public function getHistoryCounts(array $params): GetPageHistoryCounts
    {
        $this->validateParams(GetPageHistoryCountsRequest::class, $params);
        $url = "page/{$params['title']}/history/counts/{$params['type']}";

        if (
            in_array($params['type'], ['edits', 'editors']) &&
            array_key_exists('from', $params) &&
            array_key_exists('to', $params)
        ) {
            $url .= '?' . http_build_query([$params['from'], $params['to']]);
        }

        return $this->adapter->handle('get', $url, GetPageHistoryCounts::class);
    }
}

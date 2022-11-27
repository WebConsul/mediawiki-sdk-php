<?php

namespace MediawikiSdkPhp\Resources\WikiMedia;

use JsonException;
use MediawikiSdkPhp\DTO\Requests\PageRequest;
use MediawikiSdkPhp\DTO\Requests\PageRequestWithRevision;
use MediawikiSdkPhp\DTO\Responses\Mobile\GetMobile;
use MediawikiSdkPhp\DTO\Responses\Mobile\GetMobileLead;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\Resources\AbstractWikiMediaResource;

class MobileResource extends AbstractWikiMediaResource
{
    /**
     * @throws JsonException
     * @throws MediaWikiException
     */
    public function getSections(array $params): mixed
    {
        $this->validateParams(PageRequest::class, $params);

        $url = "page/mobile-sections/{$params['title']}";

        return $this->adapter->handle('get', $url, GetMobile::class);
    }

    /**
     * @throws MediaWikiException
     * @throws JsonException
     */
    public function getSectionsByRevision(array $params): mixed
    {
        $this->validateParams(PageRequestWithRevision::class, $params);

        $url = "page/mobile-sections/{$params['title']}/{$params['revision']}";

        return $this->adapter->handle('get', $url, GetMobile::class);
    }

    /**
     * @throws MediaWikiException
     * @throws JsonException
     */
    public function getSectionsLead(array $params): mixed
    {
        $this->validateParams(PageRequest::class, $params);

        $url = "page/mobile-sections-lead/{$params['title']}";

        return $this->adapter->handle('get', $url, GetMobileLead::class);
    }

    /**
     * @throws MediaWikiException
     * @throws JsonException
     */
    public function getSectionsLeadByRevision(array $params): mixed
    {
        $this->validateParams(PageRequestWithRevision::class, $params);

        $url = "page/mobile-sections-lead/{$params['title']}/{$params['revision']}";

        return $this->adapter->handle('get', $url, GetMobileLead::class);
    }
}

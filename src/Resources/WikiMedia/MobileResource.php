<?php

namespace MediawikiSdkPhp\Resources\WikiMedia;

use JsonException;
use MediawikiSdkPhp\DTO\Requests\GetI18nRequest;
use MediawikiSdkPhp\DTO\Requests\PageRequest;
use MediawikiSdkPhp\DTO\Requests\PageWithRevisionRequest;
use MediawikiSdkPhp\DTO\Responses\Mobile\GetI18n;
use MediawikiSdkPhp\DTO\Responses\Mobile\GetMobile;
use MediawikiSdkPhp\DTO\Responses\Mobile\GetMobileLead;
use MediawikiSdkPhp\DTO\Responses\Mobile\GetMobileRemaining;
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
        $this->validateParams(PageWithRevisionRequest::class, $params);

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
        $this->validateParams(PageWithRevisionRequest::class, $params);

        $url = "page/mobile-sections-lead/{$params['title']}/{$params['revision']}";

        return $this->adapter->handle('get', $url, GetMobileLead::class);
    }

    /**
     * @throws MediaWikiException
     * @throws JsonException
     */
    public function getSectionsRemaining(array $params): mixed
    {
        $this->validateParams(PageRequest::class, $params);

        $url = "page/mobile-sections-remaining/{$params['title']}";

        return $this->adapter->handle('get', $url, GetMobileRemaining::class);
    }

    /**
     * @throws MediaWikiException
     * @throws JsonException
     */
    public function getSectionsRemainingByRevision(array $params): mixed
    {
        $this->validateParams(PageWithRevisionRequest::class, $params);

        $url = "page/mobile-sections-remaining/{$params['title']}/{$params['revision']}";

        return $this->adapter->handle('get', $url, GetMobileRemaining::class);
    }

    /**
     * @throws MediaWikiException
     * @throws JsonException
     */
    public function getI18n(array $params): mixed
    {
        $this->validateParams(GetI18nRequest::class, $params);

        $url = "data/i18n/{$params['type']}";

        return $this->adapter->handle('get', $url, GetI18n::class);
    }
}

<?php

namespace MediawikiSdkPhp\Resources\WikiMedia;

use JsonException;
use MediawikiSdkPhp\DTO\Requests\PageRequest;
use MediawikiSdkPhp\DTO\Responses\Mobile\GetMobile;
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
}

<?php

namespace MediawikiSdkPhp\Resources;

abstract class AbstractWikiMediaResource extends AbstractResource
{
    const WIKIMEDIA_REST_API = 'api/rest_v1/';

    public function getApiRoot(): string
    {
        $apiRoot = $_ENV['MEDIAWIKI_HOST'] . self::WIKIMEDIA_REST_API;

        return str_replace('{lang}', $this->getLang(), $apiRoot);
    }
}

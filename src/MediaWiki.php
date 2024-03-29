<?php

namespace MediawikiSdkPhp;

use Dotenv\Dotenv;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\Resources\MediaWiki\FileResource;
use MediawikiSdkPhp\Resources\MediaWiki\PageResource;
use MediawikiSdkPhp\Resources\MediaWiki\RevisionResource;
use MediawikiSdkPhp\Resources\MediaWiki\SearchResource;
use MediawikiSdkPhp\Resources\WikiMedia\PageContentResource;

class MediaWiki
{
    private ?FileResource     $file     = null;
    private ?PageResource     $page     = null;
    private ?RevisionResource $revision = null;
    private ?SearchResource   $search   = null;
    private ?PageContentResource $pageContent = null;

    public function __construct(private $lang = 'en')
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "../..");
        $dotenv->load();
    }

    public function file(): FileResource
    {
        if (is_null($this->file)) {
            $this->file = new FileResource($this->lang);
        }

        return $this->file;
    }

    public function page(): PageResource
    {
        if (is_null($this->page)) {
            $this->page = new PageResource($this->lang);
        }

        return $this->page;
    }

    public function pageContent(): PageContentResource
    {
        if (is_null($this->pageContent)) {
            $this->pageContent = new PageContentResource($this->lang);
        }

        return $this->pageContent;
    }

    public function revision(): RevisionResource
    {
        if (is_null($this->revision)) {
            $this->revision = new RevisionResource($this->lang);
        }

        return $this->revision;
    }

    public function search(): SearchResource
    {
        if (is_null($this->search)) {
            $this->search = new SearchResource($this->lang);
        }

        return $this->search;
    }

    /**
     * @throws MediaWikiException
     */
    public function __call(string $name, array $params): void
    {
        throw new MediaWikiException(
            [
                'message' => 'The specified resource (tickets) does not exist',
                'code'    => 404,
                'reason'  => 'Resource not found',
            ]
        );
    }
}

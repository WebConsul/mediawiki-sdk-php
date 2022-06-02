<?php

namespace MediawikiSdkPhp;

use Dotenv\Dotenv;
use MediawikiSdkPhp\Resources\FileResource;
use MediawikiSdkPhp\Resources\PageResource;
use MediawikiSdkPhp\Resources\RevisionResource;
use MediawikiSdkPhp\Resources\SearchResource;

class MediaWiki
{
    private ?FileResource     $file     = null;
    private ?PageResource     $page     = null;
    private ?RevisionResource $revision = null;
    private ?SearchResource   $search   = null;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "../..");
        $dotenv->load();
    }

    public function file(): FileResource
    {
        if (is_null($this->file)) {
            $this->file = new FileResource();
        }

        return $this->file;
    }

    public function page(): PageResource
    {
        if (is_null($this->page)) {
            $this->page = new PageResource();
        }

        return $this->page;
    }

    public function revision(): RevisionResource
    {
        if (is_null($this->revision)) {
            $this->revision = new RevisionResource();
        }

        return $this->revision;
    }

    public function search(): SearchResource
    {
        if (is_null($this->search)) {
            $this->search = new SearchResource();
        }

        return $this->search;
    }

}

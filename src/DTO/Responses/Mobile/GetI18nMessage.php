<?php

namespace MediawikiSdkPhp\DTO\Responses\Mobile;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class GetI18nMessage extends DataTransferObject
{
    #[MapFrom('description-add-link-title')]
    public string $descriptionAddLinkTitle;
    
    #[MapFrom('article-read-more-title')]
    public string $articleReadMoreTitle;
    
    #[MapFrom('table-title-other')]
    public string $tableTitleOther;
    
    #[MapFrom('page-edit-history')]
    public string $pageEditHistory;
    
    #[MapFrom('info-box-close-text')]
    public string $infoBoxCloseText;
    
    #[MapFrom('page-talk-page-subtitle')]
    public string $pageTalkPageSubtitle;
    
    #[MapFrom('page-issues-subtitle')]
    public string $pageIssuesSubtitle;
    
    #[MapFrom('page-talk-page')]
    public string $pageTalkPage;
    
    #[MapFrom('info-box-title')]
    public string $infoBoxTitle;
    
    #[MapFrom('view-in-browser-footer-link')]
    public string $viewInBrowserFooterLink;
    
    #[MapFrom('page-location')]
    public string $pageLocation;
    
    #[MapFrom('page-similar-titles')]
    public string $pageSimilarTitles;
    
    #[MapFrom('page-last-edited')]
    public string $pageLastEdited;
    
    #[MapFrom('article-about-title')]
    public string $articleAboutTitle;
    
    #[MapFrom('page-issues')]
    public string $pageIssues;
    
    #[MapFrom('license-footer-name')]
    public string $licenseFooterName;
    
    #[MapFrom('license-footer-text')]
    public string $licenseFooterText;
    
    #[MapFrom('page-read-in-other-languages')]
    public string $pageReadInOtherLanguages;
    
    #[MapFrom('article-edit-button')]
    public string $articleEditButton;
    
    #[MapFrom('article-edit-protected-button')]
    public string $articleEditProtectedButton;
    
    #[MapFrom('article-section-expand')]
    public string $articleSectionExpand;
    
    #[MapFrom('article-section-collapse')]
    public string $articleSectionCollapse;
    
    #[MapFrom('table-expand')]
    public string $tableExpand;
    
    #[MapFrom('table-collapse')]
    public string $tableCollapse;
    
    #[MapFrom('references-preview-header')]
    public string $referencesPreviewHeader;
}

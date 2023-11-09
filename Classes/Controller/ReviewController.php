<?php

declare(strict_types=1);

namespace GoogleBusiness\GoogleReviews\Controller;

use GoogleBusiness\GoogleReviews\Service\PlaceService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ReviewController extends ActionController
{
    protected $placeService;

    public function __construct(PlaceService $placeService)
    {
        $this->placeService = $placeService;
    }

    public function listAction(): ResponseInterface
    {
        $this->view->assign('place', $this->placeService->getPlaceRecord($this->settings));

        return $this->htmlResponse();
    }
}

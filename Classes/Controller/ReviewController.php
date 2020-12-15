<?php
declare(strict_types = 1);

namespace GoogleBusiness\GoogleReviews\Controller;

use GoogleBusiness\GoogleReviews\Service\PlaceService;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ReviewController extends ActionController
{
    /**
     * @var PlaceService
     */
    protected $placeService;

    /**
     * @param PlaceService $placeService
     */
    public function injectPlaceService(PlaceService $placeService): void
    {
        $this->placeService = $placeService;
    }

    /**
     * action list
     */
    public function listAction(): void
    {
        $this->view->assign('place', $this->placeService->getPlaceRecord($this->settings));
    }
}

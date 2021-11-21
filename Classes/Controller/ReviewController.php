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
    public function __construct(PlaceService $placeService)
    {
        $this->placeService = $placeService;
    }

    /**
     * action list
     */
    public function listAction()
    {
        $this->view->assign('place', $this->placeService->getPlaceRecord($this->settings));
    }
}

<?php
declare(strict_types = 1);

namespace GoogleBusiness\GoogleReviews\Controller;

use GoogleBusiness\GoogleReviews\Service\ReviewService;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ReviewController extends ActionController
{
    /**
     * @var ReviewService
     */
    protected $reviewService;

    /**
     * @param ReviewService $reviewService
     */
    public function injectReviewService(ReviewService $reviewService): void
    {
        $this->reviewService = $reviewService;
    }

    /**
     * action list
     */
    public function listAction(): void
    {
        $this->view->assign('reviews', $this->reviewService->getReviewRecords($this->settings));
    }
}

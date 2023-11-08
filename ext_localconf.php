<?php

declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use GoogleBusiness\GoogleReviews\Controller\ReviewController;
defined('TYPO3') or die();


ExtensionUtility::configurePlugin(
    'GoogleReviews',
    'Pi1',
    [ReviewController::class => 'list'],
    [ReviewController::class  => ''],
    ExtensionUtility::PLUGIN_TYPE_PLUGIN
);


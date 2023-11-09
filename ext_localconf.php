<?php

declare(strict_types=1);

use GoogleBusiness\GoogleReviews\Controller\ReviewController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::configurePlugin(
    'GoogleReviews',
    'Pi1',
    [ReviewController::class => 'list'],
    [ReviewController::class  => ''],
    ExtensionUtility::PLUGIN_TYPE_PLUGIN
);

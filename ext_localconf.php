<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GoogleReviews',
        'Pi1',
        [\GoogleBusiness\GoogleReviews\Controller\ReviewController::class => 'list'],
        [\GoogleBusiness\GoogleReviews\Controller\ReviewController::class  => ''],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_PLUGIN
    );
});

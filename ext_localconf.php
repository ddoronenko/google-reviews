<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GoogleBusiness.GoogleReviews',
        'Pi1',
        ['Review' => 'list'],
        ['Review' => ''],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_PLUGIN
    );
});

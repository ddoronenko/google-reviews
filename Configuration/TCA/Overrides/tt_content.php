<?php

defined('TYPO3_MODE') or die();

call_user_func(static function () {
    $extKey = 'google_reviews';

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        $extKey,
        'Configuration/TypoScript/',
        'Google reviews'
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($extKey),
        'Pi1',
        'LLL:EXT:' . $extKey . '/Resources/Private/Languages/locallang_be.xlf:plugin_pi1.title',
    );

    $pluginSignature = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToLowerCamelCase($extKey) . '_pi1');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        $pluginSignature,
        'FILE:EXT:' . $extKey . '/Configuration/FlexForms/google_reviews_pi1.xml',
        'list'
    );
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature]     = 'pi_flexform';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
});

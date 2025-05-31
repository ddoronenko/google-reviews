<?php

defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

call_user_func(static function () {
    $extKey = 'google_reviews';

    ExtensionManagementUtility::addStaticFile(
        $extKey,
        'Configuration/TypoScript/',
        'Google reviews'
    );

    $pluginSignature = ExtensionUtility::registerPlugin(
        GeneralUtility::underscoredToUpperCamelCase($extKey),
        'ReviewList',
        'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_be.xlf:plugin_pi1.title',
        'tx-googlereviews-reviewlist',
    );

    ExtensionManagementUtility::addPiFlexFormValue(
        '*',
        'FILE:EXT:' . $extKey . '/Configuration/FlexForms/ReviewList.xml',
        $pluginSignature
    );
    ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:plugin, pi_flexform',
        $pluginSignature,
        'after:palette:headers',
    );

    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature]     = 'pi_flexform';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
});

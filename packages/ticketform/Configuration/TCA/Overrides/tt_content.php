<?php

/*
 * This file is part of the TYPO3 project.
 * (c) 2022 B-Factor GmbH / 12bis3 / Sudhaus7 / code711.de
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 * The TYPO3 project - inspiring people to share!
 *
 * @copyright 2022 B-Factor GmbH / 12bis3 / Sudhaus7 / https://code711.de/
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

call_user_func(function () {
    global $TCA;

    $extensionName = strtolower(GeneralUtility::underscoredToUpperCamelCase('ticketform'));
    $pluginSignature = $extensionName . '_plugin';

    ExtensionUtility::registerPlugin('Ticketform', 'Ticketform', 'My form');
    //$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
    //$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
    //\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $extKey . '/Configuration/FlexForms/Plugin.xml');
});

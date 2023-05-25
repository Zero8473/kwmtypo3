<?php

if (!defined('TYPO3_MODE')) /*die();*/

call_user_func(function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        'template',
        'Configuration/TSconfig/site.tsconfig',
        'Seitendefinitionen Sudhaus7 Template'
    );
});

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

$EM_CONF[$_EXTKEY] = [
    'title' => 'Ticket Formular',
    'description' => 'generiert Formular zum Ticket Senden',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-12.4.99',
            'rte_ckeditor' => '11.5.0-12.4.99',
            'seo' => '11.5.0-12.4.99',
        ],
        'conflicts' => [

        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Sudhaus7\\Ticketform\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => '',
    'author_email' => '',
    'author_company' => '',
    'version' => '1.0.0',
];

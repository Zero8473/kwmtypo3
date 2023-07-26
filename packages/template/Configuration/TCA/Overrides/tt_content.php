<?php
\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (
    new \B13\Container\Tca\ContainerConfiguration(
        'b13-container-3cols', // CType
        '3 Spalten Container', // label
        'Container für 3 horizontal angerichtete Elemente', // description
        [
            [
                ['name' => '1.Spalte', 'colPos' => 201],
                ['name' => '2.Spalte', 'colPos' => 202],
                ['name' => '3.Spalte', 'colPos' => 203]
            ]
        ] // grid configuration
    )
    )
);

\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (
    new \B13\Container\Tca\ContainerConfiguration(
        'b13-container-2cols', // CType
        '2 Spalten Container', // label
        'Container für 2 horizontal angerichtete Elemente', // description
        [
            [
                ['name' => '1.Spalte', 'colPos' => 201],
                ['name' => '2.Spalte', 'colPos' => 202]
            ]
        ] // grid configuration
    )
    )
);

\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (
    new \B13\Container\Tca\ContainerConfiguration(
        'b13-container-hintergrund', // CType
        'Farblicher Hintergrund Container', // label
        'Farblicher Container für vertikal angerichtete Elemente', // description
        [
            [
                ['name' => '1.Spalte', 'colPos' => 201]
            ]
        ] // grid configuration
    )
    )
// set an optional icon configuration
#->setIcon('EXT:container_example/Resources/Public/Icons/b13-2cols-with-header-container.svg')

);


\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (
    new \B13\Container\Tca\ContainerConfiguration(
        'b13-container-akkordeon', // CType
        '1 Column Akkordeon Container', // label
        'Akkordeon Container für vertikal angerichtete Akkordeonelemente', // description
        [
            [
                [
                    'name' => '1.Spalte',
                    'colPos' => 201,
                    'allowed' => [
                        'CType' => 'text'
                    ]
                ]
            ]
        ] // grid configuration
    )
    )
// set an optional icon configuration
#->setIcon('EXT:container_example/Resources/Public/Icons/b13-2cols-with-header-container.svg')

);



\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (
    new \B13\Container\Tca\ContainerConfiguration(
        'b13-container-staffcards', // CType
        'Visitenkarten Container', // label
        'Container für Visitenkarten', // description
        [
            [
                [
                    'name' => '1.Spalte',
                    'colPos' => 201,
                    'allowed' => [
                        'CType' => 'staffcard'
                    ]
                ]

            ]
        ] // grid configuration
    )
    )
);


\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (
    new \B13\Container\Tca\ContainerConfiguration(
        'b13-container-collage', // CType
        'Container Bildercollage', // label
        'Ein Container zur Gruppierung für Bildercollagen', // description
        [
            [
                ['name' => '1.Spalte', 'colPos' => 201]
            ]
        ] // grid configuration
    )
    )
// set an optional icon configuration
#->setIcon('EXT:container_example/Resources/Public/Icons/b13-2cols-with-header-container.svg')

);



$frontendLanguageFilePrefix = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'Staffcard',
        'staffcard',
        'content-image'
    ],
    'textmedia',
    'after'
);
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['staffcard'] = 'mimetypes-x-content-text';
$GLOBALS['TCA']['tt_content']['types']['staffcard'] = [
    'showitem' => '
				--palette--;' . $frontendLanguageFilePrefix . 'palette.general;general,
				--palette--;' . $frontendLanguageFilePrefix . 'palette.headers;headers,small_text,big_text,button_text,
                bodytext;' . $frontendLanguageFilePrefix . 'bodytext_formlabel,
            --div--;' . $frontendLanguageFilePrefix . 'tabs.images,
				image,
            --div--;' . $frontendLanguageFilePrefix . 'tabs.appearance,
				--palette--;' . $frontendLanguageFilePrefix . 'palette.appearanceLinks;appearanceLinks,
                --palette--;' . $frontendLanguageFilePrefix . 'palette.access;access,
            LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xlf:gridElements, tx_gridelements_container, tx_gridelements_columns
    ',
    'columnsOverrides' => ['bodytext' => ['config' => ['enableRichtext' => true]]]
];

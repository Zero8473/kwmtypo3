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

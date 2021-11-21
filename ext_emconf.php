<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Google Reviews',
    'description' => 'TYPO3 plugin displays five (most-relevant) Google reviews according to selected Place ID.
        Extension provides flexible configurations for better user experience.',
    'category' => 'fe',
    'version' => '2.0.0',
    'state' => 'stable',
    'clearcacheonload' => true,
    'author' => 'Dmytro Doronenko',
    'author_email' => '',
    'author_company' => '',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.14-11.5.99',
        ]
    ],
];

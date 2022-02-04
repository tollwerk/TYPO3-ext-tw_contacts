<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Tollwerk Contacts',
    'description' => 'Manage, search and list contact persons.',
    'category' => 'plugin',
    'author' => 'Klaus Fiedler',
    'author_email' => 'klaus@tollwerk.de',
    'author_company' => 'tollwerk GmbH',
    'version' => '0.0.0',
    'state' => 'stable',
    'constraints' => [
        'depends' => [
            'typo3' => '11.4.0-11.5.99',
            'fluid_styled_content' => '11.4.0-11.5.99'
        ],
        'conflicts' => [
        ],
    ],
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1
];

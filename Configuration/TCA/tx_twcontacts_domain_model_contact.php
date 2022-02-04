<?php

return [
    'ctrl'      => [
        'title'           => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact',
        'label'           => 'family_name',
        'label_alt'       => 'given_name',
        'label_alt_force' => true,
        'tstamp'          => 'tstamp',
        'crdate'          => 'crdate',
        'cruser_id'       => 'cruser_id',
        'default_sortby'  => 'family_name ASC',
        'dividers2tabs'   => true,
        'delete'          => 'deleted',
        'enablecolumns'   => [
            'disabled'  => 'hidden',
            'starttime' => 'starttime',
            'endtime'   => 'endtime',
        ],
        'searchFields'    => 'given_name,family_name,full_name,email,role,organization,description,address',
        'iconfile'        => 'EXT:tw_contacts/Resources/Public/Icons/Contact.png'
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden, given_name, family_name, full_name, role, organization, phone, phone_mobile, fax, email',
    ],
    'palettes'  => [
        'name'            => ['showitem' => 'given_name, family_name, full_name'],
        'role'            => ['showitem' => 'organization, role'],
        'contact_web'     => ['showitem' => 'email, website'],
        'contact_phone'   => ['showitem' => 'phone, phone_mobile, phone_private'],
        'address'         => ['showitem' => 'address'],
        'latLon'          => ['showitem' => 'latitude, longitude'],
        'timeRestriction' => ['showitem' => 'starttime, endtime'],
    ],
    'types'     => [
        '1' => [
            'showitem' => '
            --div--;LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tab.general, 
                --palette--;;name,
                title,
                gender,
                description,
                portrait,
            --div--;LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tab.contact,
                --palette--;;contact_web,
                --palette--;;contact_phone,
                fax,
            --div--;LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tab.location,   
                --palette--;;role,
                --palette--;;address,
                --palette--;;latLon,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories, categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, --palette--;;timeRestriction',
        ],
    ],
    'columns'   => [
        // System
        'hidden'        => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.enabled',
            'config'  => [
                'type'        => 'check',
                'renderType ' => 'checkboxToggle',
                'items'       => [
                    [
                        '',
                        'invertStateDisplay' => true,
                    ]
                ],
            ],
        ],
        'starttime'     => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config'  => [
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'eval'       => 'datetime,int',
                'default'    => 0,
            ],
        ],
        'endtime'       => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config'  => [
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'eval'       => 'datetime,int',
                'default'    => 0,
            ],
        ],

        // Basic information
        'gender'        => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.gender',
            'config'  => [
                'type'       => 'select',
                'renderType' => 'selectSingle',
                'items'      => [
                    ['', 0],
                    [
                        'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.gender.' . \Tollwerk\TwContacts\Domain\Model\Contact::GENDER_MALE,
                        \Tollwerk\TwContacts\Domain\Model\Contact::GENDER_MALE
                    ],
                    [
                        'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.gender.' . \Tollwerk\TwContacts\Domain\Model\Contact::GENDER_FEMALE,
                        \Tollwerk\TwContacts\Domain\Model\Contact::GENDER_FEMALE,
                    ],
                    [
                        'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.gender.' . \Tollwerk\TwContacts\Domain\Model\Contact::GENDER_DIVERSE,
                        \Tollwerk\TwContacts\Domain\Model\Contact::GENDER_DIVERSE,
                    ],
                ],
            ],
        ],
        'title'         => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.title',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'given_name'    => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.given_name',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required,trim'
            ],
        ],
        'family_name'   => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.family_name',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'full_name'     => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.full_name',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'portrait'      => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.portrait',
            'config'  => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'portrait',
                [
                    'appearance'    => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'foreign_types' => [
                        '0'                                                 => [
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT        => [
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE       => [
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO       => [
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO       => [
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ]
                    ],
                    'maxitems'      => 1,
                    'minitems'      => 0
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'description'   => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.description',
            'config'  => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
            ]
        ],

        // Contact
        'phone'         => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.phone',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'phone_private' => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.phone_private',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'phone_mobile'  => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.phone_mobile',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'fax'           => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.fax',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'email'         => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.email',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,email'
            ],
        ],
        'website'       => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.website',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],

        // Address and organization
        'organization'  => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.organization',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'role'          => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.role',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'address'       => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.address',
            'config'  => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 5,
            ]
        ],
        'latitude'      => [
            'exclude'     => true,
            'label'       => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.latitude',
            'description' => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.latitude.description',
            'config'      => [
                'type'    => 'input',
                'size'    => 30,
                'eval'    => 'null,trim',
                'default' => null,
            ],
        ],
        'longitude'     => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.longitude',
            'config'  => [
                'type'    => 'input',
                'size'    => 30,
                'eval'    => 'null,trim',
                'default' => null,
            ],
        ],
        'distance'      => [
            'config' => [
                'type' => 'passthrough'
            ],
        ],

        // Misc
        'categories'    => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:tx_twcontacts_domain_model_contact.categories',
            'config'  => [
                'type'              => 'select',
                'renderType'        => 'selectTree',
                'foreign_table'     => 'sys_category',
                'MM'                => 'sys_category_record_mm',
                'MM_match_fields'   => [
                    'fieldname'  => 'categories',
                    'tablenames' => 'tx_twcontacts_domain_model_contact'
                ],
                'MM_opposite_field' => 'items',
                'size'              => 20,
                'treeConfig'        => [
                    'parentField' => 'items',
                    'appearance'  => [
                        'expandAll'  => true,
                        'showHeader' => true,
                    ],
                ],
            ],
        ],
    ],
];


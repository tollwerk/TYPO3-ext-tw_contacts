<?php

// With TYPO3 11.4, ext_localconf.php and ext_tables.php are scoped into the global namespace.
// Therefore use statements can now be used inside these files.
// For compatibility with lower TYPO3 versions, don't use use-statements here!
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

// Prevent Script from being called directly
defined('TYPO3') || die();

// encapsulate all locally defined variables
(function () {
    // Configure plugins
    ExtensionUtility::configurePlugin(
        'TwContacts',
        'Contacts',
        [
            \Tollwerk\TwContacts\Controller\ContactController::class => 'list',
        ],
        [
            \Tollwerk\TwContacts\Controller\ContactController::class => 'list',
        ]
    );
})();

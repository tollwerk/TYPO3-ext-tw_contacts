<?php
// With TYPO3 11.4, ext_localconf.php and ext_tables.php are scoped into the global namespace.
// Therefore use statements can now be used inside these files.
// For compatibility with lower TYPO3 versions, don't use use-statements here!
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

(function () {
    // Register plugins for backend users
    ExtensionUtility::registerPlugin(
        'TwContacts',
        'Contacts',
        'LLL:EXT:tw_contacts/Resources/Private/Language/locallang_db.xlf:plugin.contacts',
        'EXT:tw_contacts/Resources/Public/Icons/Contact.png',
    );
})();

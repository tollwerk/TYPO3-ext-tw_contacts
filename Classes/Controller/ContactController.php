<?php
/**
 * Contact
 *
 * @category   Tollwerk
 * @package    Tollwerk\TwContacts
 * @author     Klaus Fiedler <klaus@tollwerk.de>
 * @license    MIT https://opensource.org/licenses/MIT
 * @link       https://tollwerk.de
 */

namespace Tollwerk\TwContacts\Controller;

use Tollwerk\TwContacts\Domain\Repository\CategoryRepository;
use Tollwerk\TwContacts\Domain\Repository\ContactRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Frontend\Category\Collection\CategoryCollection;

/**
 * Class ContactController
 *
 * @package  Tollwerk\TwContacts
 */
class ContactController extends ActionController
{
    /**
     * ContactRepository
     *
     * @var ContactRepository
     */
    protected ContactRepository $contactRepository;

    /**
     * CategoryRepository
     *
     * @var CategoryRepository
     */
    protected CategoryRepository $categoryRepository;

    /**
     * Constructor
     *
     * @param ContactRepository  $contactRepository  The ContactRepository
     * @param CategoryRepository $categoryRepository The CategoryRepository
     */
    public function __construct(ContactRepository $contactRepository, CategoryRepository $categoryRepository)
    {
        $this->contactRepository  = $contactRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * List and filter contacts
     *
     * @param array  $filter Filter values
     * @param string $search Search string
     * @param int    $sort   Sort. See ContactRepository::SORT_FAMILY_NAME_ASC etc.
     */
    public function listAction(
        array $filter = [],
        string $search = '',
        int $sort = ContactRepository::SORT_FAMILY_NAME_ASC
    ) {
        $this->view->assignMultiple([
            'sort'                => $sort,
            'filter'              => $filter,
            'search'              => $search,
            'availableCategories' => $this->categoryRepository->findAssigned(),
            'contacts'            => $this->contactRepository->findByFilterSearch($filter, $search, $sort),
        ]);
    }
}

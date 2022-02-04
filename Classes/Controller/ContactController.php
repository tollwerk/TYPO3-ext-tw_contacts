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

use Tollwerk\TwContacts\Domain\Repository\ContactRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

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
     * Constructor
     *
     * @param ContactRepository $contactRepository
     */
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * List and filter contacts
     *
     * @param array $filter
     */
    public function listAction(array $filter = []) {
        $this->view->assign('contacts', $this->contactRepository->findAll());
    }
}

<?php
/**
 * ContactRepository
 *
 * @category   Tollwerk
 * @package    Tollwerk\TwContacts
 * @author     Klaus Fiedler <klaus@tollwerk.de>
 * @license    MIT https://opensource.org/licenses/MIT
 * @link       https://tollwerk.de
 */

namespace Tollwerk\TwContacts\Domain\Repository;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Driver\Exception;
use Tollwerk\TwContacts\Domain\Model\Contact;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Class ContactRepository
 *
 * @package  Tollwerk\TwContacts
 */
class ContactRepository extends Repository
{
    const SORT_FAMILY_NAME_ASC = 1;
    const SORT_FAMILY_NAME_DESC = 2;

    /**
     * Available sorting
     * like [ContactRepository::SORT_FAMILY_NAME_ASC => [0 => 'family_name', 1 => 'asc']]
     *
     * @var string[][]
     */
    public static $sort = [
        self::SORT_FAMILY_NAME_ASC  => ['family_name', 'asc',],
        self::SORT_FAMILY_NAME_DESC => ['family_name', 'desc',],
    ];

    /**
     * Default ordering
     *
     * @var array
     */
    protected $defaultOrderings = [
        'family_name' => QueryInterface::ORDER_ASCENDING
    ];

    /**
     * DataMapper
     *
     * @var DataMapper
     */
    protected DataMapper $dataMapper;

    /**
     * Inject DataMapper
     *
     * @param DataMapper $dataMapper
     */
    public function injectPropertyMapper(DataMapper $dataMapper)
    {
        $this->dataMapper = $dataMapper;
    }

    /**
     * @param array  $filter
     * @param string $search
     * @param int    $sort Sort. See ContactRepository::SORT_FAMILY_NAME_ASC etc.
     *
     * @return array
     * @throws DBALException
     * @throws Exception
     */
    public function findByFilterSearch(
        array $filter = [],
        string $search = '',
        int $sort = ContactRepository::SORT_FAMILY_NAME_ASC
    ): array {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
                                      ->getQueryBuilderForTable('tx_twcontacts_domain_model_contact');

        // Select statement.
        $queryBuilder->select('*')
                     ->from('tx_twcontacts_domain_model_contact', 'contact');

        // Add search terms.
        if ($search) {
            $searchNamedParameter = $queryBuilder->createNamedParameter('%' . $search . '%');
            $queryBuilder->andWhere($queryBuilder->expr()->orX(
                $queryBuilder->expr()->like('contact.given_name', $searchNamedParameter),
                $queryBuilder->expr()->like('contact.family_name', $searchNamedParameter),
                $queryBuilder->expr()->like('contact.full_name', $searchNamedParameter)
            ));
        }

        // Add category filter.
        if (!empty($filter['category'])) {
            $queryBuilder->innerJoin(
                'contact',
                'sys_category_record_mm',
                'cat_mm',
                $queryBuilder->expr()->andX(
                    $queryBuilder->expr()->eq(
                        'cat_mm.uid_foreign',
                        $queryBuilder->quoteIdentifier('contact.uid')
                    ),
                    $queryBuilder->expr()
                                 ->in('cat_mm.uid_local', $queryBuilder->createNamedParameter($filter['category']))
                )
            );
        }

        // Sort
        $useSort = self::$sort[$sort] ?? self::$sort[self::SORT_FAMILY_NAME_ASC];
        $queryBuilder->orderBy($useSort[0], $useSort[1]);

        // Execute query.
        $result = $queryBuilder->execute()->fetchAllAssociative();

        // Create extbase objects from results and return.
        return $this->dataMapper->map(Contact::class, $result);
    }
}

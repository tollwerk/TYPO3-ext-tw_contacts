<?php
/**
 * CategoryRepository
 *
 * @category   Tollwerk
 * @package    Tollwerk\TwContacts
 * @author     Klaus Fiedler <klaus@tollwerk.de>
 * @license    MIT https://opensource.org/licenses/MIT
 * @link       https://tollwerk.de
 */

namespace Tollwerk\TwContacts\Domain\Repository;

use \Doctrine\DBAL\Driver\Exception as DBALDriverException;
use \Exception;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class CategoryRepository
 *
 * @package  Tollwerk\TwContacts
 */
class CategoryRepository extends Repository
{
    /**
     * Return Categories assigned to contacts
     *
     * @return array
     * @throws Exception
     * @throws DBALDriverException
     */
    public function findAssigned(): array
    {
        $now = time();

        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
                                      ->getQueryBuilderForTable('sys_category_record_mm');

        $queryBuilder->select('category.uid', 'category.title')
                     ->from('sys_category_record_mm', 'mm')
                     ->innerJoin(
                         'mm',
                         'sys_category',
                         'category',
                         $queryBuilder->expr()->eq(
                             'mm.uid_local',
                             $queryBuilder->quoteIdentifier('category.uid')
                         )
                     )
                     ->innerJoin(
                         'mm',
                         'tx_twcontacts_domain_model_contact',
                         'contact',
                         $queryBuilder->expr()->andX(
                             $queryBuilder->expr()->eq(
                                 'mm.uid_foreign',
                                 $queryBuilder->quoteIdentifier('contact.uid')
                             )
                         )
                     )
                     ->where($queryBuilder->expr()->eq('mm.tablenames',
                         $queryBuilder->quote('tx_twcontacts_domain_model_contact')))
                     ->groupBy('mm.uid_local');

        return $queryBuilder->execute()->fetchAllAssociative();
    }

}

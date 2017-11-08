<?php

namespace Base;

use \Constellations as ChildConstellations;
use \ConstellationsQuery as ChildConstellationsQuery;
use \Exception;
use \PDO;
use Map\ConstellationsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'constellations' table.
 *
 *
 *
 * @method     ChildConstellationsQuery orderByConstellationsId($order = Criteria::ASC) Order by the constellations_id column
 *
 * @method     ChildConstellationsQuery groupByConstellationsId() Group by the constellations_id column
 *
 * @method     ChildConstellationsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildConstellationsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildConstellationsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildConstellationsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildConstellationsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildConstellationsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildConstellations findOne(ConnectionInterface $con = null) Return the first ChildConstellations matching the query
 * @method     ChildConstellations findOneOrCreate(ConnectionInterface $con = null) Return the first ChildConstellations matching the query, or a new ChildConstellations object populated from the query conditions when no match is found
 *
 * @method     ChildConstellations findOneByConstellationsId(int $constellations_id) Return the first ChildConstellations filtered by the constellations_id column *

 * @method     ChildConstellations requirePk($key, ConnectionInterface $con = null) Return the ChildConstellations by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildConstellations requireOne(ConnectionInterface $con = null) Return the first ChildConstellations matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildConstellations requireOneByConstellationsId(int $constellations_id) Return the first ChildConstellations filtered by the constellations_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildConstellations[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildConstellations objects based on current ModelCriteria
 * @method     ChildConstellations[]|ObjectCollection findByConstellationsId(int $constellations_id) Return ChildConstellations objects filtered by the constellations_id column
 * @method     ChildConstellations[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ConstellationsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ConstellationsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Constellations', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildConstellationsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildConstellationsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildConstellationsQuery) {
            return $criteria;
        }
        $query = new ChildConstellationsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildConstellations|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ConstellationsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ConstellationsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildConstellations A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT constellations_id FROM constellations WHERE constellations_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildConstellations $obj */
            $obj = new ChildConstellations();
            $obj->hydrate($row);
            ConstellationsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildConstellations|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildConstellationsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ConstellationsTableMap::COL_CONSTELLATIONS_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildConstellationsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ConstellationsTableMap::COL_CONSTELLATIONS_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the constellations_id column
     *
     * Example usage:
     * <code>
     * $query->filterByConstellationsId(1234); // WHERE constellations_id = 1234
     * $query->filterByConstellationsId(array(12, 34)); // WHERE constellations_id IN (12, 34)
     * $query->filterByConstellationsId(array('min' => 12)); // WHERE constellations_id > 12
     * </code>
     *
     * @param     mixed $constellationsId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildConstellationsQuery The current query, for fluid interface
     */
    public function filterByConstellationsId($constellationsId = null, $comparison = null)
    {
        if (is_array($constellationsId)) {
            $useMinMax = false;
            if (isset($constellationsId['min'])) {
                $this->addUsingAlias(ConstellationsTableMap::COL_CONSTELLATIONS_ID, $constellationsId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($constellationsId['max'])) {
                $this->addUsingAlias(ConstellationsTableMap::COL_CONSTELLATIONS_ID, $constellationsId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ConstellationsTableMap::COL_CONSTELLATIONS_ID, $constellationsId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildConstellations $constellations Object to remove from the list of results
     *
     * @return $this|ChildConstellationsQuery The current query, for fluid interface
     */
    public function prune($constellations = null)
    {
        if ($constellations) {
            $this->addUsingAlias(ConstellationsTableMap::COL_CONSTELLATIONS_ID, $constellations->getConstellationsId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the constellations table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ConstellationsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ConstellationsTableMap::clearInstancePool();
            ConstellationsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ConstellationsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ConstellationsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ConstellationsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ConstellationsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ConstellationsQuery

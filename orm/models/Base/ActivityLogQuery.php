<?php

namespace Base;

use \ActivityLog as ChildActivityLog;
use \ActivityLogQuery as ChildActivityLogQuery;
use \Exception;
use \PDO;
use Map\ActivityLogTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'activity_log' table.
 *
 *
 *
 * @method     ChildActivityLogQuery orderByLogId($order = Criteria::ASC) Order by the log_id column
 * @method     ChildActivityLogQuery orderByStartTime($order = Criteria::ASC) Order by the start_time column
 * @method     ChildActivityLogQuery orderByEndTime($order = Criteria::ASC) Order by the end_time column
 * @method     ChildActivityLogQuery orderByActivity($order = Criteria::ASC) Order by the activity column
 * @method     ChildActivityLogQuery orderByObjectId($order = Criteria::ASC) Order by the object_id column
 * @method     ChildActivityLogQuery orderByApiPages($order = Criteria::ASC) Order by the api_pages column
 *
 * @method     ChildActivityLogQuery groupByLogId() Group by the log_id column
 * @method     ChildActivityLogQuery groupByStartTime() Group by the start_time column
 * @method     ChildActivityLogQuery groupByEndTime() Group by the end_time column
 * @method     ChildActivityLogQuery groupByActivity() Group by the activity column
 * @method     ChildActivityLogQuery groupByObjectId() Group by the object_id column
 * @method     ChildActivityLogQuery groupByApiPages() Group by the api_pages column
 *
 * @method     ChildActivityLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildActivityLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildActivityLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildActivityLogQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildActivityLogQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildActivityLogQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildActivityLog findOne(ConnectionInterface $con = null) Return the first ChildActivityLog matching the query
 * @method     ChildActivityLog findOneOrCreate(ConnectionInterface $con = null) Return the first ChildActivityLog matching the query, or a new ChildActivityLog object populated from the query conditions when no match is found
 *
 * @method     ChildActivityLog findOneByLogId(int $log_id) Return the first ChildActivityLog filtered by the log_id column
 * @method     ChildActivityLog findOneByStartTime(string $start_time) Return the first ChildActivityLog filtered by the start_time column
 * @method     ChildActivityLog findOneByEndTime(string $end_time) Return the first ChildActivityLog filtered by the end_time column
 * @method     ChildActivityLog findOneByActivity(string $activity) Return the first ChildActivityLog filtered by the activity column
 * @method     ChildActivityLog findOneByObjectId(int $object_id) Return the first ChildActivityLog filtered by the object_id column
 * @method     ChildActivityLog findOneByApiPages(int $api_pages) Return the first ChildActivityLog filtered by the api_pages column *

 * @method     ChildActivityLog requirePk($key, ConnectionInterface $con = null) Return the ChildActivityLog by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActivityLog requireOne(ConnectionInterface $con = null) Return the first ChildActivityLog matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildActivityLog requireOneByLogId(int $log_id) Return the first ChildActivityLog filtered by the log_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActivityLog requireOneByStartTime(string $start_time) Return the first ChildActivityLog filtered by the start_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActivityLog requireOneByEndTime(string $end_time) Return the first ChildActivityLog filtered by the end_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActivityLog requireOneByActivity(string $activity) Return the first ChildActivityLog filtered by the activity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActivityLog requireOneByObjectId(int $object_id) Return the first ChildActivityLog filtered by the object_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActivityLog requireOneByApiPages(int $api_pages) Return the first ChildActivityLog filtered by the api_pages column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildActivityLog[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildActivityLog objects based on current ModelCriteria
 * @method     ChildActivityLog[]|ObjectCollection findByLogId(int $log_id) Return ChildActivityLog objects filtered by the log_id column
 * @method     ChildActivityLog[]|ObjectCollection findByStartTime(string $start_time) Return ChildActivityLog objects filtered by the start_time column
 * @method     ChildActivityLog[]|ObjectCollection findByEndTime(string $end_time) Return ChildActivityLog objects filtered by the end_time column
 * @method     ChildActivityLog[]|ObjectCollection findByActivity(string $activity) Return ChildActivityLog objects filtered by the activity column
 * @method     ChildActivityLog[]|ObjectCollection findByObjectId(int $object_id) Return ChildActivityLog objects filtered by the object_id column
 * @method     ChildActivityLog[]|ObjectCollection findByApiPages(int $api_pages) Return ChildActivityLog objects filtered by the api_pages column
 * @method     ChildActivityLog[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ActivityLogQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ActivityLogQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ActivityLog', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildActivityLogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildActivityLogQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildActivityLogQuery) {
            return $criteria;
        }
        $query = new ChildActivityLogQuery();
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
     * @return ChildActivityLog|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ActivityLogTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ActivityLogTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildActivityLog A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT log_id, start_time, end_time, activity, object_id, api_pages FROM activity_log WHERE log_id = :p0';
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
            /** @var ChildActivityLog $obj */
            $obj = new ChildActivityLog();
            $obj->hydrate($row);
            ActivityLogTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildActivityLog|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildActivityLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ActivityLogTableMap::COL_LOG_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildActivityLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ActivityLogTableMap::COL_LOG_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the log_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLogId(1234); // WHERE log_id = 1234
     * $query->filterByLogId(array(12, 34)); // WHERE log_id IN (12, 34)
     * $query->filterByLogId(array('min' => 12)); // WHERE log_id > 12
     * </code>
     *
     * @param     mixed $logId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActivityLogQuery The current query, for fluid interface
     */
    public function filterByLogId($logId = null, $comparison = null)
    {
        if (is_array($logId)) {
            $useMinMax = false;
            if (isset($logId['min'])) {
                $this->addUsingAlias(ActivityLogTableMap::COL_LOG_ID, $logId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($logId['max'])) {
                $this->addUsingAlias(ActivityLogTableMap::COL_LOG_ID, $logId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActivityLogTableMap::COL_LOG_ID, $logId, $comparison);
    }

    /**
     * Filter the query on the start_time column
     *
     * Example usage:
     * <code>
     * $query->filterByStartTime('2011-03-14'); // WHERE start_time = '2011-03-14'
     * $query->filterByStartTime('now'); // WHERE start_time = '2011-03-14'
     * $query->filterByStartTime(array('max' => 'yesterday')); // WHERE start_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $startTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActivityLogQuery The current query, for fluid interface
     */
    public function filterByStartTime($startTime = null, $comparison = null)
    {
        if (is_array($startTime)) {
            $useMinMax = false;
            if (isset($startTime['min'])) {
                $this->addUsingAlias(ActivityLogTableMap::COL_START_TIME, $startTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startTime['max'])) {
                $this->addUsingAlias(ActivityLogTableMap::COL_START_TIME, $startTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActivityLogTableMap::COL_START_TIME, $startTime, $comparison);
    }

    /**
     * Filter the query on the end_time column
     *
     * Example usage:
     * <code>
     * $query->filterByEndTime('2011-03-14'); // WHERE end_time = '2011-03-14'
     * $query->filterByEndTime('now'); // WHERE end_time = '2011-03-14'
     * $query->filterByEndTime(array('max' => 'yesterday')); // WHERE end_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $endTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActivityLogQuery The current query, for fluid interface
     */
    public function filterByEndTime($endTime = null, $comparison = null)
    {
        if (is_array($endTime)) {
            $useMinMax = false;
            if (isset($endTime['min'])) {
                $this->addUsingAlias(ActivityLogTableMap::COL_END_TIME, $endTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endTime['max'])) {
                $this->addUsingAlias(ActivityLogTableMap::COL_END_TIME, $endTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActivityLogTableMap::COL_END_TIME, $endTime, $comparison);
    }

    /**
     * Filter the query on the activity column
     *
     * Example usage:
     * <code>
     * $query->filterByActivity('fooValue');   // WHERE activity = 'fooValue'
     * $query->filterByActivity('%fooValue%', Criteria::LIKE); // WHERE activity LIKE '%fooValue%'
     * </code>
     *
     * @param     string $activity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActivityLogQuery The current query, for fluid interface
     */
    public function filterByActivity($activity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($activity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActivityLogTableMap::COL_ACTIVITY, $activity, $comparison);
    }

    /**
     * Filter the query on the object_id column
     *
     * Example usage:
     * <code>
     * $query->filterByObjectId(1234); // WHERE object_id = 1234
     * $query->filterByObjectId(array(12, 34)); // WHERE object_id IN (12, 34)
     * $query->filterByObjectId(array('min' => 12)); // WHERE object_id > 12
     * </code>
     *
     * @param     mixed $objectId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActivityLogQuery The current query, for fluid interface
     */
    public function filterByObjectId($objectId = null, $comparison = null)
    {
        if (is_array($objectId)) {
            $useMinMax = false;
            if (isset($objectId['min'])) {
                $this->addUsingAlias(ActivityLogTableMap::COL_OBJECT_ID, $objectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($objectId['max'])) {
                $this->addUsingAlias(ActivityLogTableMap::COL_OBJECT_ID, $objectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActivityLogTableMap::COL_OBJECT_ID, $objectId, $comparison);
    }

    /**
     * Filter the query on the api_pages column
     *
     * Example usage:
     * <code>
     * $query->filterByApiPages(1234); // WHERE api_pages = 1234
     * $query->filterByApiPages(array(12, 34)); // WHERE api_pages IN (12, 34)
     * $query->filterByApiPages(array('min' => 12)); // WHERE api_pages > 12
     * </code>
     *
     * @param     mixed $apiPages The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActivityLogQuery The current query, for fluid interface
     */
    public function filterByApiPages($apiPages = null, $comparison = null)
    {
        if (is_array($apiPages)) {
            $useMinMax = false;
            if (isset($apiPages['min'])) {
                $this->addUsingAlias(ActivityLogTableMap::COL_API_PAGES, $apiPages['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($apiPages['max'])) {
                $this->addUsingAlias(ActivityLogTableMap::COL_API_PAGES, $apiPages['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActivityLogTableMap::COL_API_PAGES, $apiPages, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildActivityLog $activityLog Object to remove from the list of results
     *
     * @return $this|ChildActivityLogQuery The current query, for fluid interface
     */
    public function prune($activityLog = null)
    {
        if ($activityLog) {
            $this->addUsingAlias(ActivityLogTableMap::COL_LOG_ID, $activityLog->getLogId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the activity_log table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ActivityLogTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ActivityLogTableMap::clearInstancePool();
            ActivityLogTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ActivityLogTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ActivityLogTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ActivityLogTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ActivityLogTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ActivityLogQuery

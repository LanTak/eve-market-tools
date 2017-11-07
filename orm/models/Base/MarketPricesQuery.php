<?php

namespace Base;

use \MarketPrices as ChildMarketPrices;
use \MarketPricesQuery as ChildMarketPricesQuery;
use \Exception;
use Map\MarketPricesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'market_prices' table.
 *
 *
 *
 * @method     ChildMarketPricesQuery orderByTypeId($order = Criteria::ASC) Order by the type_id column
 * @method     ChildMarketPricesQuery orderByAveragePrice($order = Criteria::ASC) Order by the average_price column
 * @method     ChildMarketPricesQuery orderByAdjustedPrice($order = Criteria::ASC) Order by the adjusted_price column
 *
 * @method     ChildMarketPricesQuery groupByTypeId() Group by the type_id column
 * @method     ChildMarketPricesQuery groupByAveragePrice() Group by the average_price column
 * @method     ChildMarketPricesQuery groupByAdjustedPrice() Group by the adjusted_price column
 *
 * @method     ChildMarketPricesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMarketPricesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMarketPricesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMarketPricesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMarketPricesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMarketPricesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMarketPrices findOne(ConnectionInterface $con = null) Return the first ChildMarketPrices matching the query
 * @method     ChildMarketPrices findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMarketPrices matching the query, or a new ChildMarketPrices object populated from the query conditions when no match is found
 *
 * @method     ChildMarketPrices findOneByTypeId(int $type_id) Return the first ChildMarketPrices filtered by the type_id column
 * @method     ChildMarketPrices findOneByAveragePrice(double $average_price) Return the first ChildMarketPrices filtered by the average_price column
 * @method     ChildMarketPrices findOneByAdjustedPrice(double $adjusted_price) Return the first ChildMarketPrices filtered by the adjusted_price column *

 * @method     ChildMarketPrices requirePk($key, ConnectionInterface $con = null) Return the ChildMarketPrices by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMarketPrices requireOne(ConnectionInterface $con = null) Return the first ChildMarketPrices matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMarketPrices requireOneByTypeId(int $type_id) Return the first ChildMarketPrices filtered by the type_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMarketPrices requireOneByAveragePrice(double $average_price) Return the first ChildMarketPrices filtered by the average_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMarketPrices requireOneByAdjustedPrice(double $adjusted_price) Return the first ChildMarketPrices filtered by the adjusted_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMarketPrices[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMarketPrices objects based on current ModelCriteria
 * @method     ChildMarketPrices[]|ObjectCollection findByTypeId(int $type_id) Return ChildMarketPrices objects filtered by the type_id column
 * @method     ChildMarketPrices[]|ObjectCollection findByAveragePrice(double $average_price) Return ChildMarketPrices objects filtered by the average_price column
 * @method     ChildMarketPrices[]|ObjectCollection findByAdjustedPrice(double $adjusted_price) Return ChildMarketPrices objects filtered by the adjusted_price column
 * @method     ChildMarketPrices[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MarketPricesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MarketPricesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MarketPrices', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMarketPricesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMarketPricesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMarketPricesQuery) {
            return $criteria;
        }
        $query = new ChildMarketPricesQuery();
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
     * @return ChildMarketPrices|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The MarketPrices object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The MarketPrices object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildMarketPricesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The MarketPrices object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMarketPricesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The MarketPrices object has no primary key');
    }

    /**
     * Filter the query on the type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeId(1234); // WHERE type_id = 1234
     * $query->filterByTypeId(array(12, 34)); // WHERE type_id IN (12, 34)
     * $query->filterByTypeId(array('min' => 12)); // WHERE type_id > 12
     * </code>
     *
     * @param     mixed $typeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMarketPricesQuery The current query, for fluid interface
     */
    public function filterByTypeId($typeId = null, $comparison = null)
    {
        if (is_array($typeId)) {
            $useMinMax = false;
            if (isset($typeId['min'])) {
                $this->addUsingAlias(MarketPricesTableMap::COL_TYPE_ID, $typeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typeId['max'])) {
                $this->addUsingAlias(MarketPricesTableMap::COL_TYPE_ID, $typeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketPricesTableMap::COL_TYPE_ID, $typeId, $comparison);
    }

    /**
     * Filter the query on the average_price column
     *
     * Example usage:
     * <code>
     * $query->filterByAveragePrice(1234); // WHERE average_price = 1234
     * $query->filterByAveragePrice(array(12, 34)); // WHERE average_price IN (12, 34)
     * $query->filterByAveragePrice(array('min' => 12)); // WHERE average_price > 12
     * </code>
     *
     * @param     mixed $averagePrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMarketPricesQuery The current query, for fluid interface
     */
    public function filterByAveragePrice($averagePrice = null, $comparison = null)
    {
        if (is_array($averagePrice)) {
            $useMinMax = false;
            if (isset($averagePrice['min'])) {
                $this->addUsingAlias(MarketPricesTableMap::COL_AVERAGE_PRICE, $averagePrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($averagePrice['max'])) {
                $this->addUsingAlias(MarketPricesTableMap::COL_AVERAGE_PRICE, $averagePrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketPricesTableMap::COL_AVERAGE_PRICE, $averagePrice, $comparison);
    }

    /**
     * Filter the query on the adjusted_price column
     *
     * Example usage:
     * <code>
     * $query->filterByAdjustedPrice(1234); // WHERE adjusted_price = 1234
     * $query->filterByAdjustedPrice(array(12, 34)); // WHERE adjusted_price IN (12, 34)
     * $query->filterByAdjustedPrice(array('min' => 12)); // WHERE adjusted_price > 12
     * </code>
     *
     * @param     mixed $adjustedPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMarketPricesQuery The current query, for fluid interface
     */
    public function filterByAdjustedPrice($adjustedPrice = null, $comparison = null)
    {
        if (is_array($adjustedPrice)) {
            $useMinMax = false;
            if (isset($adjustedPrice['min'])) {
                $this->addUsingAlias(MarketPricesTableMap::COL_ADJUSTED_PRICE, $adjustedPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adjustedPrice['max'])) {
                $this->addUsingAlias(MarketPricesTableMap::COL_ADJUSTED_PRICE, $adjustedPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketPricesTableMap::COL_ADJUSTED_PRICE, $adjustedPrice, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMarketPrices $marketPrices Object to remove from the list of results
     *
     * @return $this|ChildMarketPricesQuery The current query, for fluid interface
     */
    public function prune($marketPrices = null)
    {
        if ($marketPrices) {
            throw new LogicException('MarketPrices object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the market_prices table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MarketPricesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MarketPricesTableMap::clearInstancePool();
            MarketPricesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MarketPricesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MarketPricesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MarketPricesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MarketPricesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MarketPricesQuery

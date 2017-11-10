<?php

namespace Base;

use \Orders as ChildOrders;
use \OrdersQuery as ChildOrdersQuery;
use \Exception;
use \PDO;
use Map\OrdersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'orders' table.
 *
 *
 *
 * @method     ChildOrdersQuery orderByMyOrderId($order = Criteria::ASC) Order by the my_order_id column
 * @method     ChildOrdersQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOrdersQuery orderByRegionId($order = Criteria::ASC) Order by the region_id column
 * @method     ChildOrdersQuery orderByTypeId($order = Criteria::ASC) Order by the type_id column
 * @method     ChildOrdersQuery orderByLocationId($order = Criteria::ASC) Order by the location_id column
 * @method     ChildOrdersQuery orderByVolumeTotal($order = Criteria::ASC) Order by the volume_total column
 * @method     ChildOrdersQuery orderByVolumeRemain($order = Criteria::ASC) Order by the volume_remain column
 * @method     ChildOrdersQuery orderByMinVolume($order = Criteria::ASC) Order by the min_volume column
 * @method     ChildOrdersQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildOrdersQuery orderByIsBuyOrder($order = Criteria::ASC) Order by the is_buy_order column
 * @method     ChildOrdersQuery orderByDuration($order = Criteria::ASC) Order by the duration column
 * @method     ChildOrdersQuery orderByIssued($order = Criteria::ASC) Order by the issued column
 *
 * @method     ChildOrdersQuery groupByMyOrderId() Group by the my_order_id column
 * @method     ChildOrdersQuery groupByOrderId() Group by the order_id column
 * @method     ChildOrdersQuery groupByRegionId() Group by the region_id column
 * @method     ChildOrdersQuery groupByTypeId() Group by the type_id column
 * @method     ChildOrdersQuery groupByLocationId() Group by the location_id column
 * @method     ChildOrdersQuery groupByVolumeTotal() Group by the volume_total column
 * @method     ChildOrdersQuery groupByVolumeRemain() Group by the volume_remain column
 * @method     ChildOrdersQuery groupByMinVolume() Group by the min_volume column
 * @method     ChildOrdersQuery groupByPrice() Group by the price column
 * @method     ChildOrdersQuery groupByIsBuyOrder() Group by the is_buy_order column
 * @method     ChildOrdersQuery groupByDuration() Group by the duration column
 * @method     ChildOrdersQuery groupByIssued() Group by the issued column
 *
 * @method     ChildOrdersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrdersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrdersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrdersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrdersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrdersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrders findOne(ConnectionInterface $con = null) Return the first ChildOrders matching the query
 * @method     ChildOrders findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOrders matching the query, or a new ChildOrders object populated from the query conditions when no match is found
 *
 * @method     ChildOrders findOneByMyOrderId(int $my_order_id) Return the first ChildOrders filtered by the my_order_id column
 * @method     ChildOrders findOneByOrderId(int $order_id) Return the first ChildOrders filtered by the order_id column
 * @method     ChildOrders findOneByRegionId(int $region_id) Return the first ChildOrders filtered by the region_id column
 * @method     ChildOrders findOneByTypeId(int $type_id) Return the first ChildOrders filtered by the type_id column
 * @method     ChildOrders findOneByLocationId(int $location_id) Return the first ChildOrders filtered by the location_id column
 * @method     ChildOrders findOneByVolumeTotal(int $volume_total) Return the first ChildOrders filtered by the volume_total column
 * @method     ChildOrders findOneByVolumeRemain(int $volume_remain) Return the first ChildOrders filtered by the volume_remain column
 * @method     ChildOrders findOneByMinVolume(int $min_volume) Return the first ChildOrders filtered by the min_volume column
 * @method     ChildOrders findOneByPrice(double $price) Return the first ChildOrders filtered by the price column
 * @method     ChildOrders findOneByIsBuyOrder(int $is_buy_order) Return the first ChildOrders filtered by the is_buy_order column
 * @method     ChildOrders findOneByDuration(int $duration) Return the first ChildOrders filtered by the duration column
 * @method     ChildOrders findOneByIssued(string $issued) Return the first ChildOrders filtered by the issued column *

 * @method     ChildOrders requirePk($key, ConnectionInterface $con = null) Return the ChildOrders by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOne(ConnectionInterface $con = null) Return the first ChildOrders matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrders requireOneByMyOrderId(int $my_order_id) Return the first ChildOrders filtered by the my_order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByOrderId(int $order_id) Return the first ChildOrders filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByRegionId(int $region_id) Return the first ChildOrders filtered by the region_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByTypeId(int $type_id) Return the first ChildOrders filtered by the type_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByLocationId(int $location_id) Return the first ChildOrders filtered by the location_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByVolumeTotal(int $volume_total) Return the first ChildOrders filtered by the volume_total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByVolumeRemain(int $volume_remain) Return the first ChildOrders filtered by the volume_remain column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByMinVolume(int $min_volume) Return the first ChildOrders filtered by the min_volume column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByPrice(double $price) Return the first ChildOrders filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByIsBuyOrder(int $is_buy_order) Return the first ChildOrders filtered by the is_buy_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByDuration(int $duration) Return the first ChildOrders filtered by the duration column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByIssued(string $issued) Return the first ChildOrders filtered by the issued column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrders[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOrders objects based on current ModelCriteria
 * @method     ChildOrders[]|ObjectCollection findByMyOrderId(int $my_order_id) Return ChildOrders objects filtered by the my_order_id column
 * @method     ChildOrders[]|ObjectCollection findByOrderId(int $order_id) Return ChildOrders objects filtered by the order_id column
 * @method     ChildOrders[]|ObjectCollection findByRegionId(int $region_id) Return ChildOrders objects filtered by the region_id column
 * @method     ChildOrders[]|ObjectCollection findByTypeId(int $type_id) Return ChildOrders objects filtered by the type_id column
 * @method     ChildOrders[]|ObjectCollection findByLocationId(int $location_id) Return ChildOrders objects filtered by the location_id column
 * @method     ChildOrders[]|ObjectCollection findByVolumeTotal(int $volume_total) Return ChildOrders objects filtered by the volume_total column
 * @method     ChildOrders[]|ObjectCollection findByVolumeRemain(int $volume_remain) Return ChildOrders objects filtered by the volume_remain column
 * @method     ChildOrders[]|ObjectCollection findByMinVolume(int $min_volume) Return ChildOrders objects filtered by the min_volume column
 * @method     ChildOrders[]|ObjectCollection findByPrice(double $price) Return ChildOrders objects filtered by the price column
 * @method     ChildOrders[]|ObjectCollection findByIsBuyOrder(int $is_buy_order) Return ChildOrders objects filtered by the is_buy_order column
 * @method     ChildOrders[]|ObjectCollection findByDuration(int $duration) Return ChildOrders objects filtered by the duration column
 * @method     ChildOrders[]|ObjectCollection findByIssued(string $issued) Return ChildOrders objects filtered by the issued column
 * @method     ChildOrders[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OrdersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OrdersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Orders', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrdersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrdersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOrdersQuery) {
            return $criteria;
        }
        $query = new ChildOrdersQuery();
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
     * @return ChildOrders|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OrdersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OrdersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOrders A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT my_order_id, order_id, region_id, type_id, location_id, volume_total, volume_remain, min_volume, price, is_buy_order, duration, issued FROM orders WHERE my_order_id = :p0';
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
            /** @var ChildOrders $obj */
            $obj = new ChildOrders();
            $obj->hydrate($row);
            OrdersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOrders|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrdersTableMap::COL_MY_ORDER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrdersTableMap::COL_MY_ORDER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the my_order_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMyOrderId(1234); // WHERE my_order_id = 1234
     * $query->filterByMyOrderId(array(12, 34)); // WHERE my_order_id IN (12, 34)
     * $query->filterByMyOrderId(array('min' => 12)); // WHERE my_order_id > 12
     * </code>
     *
     * @param     mixed $myOrderId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByMyOrderId($myOrderId = null, $comparison = null)
    {
        if (is_array($myOrderId)) {
            $useMinMax = false;
            if (isset($myOrderId['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_MY_ORDER_ID, $myOrderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($myOrderId['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_MY_ORDER_ID, $myOrderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_MY_ORDER_ID, $myOrderId, $comparison);
    }

    /**
     * Filter the query on the order_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderId(1234); // WHERE order_id = 1234
     * $query->filterByOrderId(array(12, 34)); // WHERE order_id IN (12, 34)
     * $query->filterByOrderId(array('min' => 12)); // WHERE order_id > 12
     * </code>
     *
     * @param     mixed $orderId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_ORDER_ID, $orderId, $comparison);
    }

    /**
     * Filter the query on the region_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRegionId(1234); // WHERE region_id = 1234
     * $query->filterByRegionId(array(12, 34)); // WHERE region_id IN (12, 34)
     * $query->filterByRegionId(array('min' => 12)); // WHERE region_id > 12
     * </code>
     *
     * @param     mixed $regionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByRegionId($regionId = null, $comparison = null)
    {
        if (is_array($regionId)) {
            $useMinMax = false;
            if (isset($regionId['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_REGION_ID, $regionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regionId['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_REGION_ID, $regionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_REGION_ID, $regionId, $comparison);
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
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByTypeId($typeId = null, $comparison = null)
    {
        if (is_array($typeId)) {
            $useMinMax = false;
            if (isset($typeId['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_TYPE_ID, $typeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typeId['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_TYPE_ID, $typeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_TYPE_ID, $typeId, $comparison);
    }

    /**
     * Filter the query on the location_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLocationId(1234); // WHERE location_id = 1234
     * $query->filterByLocationId(array(12, 34)); // WHERE location_id IN (12, 34)
     * $query->filterByLocationId(array('min' => 12)); // WHERE location_id > 12
     * </code>
     *
     * @param     mixed $locationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByLocationId($locationId = null, $comparison = null)
    {
        if (is_array($locationId)) {
            $useMinMax = false;
            if (isset($locationId['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_LOCATION_ID, $locationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationId['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_LOCATION_ID, $locationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_LOCATION_ID, $locationId, $comparison);
    }

    /**
     * Filter the query on the volume_total column
     *
     * Example usage:
     * <code>
     * $query->filterByVolumeTotal(1234); // WHERE volume_total = 1234
     * $query->filterByVolumeTotal(array(12, 34)); // WHERE volume_total IN (12, 34)
     * $query->filterByVolumeTotal(array('min' => 12)); // WHERE volume_total > 12
     * </code>
     *
     * @param     mixed $volumeTotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByVolumeTotal($volumeTotal = null, $comparison = null)
    {
        if (is_array($volumeTotal)) {
            $useMinMax = false;
            if (isset($volumeTotal['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_VOLUME_TOTAL, $volumeTotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($volumeTotal['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_VOLUME_TOTAL, $volumeTotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_VOLUME_TOTAL, $volumeTotal, $comparison);
    }

    /**
     * Filter the query on the volume_remain column
     *
     * Example usage:
     * <code>
     * $query->filterByVolumeRemain(1234); // WHERE volume_remain = 1234
     * $query->filterByVolumeRemain(array(12, 34)); // WHERE volume_remain IN (12, 34)
     * $query->filterByVolumeRemain(array('min' => 12)); // WHERE volume_remain > 12
     * </code>
     *
     * @param     mixed $volumeRemain The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByVolumeRemain($volumeRemain = null, $comparison = null)
    {
        if (is_array($volumeRemain)) {
            $useMinMax = false;
            if (isset($volumeRemain['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_VOLUME_REMAIN, $volumeRemain['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($volumeRemain['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_VOLUME_REMAIN, $volumeRemain['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_VOLUME_REMAIN, $volumeRemain, $comparison);
    }

    /**
     * Filter the query on the min_volume column
     *
     * Example usage:
     * <code>
     * $query->filterByMinVolume(1234); // WHERE min_volume = 1234
     * $query->filterByMinVolume(array(12, 34)); // WHERE min_volume IN (12, 34)
     * $query->filterByMinVolume(array('min' => 12)); // WHERE min_volume > 12
     * </code>
     *
     * @param     mixed $minVolume The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByMinVolume($minVolume = null, $comparison = null)
    {
        if (is_array($minVolume)) {
            $useMinMax = false;
            if (isset($minVolume['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_MIN_VOLUME, $minVolume['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minVolume['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_MIN_VOLUME, $minVolume['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_MIN_VOLUME, $minVolume, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the is_buy_order column
     *
     * Example usage:
     * <code>
     * $query->filterByIsBuyOrder(1234); // WHERE is_buy_order = 1234
     * $query->filterByIsBuyOrder(array(12, 34)); // WHERE is_buy_order IN (12, 34)
     * $query->filterByIsBuyOrder(array('min' => 12)); // WHERE is_buy_order > 12
     * </code>
     *
     * @param     mixed $isBuyOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByIsBuyOrder($isBuyOrder = null, $comparison = null)
    {
        if (is_array($isBuyOrder)) {
            $useMinMax = false;
            if (isset($isBuyOrder['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_IS_BUY_ORDER, $isBuyOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isBuyOrder['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_IS_BUY_ORDER, $isBuyOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_IS_BUY_ORDER, $isBuyOrder, $comparison);
    }

    /**
     * Filter the query on the duration column
     *
     * Example usage:
     * <code>
     * $query->filterByDuration(1234); // WHERE duration = 1234
     * $query->filterByDuration(array(12, 34)); // WHERE duration IN (12, 34)
     * $query->filterByDuration(array('min' => 12)); // WHERE duration > 12
     * </code>
     *
     * @param     mixed $duration The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByDuration($duration = null, $comparison = null)
    {
        if (is_array($duration)) {
            $useMinMax = false;
            if (isset($duration['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_DURATION, $duration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($duration['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_DURATION, $duration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_DURATION, $duration, $comparison);
    }

    /**
     * Filter the query on the issued column
     *
     * Example usage:
     * <code>
     * $query->filterByIssued('2011-03-14'); // WHERE issued = '2011-03-14'
     * $query->filterByIssued('now'); // WHERE issued = '2011-03-14'
     * $query->filterByIssued(array('max' => 'yesterday')); // WHERE issued > '2011-03-13'
     * </code>
     *
     * @param     mixed $issued The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByIssued($issued = null, $comparison = null)
    {
        if (is_array($issued)) {
            $useMinMax = false;
            if (isset($issued['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_ISSUED, $issued['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($issued['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_ISSUED, $issued['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_ISSUED, $issued, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOrders $orders Object to remove from the list of results
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function prune($orders = null)
    {
        if ($orders) {
            $this->addUsingAlias(OrdersTableMap::COL_MY_ORDER_ID, $orders->getMyOrderId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the orders table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrdersTableMap::clearInstancePool();
            OrdersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OrdersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OrdersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OrdersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OrdersQuery

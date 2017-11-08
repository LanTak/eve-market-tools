<?php

namespace Base;

use \Station as ChildStation;
use \StationQuery as ChildStationQuery;
use \Exception;
use \PDO;
use Map\StationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'station' table.
 *
 *
 *
 * @method     ChildStationQuery orderByStationId($order = Criteria::ASC) Order by the station_id column
 * @method     ChildStationQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildStationQuery orderByTypeId($order = Criteria::ASC) Order by the type_id column
 * @method     ChildStationQuery orderBySystemId($order = Criteria::ASC) Order by the system_id column
 * @method     ChildStationQuery orderByReprocessingEfficiency($order = Criteria::ASC) Order by the reprocessing_efficiency column
 * @method     ChildStationQuery orderByReprocessingStationsTake($order = Criteria::ASC) Order by the reprocessing_stations_take column
 * @method     ChildStationQuery orderByMaxDockableShipVolume($order = Criteria::ASC) Order by the max_dockable_ship_volume column
 * @method     ChildStationQuery orderByOfficeRentalCost($order = Criteria::ASC) Order by the office_rental_cost column
 * @method     ChildStationQuery orderByServices($order = Criteria::ASC) Order by the services column
 * @method     ChildStationQuery orderByOwner($order = Criteria::ASC) Order by the owner column
 * @method     ChildStationQuery orderByRaceId($order = Criteria::ASC) Order by the race_id column
 *
 * @method     ChildStationQuery groupByStationId() Group by the station_id column
 * @method     ChildStationQuery groupByName() Group by the name column
 * @method     ChildStationQuery groupByTypeId() Group by the type_id column
 * @method     ChildStationQuery groupBySystemId() Group by the system_id column
 * @method     ChildStationQuery groupByReprocessingEfficiency() Group by the reprocessing_efficiency column
 * @method     ChildStationQuery groupByReprocessingStationsTake() Group by the reprocessing_stations_take column
 * @method     ChildStationQuery groupByMaxDockableShipVolume() Group by the max_dockable_ship_volume column
 * @method     ChildStationQuery groupByOfficeRentalCost() Group by the office_rental_cost column
 * @method     ChildStationQuery groupByServices() Group by the services column
 * @method     ChildStationQuery groupByOwner() Group by the owner column
 * @method     ChildStationQuery groupByRaceId() Group by the race_id column
 *
 * @method     ChildStationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildStationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildStationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildStationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildStationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildStationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildStation findOne(ConnectionInterface $con = null) Return the first ChildStation matching the query
 * @method     ChildStation findOneOrCreate(ConnectionInterface $con = null) Return the first ChildStation matching the query, or a new ChildStation object populated from the query conditions when no match is found
 *
 * @method     ChildStation findOneByStationId(int $station_id) Return the first ChildStation filtered by the station_id column
 * @method     ChildStation findOneByName(string $name) Return the first ChildStation filtered by the name column
 * @method     ChildStation findOneByTypeId(int $type_id) Return the first ChildStation filtered by the type_id column
 * @method     ChildStation findOneBySystemId(int $system_id) Return the first ChildStation filtered by the system_id column
 * @method     ChildStation findOneByReprocessingEfficiency(double $reprocessing_efficiency) Return the first ChildStation filtered by the reprocessing_efficiency column
 * @method     ChildStation findOneByReprocessingStationsTake(double $reprocessing_stations_take) Return the first ChildStation filtered by the reprocessing_stations_take column
 * @method     ChildStation findOneByMaxDockableShipVolume(double $max_dockable_ship_volume) Return the first ChildStation filtered by the max_dockable_ship_volume column
 * @method     ChildStation findOneByOfficeRentalCost(double $office_rental_cost) Return the first ChildStation filtered by the office_rental_cost column
 * @method     ChildStation findOneByServices(string $services) Return the first ChildStation filtered by the services column
 * @method     ChildStation findOneByOwner(int $owner) Return the first ChildStation filtered by the owner column
 * @method     ChildStation findOneByRaceId(int $race_id) Return the first ChildStation filtered by the race_id column *

 * @method     ChildStation requirePk($key, ConnectionInterface $con = null) Return the ChildStation by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStation requireOne(ConnectionInterface $con = null) Return the first ChildStation matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStation requireOneByStationId(int $station_id) Return the first ChildStation filtered by the station_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStation requireOneByName(string $name) Return the first ChildStation filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStation requireOneByTypeId(int $type_id) Return the first ChildStation filtered by the type_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStation requireOneBySystemId(int $system_id) Return the first ChildStation filtered by the system_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStation requireOneByReprocessingEfficiency(double $reprocessing_efficiency) Return the first ChildStation filtered by the reprocessing_efficiency column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStation requireOneByReprocessingStationsTake(double $reprocessing_stations_take) Return the first ChildStation filtered by the reprocessing_stations_take column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStation requireOneByMaxDockableShipVolume(double $max_dockable_ship_volume) Return the first ChildStation filtered by the max_dockable_ship_volume column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStation requireOneByOfficeRentalCost(double $office_rental_cost) Return the first ChildStation filtered by the office_rental_cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStation requireOneByServices(string $services) Return the first ChildStation filtered by the services column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStation requireOneByOwner(int $owner) Return the first ChildStation filtered by the owner column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStation requireOneByRaceId(int $race_id) Return the first ChildStation filtered by the race_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStation[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildStation objects based on current ModelCriteria
 * @method     ChildStation[]|ObjectCollection findByStationId(int $station_id) Return ChildStation objects filtered by the station_id column
 * @method     ChildStation[]|ObjectCollection findByName(string $name) Return ChildStation objects filtered by the name column
 * @method     ChildStation[]|ObjectCollection findByTypeId(int $type_id) Return ChildStation objects filtered by the type_id column
 * @method     ChildStation[]|ObjectCollection findBySystemId(int $system_id) Return ChildStation objects filtered by the system_id column
 * @method     ChildStation[]|ObjectCollection findByReprocessingEfficiency(double $reprocessing_efficiency) Return ChildStation objects filtered by the reprocessing_efficiency column
 * @method     ChildStation[]|ObjectCollection findByReprocessingStationsTake(double $reprocessing_stations_take) Return ChildStation objects filtered by the reprocessing_stations_take column
 * @method     ChildStation[]|ObjectCollection findByMaxDockableShipVolume(double $max_dockable_ship_volume) Return ChildStation objects filtered by the max_dockable_ship_volume column
 * @method     ChildStation[]|ObjectCollection findByOfficeRentalCost(double $office_rental_cost) Return ChildStation objects filtered by the office_rental_cost column
 * @method     ChildStation[]|ObjectCollection findByServices(string $services) Return ChildStation objects filtered by the services column
 * @method     ChildStation[]|ObjectCollection findByOwner(int $owner) Return ChildStation objects filtered by the owner column
 * @method     ChildStation[]|ObjectCollection findByRaceId(int $race_id) Return ChildStation objects filtered by the race_id column
 * @method     ChildStation[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class StationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\StationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Station', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildStationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildStationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildStationQuery) {
            return $criteria;
        }
        $query = new ChildStationQuery();
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
     * @return ChildStation|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(StationTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = StationTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildStation A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT station_id, name, type_id, system_id, reprocessing_efficiency, reprocessing_stations_take, max_dockable_ship_volume, office_rental_cost, services, owner, race_id FROM station WHERE station_id = :p0';
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
            /** @var ChildStation $obj */
            $obj = new ChildStation();
            $obj->hydrate($row);
            StationTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildStation|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildStationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StationTableMap::COL_STATION_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildStationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StationTableMap::COL_STATION_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the station_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStationId(1234); // WHERE station_id = 1234
     * $query->filterByStationId(array(12, 34)); // WHERE station_id IN (12, 34)
     * $query->filterByStationId(array('min' => 12)); // WHERE station_id > 12
     * </code>
     *
     * @param     mixed $stationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStationQuery The current query, for fluid interface
     */
    public function filterByStationId($stationId = null, $comparison = null)
    {
        if (is_array($stationId)) {
            $useMinMax = false;
            if (isset($stationId['min'])) {
                $this->addUsingAlias(StationTableMap::COL_STATION_ID, $stationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($stationId['max'])) {
                $this->addUsingAlias(StationTableMap::COL_STATION_ID, $stationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationTableMap::COL_STATION_ID, $stationId, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStationQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildStationQuery The current query, for fluid interface
     */
    public function filterByTypeId($typeId = null, $comparison = null)
    {
        if (is_array($typeId)) {
            $useMinMax = false;
            if (isset($typeId['min'])) {
                $this->addUsingAlias(StationTableMap::COL_TYPE_ID, $typeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typeId['max'])) {
                $this->addUsingAlias(StationTableMap::COL_TYPE_ID, $typeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationTableMap::COL_TYPE_ID, $typeId, $comparison);
    }

    /**
     * Filter the query on the system_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySystemId(1234); // WHERE system_id = 1234
     * $query->filterBySystemId(array(12, 34)); // WHERE system_id IN (12, 34)
     * $query->filterBySystemId(array('min' => 12)); // WHERE system_id > 12
     * </code>
     *
     * @param     mixed $systemId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStationQuery The current query, for fluid interface
     */
    public function filterBySystemId($systemId = null, $comparison = null)
    {
        if (is_array($systemId)) {
            $useMinMax = false;
            if (isset($systemId['min'])) {
                $this->addUsingAlias(StationTableMap::COL_SYSTEM_ID, $systemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($systemId['max'])) {
                $this->addUsingAlias(StationTableMap::COL_SYSTEM_ID, $systemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationTableMap::COL_SYSTEM_ID, $systemId, $comparison);
    }

    /**
     * Filter the query on the reprocessing_efficiency column
     *
     * Example usage:
     * <code>
     * $query->filterByReprocessingEfficiency(1234); // WHERE reprocessing_efficiency = 1234
     * $query->filterByReprocessingEfficiency(array(12, 34)); // WHERE reprocessing_efficiency IN (12, 34)
     * $query->filterByReprocessingEfficiency(array('min' => 12)); // WHERE reprocessing_efficiency > 12
     * </code>
     *
     * @param     mixed $reprocessingEfficiency The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStationQuery The current query, for fluid interface
     */
    public function filterByReprocessingEfficiency($reprocessingEfficiency = null, $comparison = null)
    {
        if (is_array($reprocessingEfficiency)) {
            $useMinMax = false;
            if (isset($reprocessingEfficiency['min'])) {
                $this->addUsingAlias(StationTableMap::COL_REPROCESSING_EFFICIENCY, $reprocessingEfficiency['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reprocessingEfficiency['max'])) {
                $this->addUsingAlias(StationTableMap::COL_REPROCESSING_EFFICIENCY, $reprocessingEfficiency['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationTableMap::COL_REPROCESSING_EFFICIENCY, $reprocessingEfficiency, $comparison);
    }

    /**
     * Filter the query on the reprocessing_stations_take column
     *
     * Example usage:
     * <code>
     * $query->filterByReprocessingStationsTake(1234); // WHERE reprocessing_stations_take = 1234
     * $query->filterByReprocessingStationsTake(array(12, 34)); // WHERE reprocessing_stations_take IN (12, 34)
     * $query->filterByReprocessingStationsTake(array('min' => 12)); // WHERE reprocessing_stations_take > 12
     * </code>
     *
     * @param     mixed $reprocessingStationsTake The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStationQuery The current query, for fluid interface
     */
    public function filterByReprocessingStationsTake($reprocessingStationsTake = null, $comparison = null)
    {
        if (is_array($reprocessingStationsTake)) {
            $useMinMax = false;
            if (isset($reprocessingStationsTake['min'])) {
                $this->addUsingAlias(StationTableMap::COL_REPROCESSING_STATIONS_TAKE, $reprocessingStationsTake['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reprocessingStationsTake['max'])) {
                $this->addUsingAlias(StationTableMap::COL_REPROCESSING_STATIONS_TAKE, $reprocessingStationsTake['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationTableMap::COL_REPROCESSING_STATIONS_TAKE, $reprocessingStationsTake, $comparison);
    }

    /**
     * Filter the query on the max_dockable_ship_volume column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxDockableShipVolume(1234); // WHERE max_dockable_ship_volume = 1234
     * $query->filterByMaxDockableShipVolume(array(12, 34)); // WHERE max_dockable_ship_volume IN (12, 34)
     * $query->filterByMaxDockableShipVolume(array('min' => 12)); // WHERE max_dockable_ship_volume > 12
     * </code>
     *
     * @param     mixed $maxDockableShipVolume The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStationQuery The current query, for fluid interface
     */
    public function filterByMaxDockableShipVolume($maxDockableShipVolume = null, $comparison = null)
    {
        if (is_array($maxDockableShipVolume)) {
            $useMinMax = false;
            if (isset($maxDockableShipVolume['min'])) {
                $this->addUsingAlias(StationTableMap::COL_MAX_DOCKABLE_SHIP_VOLUME, $maxDockableShipVolume['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxDockableShipVolume['max'])) {
                $this->addUsingAlias(StationTableMap::COL_MAX_DOCKABLE_SHIP_VOLUME, $maxDockableShipVolume['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationTableMap::COL_MAX_DOCKABLE_SHIP_VOLUME, $maxDockableShipVolume, $comparison);
    }

    /**
     * Filter the query on the office_rental_cost column
     *
     * Example usage:
     * <code>
     * $query->filterByOfficeRentalCost(1234); // WHERE office_rental_cost = 1234
     * $query->filterByOfficeRentalCost(array(12, 34)); // WHERE office_rental_cost IN (12, 34)
     * $query->filterByOfficeRentalCost(array('min' => 12)); // WHERE office_rental_cost > 12
     * </code>
     *
     * @param     mixed $officeRentalCost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStationQuery The current query, for fluid interface
     */
    public function filterByOfficeRentalCost($officeRentalCost = null, $comparison = null)
    {
        if (is_array($officeRentalCost)) {
            $useMinMax = false;
            if (isset($officeRentalCost['min'])) {
                $this->addUsingAlias(StationTableMap::COL_OFFICE_RENTAL_COST, $officeRentalCost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($officeRentalCost['max'])) {
                $this->addUsingAlias(StationTableMap::COL_OFFICE_RENTAL_COST, $officeRentalCost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationTableMap::COL_OFFICE_RENTAL_COST, $officeRentalCost, $comparison);
    }

    /**
     * Filter the query on the services column
     *
     * Example usage:
     * <code>
     * $query->filterByServices('fooValue');   // WHERE services = 'fooValue'
     * $query->filterByServices('%fooValue%', Criteria::LIKE); // WHERE services LIKE '%fooValue%'
     * </code>
     *
     * @param     string $services The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStationQuery The current query, for fluid interface
     */
    public function filterByServices($services = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($services)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationTableMap::COL_SERVICES, $services, $comparison);
    }

    /**
     * Filter the query on the owner column
     *
     * Example usage:
     * <code>
     * $query->filterByOwner(1234); // WHERE owner = 1234
     * $query->filterByOwner(array(12, 34)); // WHERE owner IN (12, 34)
     * $query->filterByOwner(array('min' => 12)); // WHERE owner > 12
     * </code>
     *
     * @param     mixed $owner The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStationQuery The current query, for fluid interface
     */
    public function filterByOwner($owner = null, $comparison = null)
    {
        if (is_array($owner)) {
            $useMinMax = false;
            if (isset($owner['min'])) {
                $this->addUsingAlias(StationTableMap::COL_OWNER, $owner['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($owner['max'])) {
                $this->addUsingAlias(StationTableMap::COL_OWNER, $owner['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationTableMap::COL_OWNER, $owner, $comparison);
    }

    /**
     * Filter the query on the race_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRaceId(1234); // WHERE race_id = 1234
     * $query->filterByRaceId(array(12, 34)); // WHERE race_id IN (12, 34)
     * $query->filterByRaceId(array('min' => 12)); // WHERE race_id > 12
     * </code>
     *
     * @param     mixed $raceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStationQuery The current query, for fluid interface
     */
    public function filterByRaceId($raceId = null, $comparison = null)
    {
        if (is_array($raceId)) {
            $useMinMax = false;
            if (isset($raceId['min'])) {
                $this->addUsingAlias(StationTableMap::COL_RACE_ID, $raceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($raceId['max'])) {
                $this->addUsingAlias(StationTableMap::COL_RACE_ID, $raceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationTableMap::COL_RACE_ID, $raceId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildStation $station Object to remove from the list of results
     *
     * @return $this|ChildStationQuery The current query, for fluid interface
     */
    public function prune($station = null)
    {
        if ($station) {
            $this->addUsingAlias(StationTableMap::COL_STATION_ID, $station->getStationId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the station table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            StationTableMap::clearInstancePool();
            StationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(StationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(StationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            StationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            StationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // StationQuery

<?php

namespace Base;

use \Systems as ChildSystems;
use \SystemsQuery as ChildSystemsQuery;
use \Exception;
use \PDO;
use Map\SystemsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'systems' table.
 *
 *
 *
 * @method     ChildSystemsQuery orderBySystemId($order = Criteria::ASC) Order by the system_id column
 * @method     ChildSystemsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSystemsQuery orderByPosX($order = Criteria::ASC) Order by the pos_x column
 * @method     ChildSystemsQuery orderByPosY($order = Criteria::ASC) Order by the pos_y column
 * @method     ChildSystemsQuery orderByPosZ($order = Criteria::ASC) Order by the pos_z column
 * @method     ChildSystemsQuery orderBySecurityStatus($order = Criteria::ASC) Order by the security_status column
 * @method     ChildSystemsQuery orderByConstellationId($order = Criteria::ASC) Order by the constellation_id column
 * @method     ChildSystemsQuery orderByStarId($order = Criteria::ASC) Order by the star_id column
 * @method     ChildSystemsQuery orderBySecurityClass($order = Criteria::ASC) Order by the security_class column
 *
 * @method     ChildSystemsQuery groupBySystemId() Group by the system_id column
 * @method     ChildSystemsQuery groupByName() Group by the name column
 * @method     ChildSystemsQuery groupByPosX() Group by the pos_x column
 * @method     ChildSystemsQuery groupByPosY() Group by the pos_y column
 * @method     ChildSystemsQuery groupByPosZ() Group by the pos_z column
 * @method     ChildSystemsQuery groupBySecurityStatus() Group by the security_status column
 * @method     ChildSystemsQuery groupByConstellationId() Group by the constellation_id column
 * @method     ChildSystemsQuery groupByStarId() Group by the star_id column
 * @method     ChildSystemsQuery groupBySecurityClass() Group by the security_class column
 *
 * @method     ChildSystemsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSystemsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSystemsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSystemsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSystemsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSystemsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSystems findOne(ConnectionInterface $con = null) Return the first ChildSystems matching the query
 * @method     ChildSystems findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSystems matching the query, or a new ChildSystems object populated from the query conditions when no match is found
 *
 * @method     ChildSystems findOneBySystemId(int $system_id) Return the first ChildSystems filtered by the system_id column
 * @method     ChildSystems findOneByName(string $name) Return the first ChildSystems filtered by the name column
 * @method     ChildSystems findOneByPosX(string $pos_x) Return the first ChildSystems filtered by the pos_x column
 * @method     ChildSystems findOneByPosY(string $pos_y) Return the first ChildSystems filtered by the pos_y column
 * @method     ChildSystems findOneByPosZ(string $pos_z) Return the first ChildSystems filtered by the pos_z column
 * @method     ChildSystems findOneBySecurityStatus(double $security_status) Return the first ChildSystems filtered by the security_status column
 * @method     ChildSystems findOneByConstellationId(double $constellation_id) Return the first ChildSystems filtered by the constellation_id column
 * @method     ChildSystems findOneByStarId(int $star_id) Return the first ChildSystems filtered by the star_id column
 * @method     ChildSystems findOneBySecurityClass(string $security_class) Return the first ChildSystems filtered by the security_class column *

 * @method     ChildSystems requirePk($key, ConnectionInterface $con = null) Return the ChildSystems by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystems requireOne(ConnectionInterface $con = null) Return the first ChildSystems matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSystems requireOneBySystemId(int $system_id) Return the first ChildSystems filtered by the system_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystems requireOneByName(string $name) Return the first ChildSystems filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystems requireOneByPosX(string $pos_x) Return the first ChildSystems filtered by the pos_x column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystems requireOneByPosY(string $pos_y) Return the first ChildSystems filtered by the pos_y column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystems requireOneByPosZ(string $pos_z) Return the first ChildSystems filtered by the pos_z column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystems requireOneBySecurityStatus(double $security_status) Return the first ChildSystems filtered by the security_status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystems requireOneByConstellationId(double $constellation_id) Return the first ChildSystems filtered by the constellation_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystems requireOneByStarId(int $star_id) Return the first ChildSystems filtered by the star_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystems requireOneBySecurityClass(string $security_class) Return the first ChildSystems filtered by the security_class column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSystems[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSystems objects based on current ModelCriteria
 * @method     ChildSystems[]|ObjectCollection findBySystemId(int $system_id) Return ChildSystems objects filtered by the system_id column
 * @method     ChildSystems[]|ObjectCollection findByName(string $name) Return ChildSystems objects filtered by the name column
 * @method     ChildSystems[]|ObjectCollection findByPosX(string $pos_x) Return ChildSystems objects filtered by the pos_x column
 * @method     ChildSystems[]|ObjectCollection findByPosY(string $pos_y) Return ChildSystems objects filtered by the pos_y column
 * @method     ChildSystems[]|ObjectCollection findByPosZ(string $pos_z) Return ChildSystems objects filtered by the pos_z column
 * @method     ChildSystems[]|ObjectCollection findBySecurityStatus(double $security_status) Return ChildSystems objects filtered by the security_status column
 * @method     ChildSystems[]|ObjectCollection findByConstellationId(double $constellation_id) Return ChildSystems objects filtered by the constellation_id column
 * @method     ChildSystems[]|ObjectCollection findByStarId(int $star_id) Return ChildSystems objects filtered by the star_id column
 * @method     ChildSystems[]|ObjectCollection findBySecurityClass(string $security_class) Return ChildSystems objects filtered by the security_class column
 * @method     ChildSystems[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SystemsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SystemsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Systems', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSystemsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSystemsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSystemsQuery) {
            return $criteria;
        }
        $query = new ChildSystemsQuery();
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
     * @return ChildSystems|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SystemsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SystemsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSystems A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT system_id, name, pos_x, pos_y, pos_z, security_status, constellation_id, star_id, security_class FROM systems WHERE system_id = :p0';
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
            /** @var ChildSystems $obj */
            $obj = new ChildSystems();
            $obj->hydrate($row);
            SystemsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSystems|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSystemsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SystemsTableMap::COL_SYSTEM_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSystemsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SystemsTableMap::COL_SYSTEM_ID, $keys, Criteria::IN);
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
     * @return $this|ChildSystemsQuery The current query, for fluid interface
     */
    public function filterBySystemId($systemId = null, $comparison = null)
    {
        if (is_array($systemId)) {
            $useMinMax = false;
            if (isset($systemId['min'])) {
                $this->addUsingAlias(SystemsTableMap::COL_SYSTEM_ID, $systemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($systemId['max'])) {
                $this->addUsingAlias(SystemsTableMap::COL_SYSTEM_ID, $systemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SystemsTableMap::COL_SYSTEM_ID, $systemId, $comparison);
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
     * @return $this|ChildSystemsQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SystemsTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the pos_x column
     *
     * Example usage:
     * <code>
     * $query->filterByPosX(1234); // WHERE pos_x = 1234
     * $query->filterByPosX(array(12, 34)); // WHERE pos_x IN (12, 34)
     * $query->filterByPosX(array('min' => 12)); // WHERE pos_x > 12
     * </code>
     *
     * @param     mixed $posX The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemsQuery The current query, for fluid interface
     */
    public function filterByPosX($posX = null, $comparison = null)
    {
        if (is_array($posX)) {
            $useMinMax = false;
            if (isset($posX['min'])) {
                $this->addUsingAlias(SystemsTableMap::COL_POS_X, $posX['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posX['max'])) {
                $this->addUsingAlias(SystemsTableMap::COL_POS_X, $posX['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SystemsTableMap::COL_POS_X, $posX, $comparison);
    }

    /**
     * Filter the query on the pos_y column
     *
     * Example usage:
     * <code>
     * $query->filterByPosY(1234); // WHERE pos_y = 1234
     * $query->filterByPosY(array(12, 34)); // WHERE pos_y IN (12, 34)
     * $query->filterByPosY(array('min' => 12)); // WHERE pos_y > 12
     * </code>
     *
     * @param     mixed $posY The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemsQuery The current query, for fluid interface
     */
    public function filterByPosY($posY = null, $comparison = null)
    {
        if (is_array($posY)) {
            $useMinMax = false;
            if (isset($posY['min'])) {
                $this->addUsingAlias(SystemsTableMap::COL_POS_Y, $posY['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posY['max'])) {
                $this->addUsingAlias(SystemsTableMap::COL_POS_Y, $posY['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SystemsTableMap::COL_POS_Y, $posY, $comparison);
    }

    /**
     * Filter the query on the pos_z column
     *
     * Example usage:
     * <code>
     * $query->filterByPosZ(1234); // WHERE pos_z = 1234
     * $query->filterByPosZ(array(12, 34)); // WHERE pos_z IN (12, 34)
     * $query->filterByPosZ(array('min' => 12)); // WHERE pos_z > 12
     * </code>
     *
     * @param     mixed $posZ The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemsQuery The current query, for fluid interface
     */
    public function filterByPosZ($posZ = null, $comparison = null)
    {
        if (is_array($posZ)) {
            $useMinMax = false;
            if (isset($posZ['min'])) {
                $this->addUsingAlias(SystemsTableMap::COL_POS_Z, $posZ['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posZ['max'])) {
                $this->addUsingAlias(SystemsTableMap::COL_POS_Z, $posZ['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SystemsTableMap::COL_POS_Z, $posZ, $comparison);
    }

    /**
     * Filter the query on the security_status column
     *
     * Example usage:
     * <code>
     * $query->filterBySecurityStatus(1234); // WHERE security_status = 1234
     * $query->filterBySecurityStatus(array(12, 34)); // WHERE security_status IN (12, 34)
     * $query->filterBySecurityStatus(array('min' => 12)); // WHERE security_status > 12
     * </code>
     *
     * @param     mixed $securityStatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemsQuery The current query, for fluid interface
     */
    public function filterBySecurityStatus($securityStatus = null, $comparison = null)
    {
        if (is_array($securityStatus)) {
            $useMinMax = false;
            if (isset($securityStatus['min'])) {
                $this->addUsingAlias(SystemsTableMap::COL_SECURITY_STATUS, $securityStatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($securityStatus['max'])) {
                $this->addUsingAlias(SystemsTableMap::COL_SECURITY_STATUS, $securityStatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SystemsTableMap::COL_SECURITY_STATUS, $securityStatus, $comparison);
    }

    /**
     * Filter the query on the constellation_id column
     *
     * Example usage:
     * <code>
     * $query->filterByConstellationId(1234); // WHERE constellation_id = 1234
     * $query->filterByConstellationId(array(12, 34)); // WHERE constellation_id IN (12, 34)
     * $query->filterByConstellationId(array('min' => 12)); // WHERE constellation_id > 12
     * </code>
     *
     * @param     mixed $constellationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemsQuery The current query, for fluid interface
     */
    public function filterByConstellationId($constellationId = null, $comparison = null)
    {
        if (is_array($constellationId)) {
            $useMinMax = false;
            if (isset($constellationId['min'])) {
                $this->addUsingAlias(SystemsTableMap::COL_CONSTELLATION_ID, $constellationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($constellationId['max'])) {
                $this->addUsingAlias(SystemsTableMap::COL_CONSTELLATION_ID, $constellationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SystemsTableMap::COL_CONSTELLATION_ID, $constellationId, $comparison);
    }

    /**
     * Filter the query on the star_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStarId(1234); // WHERE star_id = 1234
     * $query->filterByStarId(array(12, 34)); // WHERE star_id IN (12, 34)
     * $query->filterByStarId(array('min' => 12)); // WHERE star_id > 12
     * </code>
     *
     * @param     mixed $starId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemsQuery The current query, for fluid interface
     */
    public function filterByStarId($starId = null, $comparison = null)
    {
        if (is_array($starId)) {
            $useMinMax = false;
            if (isset($starId['min'])) {
                $this->addUsingAlias(SystemsTableMap::COL_STAR_ID, $starId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($starId['max'])) {
                $this->addUsingAlias(SystemsTableMap::COL_STAR_ID, $starId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SystemsTableMap::COL_STAR_ID, $starId, $comparison);
    }

    /**
     * Filter the query on the security_class column
     *
     * Example usage:
     * <code>
     * $query->filterBySecurityClass('fooValue');   // WHERE security_class = 'fooValue'
     * $query->filterBySecurityClass('%fooValue%', Criteria::LIKE); // WHERE security_class LIKE '%fooValue%'
     * </code>
     *
     * @param     string $securityClass The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemsQuery The current query, for fluid interface
     */
    public function filterBySecurityClass($securityClass = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($securityClass)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SystemsTableMap::COL_SECURITY_CLASS, $securityClass, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSystems $systems Object to remove from the list of results
     *
     * @return $this|ChildSystemsQuery The current query, for fluid interface
     */
    public function prune($systems = null)
    {
        if ($systems) {
            $this->addUsingAlias(SystemsTableMap::COL_SYSTEM_ID, $systems->getSystemId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the systems table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SystemsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SystemsTableMap::clearInstancePool();
            SystemsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SystemsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SystemsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SystemsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SystemsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SystemsQuery

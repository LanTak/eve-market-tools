<?php

namespace Map;

use \Systems;
use \SystemsQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'systems' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SystemsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.SystemsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'systems';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Systems';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Systems';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the system_id field
     */
    const COL_SYSTEM_ID = 'systems.system_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'systems.name';

    /**
     * the column name for the pos_x field
     */
    const COL_POS_X = 'systems.pos_x';

    /**
     * the column name for the pos_y field
     */
    const COL_POS_Y = 'systems.pos_y';

    /**
     * the column name for the pos_z field
     */
    const COL_POS_Z = 'systems.pos_z';

    /**
     * the column name for the security_status field
     */
    const COL_SECURITY_STATUS = 'systems.security_status';

    /**
     * the column name for the constellation_id field
     */
    const COL_CONSTELLATION_ID = 'systems.constellation_id';

    /**
     * the column name for the star_id field
     */
    const COL_STAR_ID = 'systems.star_id';

    /**
     * the column name for the security_class field
     */
    const COL_SECURITY_CLASS = 'systems.security_class';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('SystemId', 'Name', 'PosX', 'PosY', 'PosZ', 'SecurityStatus', 'ConstellationId', 'StarId', 'SecurityClass', ),
        self::TYPE_CAMELNAME     => array('systemId', 'name', 'posX', 'posY', 'posZ', 'securityStatus', 'constellationId', 'starId', 'securityClass', ),
        self::TYPE_COLNAME       => array(SystemsTableMap::COL_SYSTEM_ID, SystemsTableMap::COL_NAME, SystemsTableMap::COL_POS_X, SystemsTableMap::COL_POS_Y, SystemsTableMap::COL_POS_Z, SystemsTableMap::COL_SECURITY_STATUS, SystemsTableMap::COL_CONSTELLATION_ID, SystemsTableMap::COL_STAR_ID, SystemsTableMap::COL_SECURITY_CLASS, ),
        self::TYPE_FIELDNAME     => array('system_id', 'name', 'pos_x', 'pos_y', 'pos_z', 'security_status', 'constellation_id', 'star_id', 'security_class', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('SystemId' => 0, 'Name' => 1, 'PosX' => 2, 'PosY' => 3, 'PosZ' => 4, 'SecurityStatus' => 5, 'ConstellationId' => 6, 'StarId' => 7, 'SecurityClass' => 8, ),
        self::TYPE_CAMELNAME     => array('systemId' => 0, 'name' => 1, 'posX' => 2, 'posY' => 3, 'posZ' => 4, 'securityStatus' => 5, 'constellationId' => 6, 'starId' => 7, 'securityClass' => 8, ),
        self::TYPE_COLNAME       => array(SystemsTableMap::COL_SYSTEM_ID => 0, SystemsTableMap::COL_NAME => 1, SystemsTableMap::COL_POS_X => 2, SystemsTableMap::COL_POS_Y => 3, SystemsTableMap::COL_POS_Z => 4, SystemsTableMap::COL_SECURITY_STATUS => 5, SystemsTableMap::COL_CONSTELLATION_ID => 6, SystemsTableMap::COL_STAR_ID => 7, SystemsTableMap::COL_SECURITY_CLASS => 8, ),
        self::TYPE_FIELDNAME     => array('system_id' => 0, 'name' => 1, 'pos_x' => 2, 'pos_y' => 3, 'pos_z' => 4, 'security_status' => 5, 'constellation_id' => 6, 'star_id' => 7, 'security_class' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('systems');
        $this->setPhpName('Systems');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Systems');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('system_id', 'SystemId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 256, null);
        $this->addColumn('pos_x', 'PosX', 'BIGINT', false, null, null);
        $this->addColumn('pos_y', 'PosY', 'BIGINT', false, null, null);
        $this->addColumn('pos_z', 'PosZ', 'BIGINT', false, null, null);
        $this->addColumn('security_status', 'SecurityStatus', 'DOUBLE', false, null, null);
        $this->addColumn('constellation_id', 'ConstellationId', 'DOUBLE', false, null, null);
        $this->addColumn('star_id', 'StarId', 'INTEGER', false, null, null);
        $this->addColumn('security_class', 'SecurityClass', 'VARCHAR', false, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SystemId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SystemId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SystemId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SystemId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SystemId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SystemId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('SystemId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? SystemsTableMap::CLASS_DEFAULT : SystemsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Systems object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SystemsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SystemsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SystemsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SystemsTableMap::OM_CLASS;
            /** @var Systems $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SystemsTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = SystemsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SystemsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Systems $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SystemsTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(SystemsTableMap::COL_SYSTEM_ID);
            $criteria->addSelectColumn(SystemsTableMap::COL_NAME);
            $criteria->addSelectColumn(SystemsTableMap::COL_POS_X);
            $criteria->addSelectColumn(SystemsTableMap::COL_POS_Y);
            $criteria->addSelectColumn(SystemsTableMap::COL_POS_Z);
            $criteria->addSelectColumn(SystemsTableMap::COL_SECURITY_STATUS);
            $criteria->addSelectColumn(SystemsTableMap::COL_CONSTELLATION_ID);
            $criteria->addSelectColumn(SystemsTableMap::COL_STAR_ID);
            $criteria->addSelectColumn(SystemsTableMap::COL_SECURITY_CLASS);
        } else {
            $criteria->addSelectColumn($alias . '.system_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.pos_x');
            $criteria->addSelectColumn($alias . '.pos_y');
            $criteria->addSelectColumn($alias . '.pos_z');
            $criteria->addSelectColumn($alias . '.security_status');
            $criteria->addSelectColumn($alias . '.constellation_id');
            $criteria->addSelectColumn($alias . '.star_id');
            $criteria->addSelectColumn($alias . '.security_class');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(SystemsTableMap::DATABASE_NAME)->getTable(SystemsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SystemsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SystemsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SystemsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Systems or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Systems object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SystemsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Systems) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SystemsTableMap::DATABASE_NAME);
            $criteria->add(SystemsTableMap::COL_SYSTEM_ID, (array) $values, Criteria::IN);
        }

        $query = SystemsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SystemsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SystemsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the systems table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SystemsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Systems or Criteria object.
     *
     * @param mixed               $criteria Criteria or Systems object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SystemsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Systems object
        }


        // Set the correct dbName
        $query = SystemsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SystemsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SystemsTableMap::buildTableMap();

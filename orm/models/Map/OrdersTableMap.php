<?php

namespace Map;

use \Orders;
use \OrdersQuery;
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
 * This class defines the structure of the 'orders' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OrdersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OrdersTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'orders';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Orders';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Orders';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the my_order_id field
     */
    const COL_MY_ORDER_ID = 'orders.my_order_id';

    /**
     * the column name for the order_id field
     */
    const COL_ORDER_ID = 'orders.order_id';

    /**
     * the column name for the region_id field
     */
    const COL_REGION_ID = 'orders.region_id';

    /**
     * the column name for the type_id field
     */
    const COL_TYPE_ID = 'orders.type_id';

    /**
     * the column name for the location_id field
     */
    const COL_LOCATION_ID = 'orders.location_id';

    /**
     * the column name for the volume_total field
     */
    const COL_VOLUME_TOTAL = 'orders.volume_total';

    /**
     * the column name for the volume_remain field
     */
    const COL_VOLUME_REMAIN = 'orders.volume_remain';

    /**
     * the column name for the min_volume field
     */
    const COL_MIN_VOLUME = 'orders.min_volume';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'orders.price';

    /**
     * the column name for the is_buy_order field
     */
    const COL_IS_BUY_ORDER = 'orders.is_buy_order';

    /**
     * the column name for the duration field
     */
    const COL_DURATION = 'orders.duration';

    /**
     * the column name for the issued field
     */
    const COL_ISSUED = 'orders.issued';

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
        self::TYPE_PHPNAME       => array('MyOrderId', 'OrderId', 'RegionId', 'TypeId', 'LocationId', 'VolumeTotal', 'VolumeRemain', 'MinVolume', 'Price', 'IsBuyOrder', 'Duration', 'Issued', ),
        self::TYPE_CAMELNAME     => array('myOrderId', 'orderId', 'regionId', 'typeId', 'locationId', 'volumeTotal', 'volumeRemain', 'minVolume', 'price', 'isBuyOrder', 'duration', 'issued', ),
        self::TYPE_COLNAME       => array(OrdersTableMap::COL_MY_ORDER_ID, OrdersTableMap::COL_ORDER_ID, OrdersTableMap::COL_REGION_ID, OrdersTableMap::COL_TYPE_ID, OrdersTableMap::COL_LOCATION_ID, OrdersTableMap::COL_VOLUME_TOTAL, OrdersTableMap::COL_VOLUME_REMAIN, OrdersTableMap::COL_MIN_VOLUME, OrdersTableMap::COL_PRICE, OrdersTableMap::COL_IS_BUY_ORDER, OrdersTableMap::COL_DURATION, OrdersTableMap::COL_ISSUED, ),
        self::TYPE_FIELDNAME     => array('my_order_id', 'order_id', 'region_id', 'type_id', 'location_id', 'volume_total', 'volume_remain', 'min_volume', 'price', 'is_buy_order', 'duration', 'issued', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('MyOrderId' => 0, 'OrderId' => 1, 'RegionId' => 2, 'TypeId' => 3, 'LocationId' => 4, 'VolumeTotal' => 5, 'VolumeRemain' => 6, 'MinVolume' => 7, 'Price' => 8, 'IsBuyOrder' => 9, 'Duration' => 10, 'Issued' => 11, ),
        self::TYPE_CAMELNAME     => array('myOrderId' => 0, 'orderId' => 1, 'regionId' => 2, 'typeId' => 3, 'locationId' => 4, 'volumeTotal' => 5, 'volumeRemain' => 6, 'minVolume' => 7, 'price' => 8, 'isBuyOrder' => 9, 'duration' => 10, 'issued' => 11, ),
        self::TYPE_COLNAME       => array(OrdersTableMap::COL_MY_ORDER_ID => 0, OrdersTableMap::COL_ORDER_ID => 1, OrdersTableMap::COL_REGION_ID => 2, OrdersTableMap::COL_TYPE_ID => 3, OrdersTableMap::COL_LOCATION_ID => 4, OrdersTableMap::COL_VOLUME_TOTAL => 5, OrdersTableMap::COL_VOLUME_REMAIN => 6, OrdersTableMap::COL_MIN_VOLUME => 7, OrdersTableMap::COL_PRICE => 8, OrdersTableMap::COL_IS_BUY_ORDER => 9, OrdersTableMap::COL_DURATION => 10, OrdersTableMap::COL_ISSUED => 11, ),
        self::TYPE_FIELDNAME     => array('my_order_id' => 0, 'order_id' => 1, 'region_id' => 2, 'type_id' => 3, 'location_id' => 4, 'volume_total' => 5, 'volume_remain' => 6, 'min_volume' => 7, 'price' => 8, 'is_buy_order' => 9, 'duration' => 10, 'issued' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('orders');
        $this->setPhpName('Orders');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Orders');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('my_order_id', 'MyOrderId', 'INTEGER', true, null, null);
        $this->addColumn('order_id', 'OrderId', 'INTEGER', true, 22, null);
        $this->addColumn('region_id', 'RegionId', 'INTEGER', true, null, null);
        $this->addColumn('type_id', 'TypeId', 'INTEGER', true, null, null);
        $this->addColumn('location_id', 'LocationId', 'INTEGER', true, null, null);
        $this->addColumn('volume_total', 'VolumeTotal', 'INTEGER', true, null, null);
        $this->addColumn('volume_remain', 'VolumeRemain', 'INTEGER', true, null, null);
        $this->addColumn('min_volume', 'MinVolume', 'INTEGER', true, null, null);
        $this->addColumn('price', 'Price', 'DOUBLE', true, null, null);
        $this->addColumn('is_buy_order', 'IsBuyOrder', 'TINYINT', true, null, null);
        $this->addColumn('duration', 'Duration', 'INTEGER', true, null, null);
        $this->addColumn('issued', 'Issued', 'TIMESTAMP', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MyOrderId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MyOrderId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MyOrderId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MyOrderId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MyOrderId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MyOrderId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('MyOrderId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OrdersTableMap::CLASS_DEFAULT : OrdersTableMap::OM_CLASS;
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
     * @return array           (Orders object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OrdersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OrdersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OrdersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OrdersTableMap::OM_CLASS;
            /** @var Orders $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OrdersTableMap::addInstanceToPool($obj, $key);
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
            $key = OrdersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OrdersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Orders $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OrdersTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OrdersTableMap::COL_MY_ORDER_ID);
            $criteria->addSelectColumn(OrdersTableMap::COL_ORDER_ID);
            $criteria->addSelectColumn(OrdersTableMap::COL_REGION_ID);
            $criteria->addSelectColumn(OrdersTableMap::COL_TYPE_ID);
            $criteria->addSelectColumn(OrdersTableMap::COL_LOCATION_ID);
            $criteria->addSelectColumn(OrdersTableMap::COL_VOLUME_TOTAL);
            $criteria->addSelectColumn(OrdersTableMap::COL_VOLUME_REMAIN);
            $criteria->addSelectColumn(OrdersTableMap::COL_MIN_VOLUME);
            $criteria->addSelectColumn(OrdersTableMap::COL_PRICE);
            $criteria->addSelectColumn(OrdersTableMap::COL_IS_BUY_ORDER);
            $criteria->addSelectColumn(OrdersTableMap::COL_DURATION);
            $criteria->addSelectColumn(OrdersTableMap::COL_ISSUED);
        } else {
            $criteria->addSelectColumn($alias . '.my_order_id');
            $criteria->addSelectColumn($alias . '.order_id');
            $criteria->addSelectColumn($alias . '.region_id');
            $criteria->addSelectColumn($alias . '.type_id');
            $criteria->addSelectColumn($alias . '.location_id');
            $criteria->addSelectColumn($alias . '.volume_total');
            $criteria->addSelectColumn($alias . '.volume_remain');
            $criteria->addSelectColumn($alias . '.min_volume');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.is_buy_order');
            $criteria->addSelectColumn($alias . '.duration');
            $criteria->addSelectColumn($alias . '.issued');
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
        return Propel::getServiceContainer()->getDatabaseMap(OrdersTableMap::DATABASE_NAME)->getTable(OrdersTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OrdersTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OrdersTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OrdersTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Orders or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Orders object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Orders) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OrdersTableMap::DATABASE_NAME);
            $criteria->add(OrdersTableMap::COL_MY_ORDER_ID, (array) $values, Criteria::IN);
        }

        $query = OrdersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OrdersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OrdersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the orders table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OrdersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Orders or Criteria object.
     *
     * @param mixed               $criteria Criteria or Orders object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Orders object
        }

        if ($criteria->containsKey(OrdersTableMap::COL_MY_ORDER_ID) && $criteria->keyContainsValue(OrdersTableMap::COL_MY_ORDER_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OrdersTableMap::COL_MY_ORDER_ID.')');
        }


        // Set the correct dbName
        $query = OrdersQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OrdersTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OrdersTableMap::buildTableMap();

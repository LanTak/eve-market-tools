<?php

namespace Map;

use \Types;
use \TypesQuery;
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
 * This class defines the structure of the 'types' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TypesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TypesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'types';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Types';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Types';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the type_id field
     */
    const COL_TYPE_ID = 'types.type_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'types.name';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'types.description';

    /**
     * the column name for the published field
     */
    const COL_PUBLISHED = 'types.published';

    /**
     * the column name for the group_id field
     */
    const COL_GROUP_ID = 'types.group_id';

    /**
     * the column name for the radius field
     */
    const COL_RADIUS = 'types.radius';

    /**
     * the column name for the volume field
     */
    const COL_VOLUME = 'types.volume';

    /**
     * the column name for the packaged_volume field
     */
    const COL_PACKAGED_VOLUME = 'types.packaged_volume';

    /**
     * the column name for the icon_id field
     */
    const COL_ICON_ID = 'types.icon_id';

    /**
     * the column name for the capacity field
     */
    const COL_CAPACITY = 'types.capacity';

    /**
     * the column name for the portion_size field
     */
    const COL_PORTION_SIZE = 'types.portion_size';

    /**
     * the column name for the mass field
     */
    const COL_MASS = 'types.mass';

    /**
     * the column name for the graphic_id field
     */
    const COL_GRAPHIC_ID = 'types.graphic_id';

    /**
     * the column name for the dogma_attributes field
     */
    const COL_DOGMA_ATTRIBUTES = 'types.dogma_attributes';

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
        self::TYPE_PHPNAME       => array('TypeId', 'Name', 'Description', 'Published', 'GroupId', 'Radius', 'Volume', 'PackagedVolume', 'IconId', 'Capacity', 'PortionSize', 'Mass', 'GraphicId', 'DogmaAttributes', ),
        self::TYPE_CAMELNAME     => array('typeId', 'name', 'description', 'published', 'groupId', 'radius', 'volume', 'packagedVolume', 'iconId', 'capacity', 'portionSize', 'mass', 'graphicId', 'dogmaAttributes', ),
        self::TYPE_COLNAME       => array(TypesTableMap::COL_TYPE_ID, TypesTableMap::COL_NAME, TypesTableMap::COL_DESCRIPTION, TypesTableMap::COL_PUBLISHED, TypesTableMap::COL_GROUP_ID, TypesTableMap::COL_RADIUS, TypesTableMap::COL_VOLUME, TypesTableMap::COL_PACKAGED_VOLUME, TypesTableMap::COL_ICON_ID, TypesTableMap::COL_CAPACITY, TypesTableMap::COL_PORTION_SIZE, TypesTableMap::COL_MASS, TypesTableMap::COL_GRAPHIC_ID, TypesTableMap::COL_DOGMA_ATTRIBUTES, ),
        self::TYPE_FIELDNAME     => array('type_id', 'name', 'description', 'published', 'group_id', 'radius', 'volume', 'packaged_volume', 'icon_id', 'capacity', 'portion_size', 'mass', 'graphic_id', 'dogma_attributes', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('TypeId' => 0, 'Name' => 1, 'Description' => 2, 'Published' => 3, 'GroupId' => 4, 'Radius' => 5, 'Volume' => 6, 'PackagedVolume' => 7, 'IconId' => 8, 'Capacity' => 9, 'PortionSize' => 10, 'Mass' => 11, 'GraphicId' => 12, 'DogmaAttributes' => 13, ),
        self::TYPE_CAMELNAME     => array('typeId' => 0, 'name' => 1, 'description' => 2, 'published' => 3, 'groupId' => 4, 'radius' => 5, 'volume' => 6, 'packagedVolume' => 7, 'iconId' => 8, 'capacity' => 9, 'portionSize' => 10, 'mass' => 11, 'graphicId' => 12, 'dogmaAttributes' => 13, ),
        self::TYPE_COLNAME       => array(TypesTableMap::COL_TYPE_ID => 0, TypesTableMap::COL_NAME => 1, TypesTableMap::COL_DESCRIPTION => 2, TypesTableMap::COL_PUBLISHED => 3, TypesTableMap::COL_GROUP_ID => 4, TypesTableMap::COL_RADIUS => 5, TypesTableMap::COL_VOLUME => 6, TypesTableMap::COL_PACKAGED_VOLUME => 7, TypesTableMap::COL_ICON_ID => 8, TypesTableMap::COL_CAPACITY => 9, TypesTableMap::COL_PORTION_SIZE => 10, TypesTableMap::COL_MASS => 11, TypesTableMap::COL_GRAPHIC_ID => 12, TypesTableMap::COL_DOGMA_ATTRIBUTES => 13, ),
        self::TYPE_FIELDNAME     => array('type_id' => 0, 'name' => 1, 'description' => 2, 'published' => 3, 'group_id' => 4, 'radius' => 5, 'volume' => 6, 'packaged_volume' => 7, 'icon_id' => 8, 'capacity' => 9, 'portion_size' => 10, 'mass' => 11, 'graphic_id' => 12, 'dogma_attributes' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
        $this->setName('types');
        $this->setPhpName('Types');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Types');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('type_id', 'TypeId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 128, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 512, null);
        $this->addColumn('published', 'Published', 'TINYINT', false, null, null);
        $this->addColumn('group_id', 'GroupId', 'INTEGER', false, null, null);
        $this->addColumn('radius', 'Radius', 'INTEGER', false, null, null);
        $this->addColumn('volume', 'Volume', 'DOUBLE', false, null, null);
        $this->addColumn('packaged_volume', 'PackagedVolume', 'INTEGER', false, null, null);
        $this->addColumn('icon_id', 'IconId', 'INTEGER', false, null, null);
        $this->addColumn('capacity', 'Capacity', 'INTEGER', false, null, null);
        $this->addColumn('portion_size', 'PortionSize', 'INTEGER', false, null, null);
        $this->addColumn('mass', 'Mass', 'BIGINT', false, null, null);
        $this->addColumn('graphic_id', 'GraphicId', 'INTEGER', false, null, null);
        $this->addColumn('dogma_attributes', 'DogmaAttributes', 'TINYINT', false, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TypeId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TypeId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TypeId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TypeId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TypeId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TypeId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('TypeId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? TypesTableMap::CLASS_DEFAULT : TypesTableMap::OM_CLASS;
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
     * @return array           (Types object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TypesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TypesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TypesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TypesTableMap::OM_CLASS;
            /** @var Types $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TypesTableMap::addInstanceToPool($obj, $key);
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
            $key = TypesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TypesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Types $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TypesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TypesTableMap::COL_TYPE_ID);
            $criteria->addSelectColumn(TypesTableMap::COL_NAME);
            $criteria->addSelectColumn(TypesTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(TypesTableMap::COL_PUBLISHED);
            $criteria->addSelectColumn(TypesTableMap::COL_GROUP_ID);
            $criteria->addSelectColumn(TypesTableMap::COL_RADIUS);
            $criteria->addSelectColumn(TypesTableMap::COL_VOLUME);
            $criteria->addSelectColumn(TypesTableMap::COL_PACKAGED_VOLUME);
            $criteria->addSelectColumn(TypesTableMap::COL_ICON_ID);
            $criteria->addSelectColumn(TypesTableMap::COL_CAPACITY);
            $criteria->addSelectColumn(TypesTableMap::COL_PORTION_SIZE);
            $criteria->addSelectColumn(TypesTableMap::COL_MASS);
            $criteria->addSelectColumn(TypesTableMap::COL_GRAPHIC_ID);
            $criteria->addSelectColumn(TypesTableMap::COL_DOGMA_ATTRIBUTES);
        } else {
            $criteria->addSelectColumn($alias . '.type_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.published');
            $criteria->addSelectColumn($alias . '.group_id');
            $criteria->addSelectColumn($alias . '.radius');
            $criteria->addSelectColumn($alias . '.volume');
            $criteria->addSelectColumn($alias . '.packaged_volume');
            $criteria->addSelectColumn($alias . '.icon_id');
            $criteria->addSelectColumn($alias . '.capacity');
            $criteria->addSelectColumn($alias . '.portion_size');
            $criteria->addSelectColumn($alias . '.mass');
            $criteria->addSelectColumn($alias . '.graphic_id');
            $criteria->addSelectColumn($alias . '.dogma_attributes');
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
        return Propel::getServiceContainer()->getDatabaseMap(TypesTableMap::DATABASE_NAME)->getTable(TypesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TypesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TypesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TypesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Types or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Types object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TypesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Types) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TypesTableMap::DATABASE_NAME);
            $criteria->add(TypesTableMap::COL_TYPE_ID, (array) $values, Criteria::IN);
        }

        $query = TypesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TypesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TypesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the types table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TypesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Types or Criteria object.
     *
     * @param mixed               $criteria Criteria or Types object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TypesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Types object
        }


        // Set the correct dbName
        $query = TypesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TypesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TypesTableMap::buildTableMap();

<?php
/**
 * File containing the EzcDatabase location gateway class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\Persistence\SqlNg\Content\Location\Gateway;

use eZ\Publish\Core\Persistence\SqlNg\Content\Location\Gateway;
use eZ\Publish\Core\Persistence\Legacy\EzcDbHandler;
use eZ\Publish\SPI\Persistence\Content\ContentInfo;
use eZ\Publish\SPI\Persistence\Content\Location;
use eZ\Publish\SPI\Persistence\Content\Location\UpdateStruct;
use eZ\Publish\SPI\Persistence\Content\Location\CreateStruct;
use eZ\Publish\API\Repository\Values\Content\Query\SortClause;
use eZ\Publish\API\Repository\Values\Content\Query;
use eZ\Publish\Core\Base\Exceptions\NotFoundException as NotFound;
use RuntimeException;

/**
 * Location gateway implementation using the zeta database component.
 */
class EzcDatabase extends Gateway
{
    /**
     * Database handler
     *
     * @var \EzcDbHandler
     */
    protected $dbHandler;

    /**
     * Construct from database handler
     *
     * @param \eZ\Publish\Core\Persistence\Legacy\EzcDbHandler $dbHandler
     *
     * @return void
     */
    public function __construct( EzcDbHandler $dbHandler )
    {
        $this->dbHandler = $dbHandler;
    }

    /**
     * Returns an array with basic node data
     *
     * We might want to cache this, since this method is used by about every
     * method in the location handler.
     *
     * @param mixed $nodeId
     *
     * @return array
     */
    public function getBasicNodeData( $nodeId )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Returns an array with basic node data
     *
     * @param mixed $remoteId
     *
     * @return array
     */
    public function getBasicNodeDataByRemoteId( $remoteId )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Loads data for all Locations for $contentId, optionally only in the
     * subtree starting at $rootLocationId
     *
     * @param int $contentId
     * @param int $rootLocationId
     *
     * @return array
     */
    public function loadLocationDataByContent( $contentId, $rootLocationId = null )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Find all content in the given subtree
     *
     * @param mixed $sourceId
     *
     * @return array
     */
    public function getSubtreeContent( $sourceId )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Returns data for the first level children of the location identified by given $locationId
     *
     * @param mixed $locationId
     *
     * @return array
     */
    public function getChildren( $locationId )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Update path strings to move nodes in the ezcontentobject_tree table
     *
     * This query can likely be optimized to use some more advanced string
     * operations, which then depend on the respective database.
     *
     * @todo optimize
     * @param string $sourceNodeData
     * @param string $destinationNodeData
     *
     * @return void
     */
    public function moveSubtreeNodes( $sourceNodeData, $destinationNodeData )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Sets a location to be hidden, and it self + all children to invisible.
     *
     * @param string $pathString
     */
    public function hideSubtree( $pathString )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Sets a location to be unhidden, and self + children to visible unless a parent is hiding the tree.
     * If not make sure only children down to first hidden node is marked visible.
     *
     * @param string $pathString
     */
    public function unHideSubtree( $pathString )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Swaps the content object being pointed to by a location object.
     *
     * Make the location identified by $locationId1 refer to the Content
     * referred to by $locationId2 and vice versa.
     *
     * @param mixed $locationId1
     * @param mixed $locationId2
     *
     * @return boolean
     */
    public function swap( $locationId1, $locationId2 )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Creates a new location in given $parentNode
     *
     * @param \eZ\Publish\SPI\Persistence\Content\Location\CreateStruct $createStruct
     * @param array $parentNode
     *
     * @return \eZ\Publish\SPI\Persistence\Content\Location
     */
    public function create( CreateStruct $createStruct, array $parentNode, $status )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Updates all Locations of content identified with $contentId with $versionNo
     *
     * @param mixed $contentId
     * @param mixed $versionNo
     *
     * @return void
     */
    public function updateLocationsContentVersionNo( $contentId, $versionNo )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Searches for the main nodeId of $contentId in $versionId
     *
     * @param int $contentId
     *
     * @return int|bool
     */
    private function getMainNodeId( $contentId )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Updates an existing location.
     *
     * @param \eZ\Publish\SPI\Persistence\Content\Location\UpdateStruct $location
     * @param int $locationId
     *
     * @return boolean
     */
    public function update( UpdateStruct $location, $locationId )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Updates path identification string for given $locationId.
     *
     * @param mixed $locationId
     * @param mixed $parentLocationId
     * @param string $text
     *
     * @return void
     */
    public function updatePathIdentificationString( $locationId, $parentLocationId, $text )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Deletes ezcontentobject_tree row for given $locationId (node_id)
     *
     * @param mixed $locationId
     */
    public function removeLocation( $locationId )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Sends a single location identified by given $locationId to the trash.
     *
     * The associated content object is left untouched.
     *
     * @param mixed $locationId
     *
     * @return boolean
     */
    public function trashLocation( $locationId )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Returns a trashed location to normal state.
     *
     * Recreates the originally trashed location in the new position. If no new
     * position has been specified, it will be tried to re-create the location
     * at the old position. If this is not possible ( because the old location
     * does not exist any more) and exception is thrown.
     *
     * @param mixed $locationId
     * @param mixed|null $newParentId
     *
     * @return \eZ\Publish\SPI\Persistence\Content\Location
     */
    public function untrashLocation( $locationId, $newParentId = null )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Loads trash data specified by location ID
     *
     * @param mixed $locationId
     *
     * @return array
     */
    public function loadTrashByLocation( $locationId )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * List trashed items
     *
     * @param int $offset
     * @param int $limit
     * @param array $sort
     *
     * @return array
     */
    public function listTrashed( $offset, $limit, array $sort = null )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Removes every entries in the trash.
     * Will NOT remove associated content objects nor attributes.
     *
     * Basically truncates ezcontentobject_trash table.
     *
     * @return void
     */
    public function cleanupTrash()
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Removes trashed element identified by $id from trash.
     * Will NOT remove associated content object nor attributes.
     *
     * @param int $id The trashed location Id
     *
     * @return void
     */
    public function removeElementFromTrash( $id )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Set section on all content objects in the subtree
     *
     * @param mixed $pathString
     * @param mixed $sectionId
     *
     * @return boolean
     */
    public function setSectionForSubtree( $pathString, $sectionId )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }

    /**
     * Changes main location of content identified by given $contentId to location identified by given $locationId
     *
     * Updates ezcontentobject_tree table for the given $contentId and eznode_assignment table for the given
     * $contentId, $parentLocationId and $versionNo
     *
     * @param mixed $contentId
     * @param mixed $locationId
     * @param mixed $versionNo version number, needed to update eznode_assignment table
     * @param mixed $parentLocationId parent location of location identified by $locationId, needed to update
     *        eznode_assignment table
     *
     * @return void
     */
    public function changeMainLocation( $contentId, $locationId, $versionNo, $parentLocationId )
    {
        throw new \RuntimeException( "@TODO: Implement" );
    }
}
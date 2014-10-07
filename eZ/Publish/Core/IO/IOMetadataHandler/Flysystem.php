<?php
/**
 * This file is part of the eZ Publish Legacy package
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributd with this source code.
 */
namespace eZ\Publish\Core\IO\IOMetadataHandler;

use eZ\Publish\Core\IO\Exception\BinaryFileNotFoundException;
use eZ\Publish\Core\IO\IOMetadataHandler;
use eZ\Publish\SPI\IO\BinaryFile as SPIBinaryFile;
use eZ\Publish\SPI\IO\BinaryFileCreateStruct as SPIBinaryFileCreateStruct;
use League\Flysystem\FileNotFoundException;
use League\Flysystem\FilesystemInterface;

class Flysystem implements IOMetadataHandler
{
    /** @var  FilesystemInterface */
    private $filesystem;

    public function __construct( FilesystemInterface $filesystem )
    {
        $this->filesystem = $filesystem;
    }

    /**
     * Only reads & return metadata, since the binarydata handler took care of creating the file already.
     *
     * @throws BinaryFileNotFoundException
     */
    public function create( SPIBinaryFileCreateStruct $spiBinaryFileCreateStruct )
    {
        return $this->load( $spiBinaryFileCreateStruct->id );
    }

    /**
     * Does really nothing, the binary data handler takes care of it.
     *
     * @param $spiBinaryFileId
     */
    public function delete( $spiBinaryFileId )
    {
    }

    public function load( $spiBinaryFileId )
    {
        try
        {
            $info = $this->filesystem->getMetadata( $spiBinaryFileId );
        }
        catch ( FileNotFoundException $e )
        {
            throw new BinaryFileNotFoundException( $spiBinaryFileId );
        }

        $spiBinaryFile = new SPIBinaryFile();
        $spiBinaryFile->id = $spiBinaryFileId;
        $spiBinaryFile->mtime = $info['timestamp'];
        $spiBinaryFile->size = $info['size'];

        return $spiBinaryFile;
    }

    public function exists( $spiBinaryFileId )
    {
        return $this->filesystem->has( $spiBinaryFileId );
    }

    public function getMimeType( $spiBinaryFileId )
    {
        return $this->filesystem->getMimetype( $spiBinaryFileId );
    }
}
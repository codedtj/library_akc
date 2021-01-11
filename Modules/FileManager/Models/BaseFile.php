<?php


namespace Modules\FileManager\Models;


/**
 * @property string mime_type
 * @property string original_filename
 * @property string filename
 * @property string hash
 * @property string extension
 * @property string path
 * @property int size
 * @property string disk
 */
class BaseFile extends File
{

    protected $table = 'files';

    public function setMimeType(string $mime)
    {
        $this->mime_type = $mime;
    }

    public function setOriginalFilename(string $name)
    {
        $this->original_filename = $name;
    }

    public function setFilename(string $name)
    {
        $this->filename = $name;
    }

    public function setHash(string $hash)
    {
        $this->hash = $hash;
    }

    public function setExtension(string $extension)
    {
        $this->extension = $extension;
    }

    public function setPath(string $path)
    {
        $this->path = $path;
    }

    public function setSize(int $size)
    {
        $this->size = $size;
    }

    public function setDisk(string $disk)
    {
        $this->disk = $disk;
    }

    public function getMimeType(): string
    {
        return $this->mime_type;
    }

    public function getOriginalFilename(): string
    {
        return $this->original_filename;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getDisk(): string
    {
        return $this->disk;
    }
}

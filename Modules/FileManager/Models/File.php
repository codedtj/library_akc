<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\FileManager\Models;

use Modules\Shared\Models\BaseModel;

abstract class File extends BaseModel
{
    public abstract function setMimeType(string $mime);

    public abstract function setOriginalFilename(string $name);

    public abstract function setFilename(string $name);

    public abstract function setHash(string $hash);

    public abstract function setExtension(string $extension);

    public abstract function setPath(string $path);

    public abstract function setSize(int $size);

    public abstract function getMimeType(): string;

    public abstract function getOriginalFilename(): string;

    public abstract function getFilename(): string;

    public abstract function getHash(): string;

    public abstract function getExtension(): string;

    public abstract function getPath(): string;

    public abstract function getSize(): int;
}

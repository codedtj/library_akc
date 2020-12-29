<?php
/**
 *
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru> on 16.07.2020
 */

namespace Modules\FileManager\Services;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use Modules\FileManager\Models\File;
use Modules\Shared\Libs\Random;

class InterventionImageFileService extends FileService
{
    public function store(Image $file, string $rootPath, File $entity, int $quality = 80,
                          string $extension = 'jpg', string $filename = 'noname',
                          string $disk = 'local'): File
    {
        $encoded = $file->encode($extension, $quality);

        $entity->setHash(hash('sha256', $encoded));
        $entity->setMimeType($file->mime);
        $entity->setOriginalFilename($filename);
        $entity->setExtension($extension);
        $entity->setSize(strlen($encoded->getEncoded()));

        $path = $rootPath . '/' . Random::generateString(3);

        $entity->setFilename($this->createFileName($path, $extension));
        $entity->setPath($path . '/' . $entity->getFilename());
        Storage::disk($disk)->put($entity->getPath(), $encoded);
        $entity->save();

        return $entity;
    }
}

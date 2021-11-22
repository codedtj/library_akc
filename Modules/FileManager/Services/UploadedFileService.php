<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\FileManager\Services;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\FileManager\Models\File;
use Modules\Shared\Libs\Random;

class UploadedFileService extends FileService
{

    public function store(UploadedFile $file, string $rootPath, File $entity, string $disk = 'local'): File
    {
//        $entity->setHash(hash('sha256', file_get_contents($file->path())));
        $entity->setHash('');
        $entity->setMimeType($file->getClientMimeType());
        $entity->setOriginalFilename($file->getClientOriginalName());
        $entity->setExtension($file->getClientOriginalExtension());
        $entity->setSize($file->getSize());

        $path = $rootPath . '/' . Random::generateString(3);
        $entity->setFilename($this->createFileName($path, $file->getClientOriginalExtension(), $disk));
        $entity->setPath(Storage::disk($disk)->putFileAs($path, $file, $entity->getFilename()));
        $entity->setDisk($disk);

        $entity->save();

        return $entity;
    }
}

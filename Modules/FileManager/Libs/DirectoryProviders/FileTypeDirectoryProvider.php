<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\FileManager\Libs\DirectoryProviders;


use Illuminate\Http\UploadedFile;
use Modules\FileManager\Interfaces\DirectoryProvider;
use Modules\FileManager\Libs\Helpers\FileHelper;

class FileTypeDirectoryProvider implements DirectoryProvider
{
    private UploadedFile $file;

    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }

    public function getDirectory(): string
    {
        return FileHelper::getUploadedFileType($this->file) . 's';
    }

    public function setFile(UploadedFile $file)
    {
        $this->file = $file;
    }
}

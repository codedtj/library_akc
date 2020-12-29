<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\FileManager\Libs\Helpers;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class FileHelper
{
    public static function getUploadedFileType(UploadedFile $file): string
    {
        return Str::of($file->getClientMimeType())->before('/');
    }
}

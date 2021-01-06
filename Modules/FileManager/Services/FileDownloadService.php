<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\FileManager\Services;


use Illuminate\Support\Facades\Storage;
use Modules\FileManager\Models\File;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileDownloadService
{
    public function download(File $file): StreamedResponse
    {
        return Storage::disk($file->disk)->download($file->getPath(), $file->getOriginalFilename());
    }
}

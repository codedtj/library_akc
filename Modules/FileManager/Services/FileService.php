<?php


namespace Modules\FileManager\Services;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\FileManager\Models\File;

abstract class FileService
{
    protected function createFileName($path, $extension, $disk = 'local'): string
    {
        $fileName = Str::uuid() . '.' . $extension;

        if (Storage::disk($disk)->exists($path . '/' . $fileName)) {
            return $this->createFileName($path, $extension);
        } else return $fileName;
    }

    public function destroy(File $file)
    {
        Storage::disk($file->disk)->delete($file->getPath());
        return $file->delete();
    }
}

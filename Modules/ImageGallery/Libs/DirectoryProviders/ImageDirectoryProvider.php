<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\ImageGallery\Libs\DirectoryProviders;


use Modules\FileManager\Interfaces\DirectoryProvider;

class ImageDirectoryProvider implements DirectoryProvider
{
    public function getDirectory(): string
    {
        return 'images';
    }
}

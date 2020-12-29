<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Models;


use Modules\FileManager\Models\BaseFile;
use Modules\ImageGallery\Models\Image;
use Modules\Shared\Models\BaseModel;

class Resource extends BaseModel
{
    public function file()
    {
        return $this->belongsTo(BaseFile::class, 'file_id');
    }

    public function cover(){
        return $this->belongsTo(Image::class);
    }

}

<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\FileManager\Interfaces;


interface DirectoryProvider
{
    public function getDirectory() : string;
}

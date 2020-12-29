<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\TagManager\Dtos;


use Spatie\DataTransferObject\FlexibleDataTransferObject;

class TagDto extends FlexibleDataTransferObject
{
    public ?string $id;

    public string $name;
}

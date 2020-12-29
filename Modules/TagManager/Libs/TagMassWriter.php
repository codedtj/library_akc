<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\TagManager\Libs;


use Modules\Shared\Libs\MassWriter;
use Modules\TagManager\Models\Tag;

class TagMassWriter extends MassWriter
{
    public function __construct(array $entities)
    {
        parent::__construct($entities);
        $this->entityClass = Tag::class;
    }
}

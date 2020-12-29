<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\TagManager\Services;

use Modules\TagManager\Dtos\TagDto;
use Modules\TagManager\Libs\TagMassWriter;
use Modules\TagManager\Models\Tag;
use Nwidart\Modules\Collection;

class TagService
{
    public function store(TagDto $data): Tag
    {
        return Tag::create([
            'name' => $data->name
        ]);
    }

    public function storeMany(Collection $tags)
    {
        $writer = new TagMassWriter($tags->map(function ($name) {
            return new Tag(['name' => $name]);
        })->toArray());

        $writer->write();
    }
}

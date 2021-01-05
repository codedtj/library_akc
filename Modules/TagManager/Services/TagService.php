<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\TagManager\Services;

use Illuminate\Support\Collection;
use Modules\TagManager\Dtos\TagDto;
use Modules\TagManager\Models\Tag;

class TagService
{
    public function store(TagDto $data): Tag
    {
        return Tag::create([
            'name' => $data->name
        ]);
    }

    public function storeMany(Collection $tagNames): Collection
    {
        return $tagNames->map(function ($name) {
            return Tag::firstOrCreate(['name' => $name]);
        });
    }
}

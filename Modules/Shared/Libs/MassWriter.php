<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Shared\Libs;


use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

abstract class MassWriter
{
    protected array $entities;
    protected array $data;
    protected string $entityClass;

    public function __construct(array $entities)
    {
        $this->entities = $entities;
        $this->data = [];
        $this->prepare();
    }

    /**
     * Convert models to array of attributes with generated uuid and created_at
     */
    private function prepare()
    {
        foreach ($this->entities as $entity) {
            $entity->id = Str::uuid();
            $entity->created_at = Carbon::now();
            $entity->created_by = auth()->id();
            $this->data[] = $entity->attributesToArray();
        };
    }

    /**
     * @return array of saved models
     */
    public function write(): array
    {
        if (count($this->data) === 0)
            return [];
        $this->entityClass::insert($this->data);
        return $this->entities;
    }
}

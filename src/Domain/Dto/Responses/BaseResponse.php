<?php

namespace IikoApi\Domain\Dto\Responses;

/**
 * Base class for all API response DTOs.
 *
 * Automatically maps array data to class properties
 * for fast object hydration.
 *
 * Extend this class in your response entities.
 */
class BaseResponse
{
    /**
     * Hydrate the object with the given data.
     *
     * @param  array<string, mixed>|null  $properties
     */
    public function __construct(?array $properties = null)
    {
        if (! is_null($properties)) {
            foreach ($properties as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * Create a new response object from array.
     *
     * @param  array<string, mixed>  $properties
     */
    public static function create(array $properties): static
    {
        return new static($properties);
    }

    /**
     * Create a collection of response objects from array of arrays.
     *
     * @param  array<array<string, mixed>>  $items
     * @return static[]
     */
    public static function collection(array $items): array
    {
        return array_map(fn ($item) => static::create($item), $items);
    }
}

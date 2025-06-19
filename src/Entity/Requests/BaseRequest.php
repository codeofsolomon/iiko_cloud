<?php

namespace IikoApi\Entity\Requests;

use JsonSerializable;


/**
 * Abstract base class for all request data transfer objects (DTOs).
 *
 * Provides utility methods for serializing request payloads,
 * automatically filtering out null values and recursively processing
 * nested objects and arrays. Useful for preparing clean and minimal
 * JSON payloads when interacting with APIs (e.g., iikoCloud).
 *
 * Extend this class in each specific request DTO to reuse
 * `prepareRequest()` logic and enable native JSON serialization
 * via `json_encode()`.
 *
 * @package IikoApi\Entity\Requests
 */
abstract class BaseRequest implements JsonSerializable
{
    
    /**
     * Generates a cleaned array representation of the request payload.
     *
     * - Removes any null properties.
     * - Handles nested arrays and objects.
     * - Converts nested objects into associative arrays,
     *   filtering out any null values within them.
     * - Supports complex nested request structures.
     *
     * @return array<string, mixed> The filtered associative array to be used in the API request.
     */
    public function prepareRequest(): array
    {
        $entity_vars = $this->pattern ?? \get_object_vars($this);

        $dynamic = [];

        foreach ($entity_vars as $key => $val) {
            if (\is_null($this->{$key})) {
                continue;
            }

            if (!\is_object($this->{$key}) && !is_array($this->{$key})) {
                $dynamic[$key] = $this->{$key};
            } elseif (is_array($this->{$key})) {
                foreach ($this->{$key} as $k => $v) {
                    if (is_object($v)) {
                        $array_from_object = \get_object_vars($v);

                        $array_from_object_null_filtered = \array_filter($array_from_object);
                        if (!empty($array_from_object_null_filtered)) {
                            $dynamic[$key][] = $array_from_object_null_filtered;
                        }
                    } else {
                        $dynamic[$key][] = $v;
                    }
                }
            } else {
                $a = \get_object_vars($this->{$key});
                $dynamic[$key] = \array_filter($a, function ($value) {
                    return $value !== null;
                });
            }
        }

        return $dynamic;
    }


    /**
     * Implements JsonSerializable to allow direct use with json_encode().
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return \get_object_vars($this);
    }
}
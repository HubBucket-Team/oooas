<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Exceptions\InvalidArgumentException;
use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $securityScheme
 * @property string[]|null $scopes
 */
class SecurityRequirement extends BaseObject
{
    /**
     * @var string|null
     */
    protected $securityScheme;

    /**
     * @var string[]|null
     */
    protected $scopes;

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement
     */
    public static function create(string $objectId = null): self
    {
        return new static($objectId);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme|string|null $securityScheme
     * @throws \GoldSpecDigital\ObjectOrientedOAS\Exceptions\InvalidArgumentException
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement
     */
    public function securityScheme($securityScheme): self
    {
        // If a SecurityScheme instance passed in, then use its Object ID.
        if ($securityScheme instanceof SecurityScheme) {
            $securityScheme = $securityScheme->objectId;
        }

        // If the $securityScheme is not a string or null then thrown an exception.
        if (!is_string($securityScheme) && !is_null($securityScheme)) {
            throw new InvalidArgumentException();
        }

        $instance = clone $this;

        $instance->securityScheme = $securityScheme;

        return $instance;
    }

    /**
     * @param string[] $scopes
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement
     */
    public function scopes(string ...$scopes): self
    {
        $instance = clone $this;

        $instance->scopes = $scopes ?: null;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            $this->securityScheme => $this->scopes ?? [],
        ]);
    }
}

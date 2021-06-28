<?php

declare(strict_types=1);

namespace Mageugenes\Recipes\Api\Data;

/**
 * @api
 */
interface RecipeInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @return string
     */
    public function getCategory(): string;

    /**
     * @return string
     */
    public function getTimeToMake(): string;

    /**
     * @return string
     */
    public function getImage(): string;

    /**
     * @return string
     */
    public function getLink(): string;

    /**
     * @return string
     */
    public function getUrl(): string;
}

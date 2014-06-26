<?php

namespace Edge\Ares\Decorator;

/**
 * Interface CurlDecoratorInterface
 * @author Marek Makovec <marek.makovec@edgedesign.cz>
 */
interface CurlDecoratorInterface
{
    /**
     * Sets up given cURL resource with desired parameters.
     *
     * @param resource $resource
     */
    public function decorate($resource);
} 
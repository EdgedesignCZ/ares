<?php

namespace Edge\Ares\Parser;

use Edge\Ares\Container\Address;

/**
 * Interface ParserInterface
 *
 * @author Marek Makovec <marek.makovec@edgedesign.cz>
 */
interface ParserInterface
{
    /**
     * Parse address from given XML and return Address object.
     *
     * @param string $xml
     *
     * @return Address
     */
    public function parseAddress($xml);
}

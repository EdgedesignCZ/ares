<?php

namespace Edge\Ares\Provider;

/**
 * @author Marek Makovec <marek.makovec@edgedesign.cz>
 */
interface ProviderInterface
{
    /**
     * Fetch XML describing subject with given ID.
     *
     * @param integer $ic
     *
     * @return string
     */
    public function fetchSubjectXml($ic);
}

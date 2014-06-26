<?php

namespace Edge\Ares;

use Edge\Ares\Container\Address;
use Edge\Ares\Exception\InvalidArgumentException;
use Edge\Ares\Parser\ParserInterface;
use Edge\Ares\Provider\ProviderInterface;

/**
 *
 * @author Marek Makovec <marek.makovec@edgedesign.cz>
 */
class Ares
{

    const ARES_API_URL = 'http://wwwinfo.mfcr.cz/cgi-bin/ares/darv_bas.cgi?ico=%s';

    private $parser;

    private $provider;

    public function __construct(ParserInterface $parser, ProviderInterface $provider)
    {
        $this->parser = $parser;
        $this->provider = $provider;
    }


    /**
     * @param int $ic
     *
     * @return Address
     *
     * @throws \Edge\Ares\Exception\ExceptionInterface
     */
    public function fetchSubjectAddress($ic)
    {
        $ic = (int) $ic;
        $this->assertIc($ic);

        $xml = $this->provider->fetchSubjectXml($ic);

        return $this->parser->parseAddress($xml);
    }

    /**
     * This method asserts that given IC is valid. If not, InvalidArgumentException is thrown.
     *
     * @param int $ic
     *
     * @throws \Edge\Ares\Exception\InvalidArgumentException
     */
    private function assertIc($ic)
    {
        if (!$ic) {
            throw new InvalidArgumentException('Given IC is not valid.');
        }
    }
}

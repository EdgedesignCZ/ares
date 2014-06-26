<?php

namespace Edge\Ares\Provider;
use Edge\Ares\Decorator\CurlDecoratorInterface;
use Edge\Ares\Exception\HttpException;

/**
 * @author Marek Makovec <marek.makovec@edgedesign.cz>
 */
class HttpProvider implements ProviderInterface
{
    const ARES_API_URL = 'http://wwwinfo.mfcr.cz/cgi-bin/ares/darv_bas.cgi?ico=%s';

    /**
     * @var \Edge\Ares\Decorator\CurlDecoratorInterface
     */
    private $decorator;

    public function __construct(CurlDecoratorInterface $decorator = null)
    {
        $this->decorator = $decorator;
    }


    /**
     * Fetch XML describing subject with given ID.
     *
     * @param integer $ic
     *
     * @throws \Edge\Ares\Exception\HttpException
     * @return string
     */
    public function fetchSubjectXml($ic)
    {
        $url = $this->generateUrl($ic);
        $session = curl_init($url);

        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        if ($this->decorator) {
            $this->decorator->decorate($session);
        }

        $xml = curl_exec($session);

        if($xml === false) {
            throw new HttpException('cURL error: ' . curl_errno($session));
        }

        curl_close($session);

        return $xml;
    }

    /**
     * Create full url where subject information is stored.
     *
     * @param int $ic
     *
     * @return string
     */
    private function generateUrl($ic)
    {
        return sprintf(self::ARES_API_URL, $ic);
    }
}
<?php

namespace Edge\Ares\Decorator;

/**
 * Class ProxyCurlDecorator
 *
 * @author Marek Makovec <marek.makovec@edgedesign.cz>
 */
class ProxyCurlDecorator implements CurlDecoratorInterface
{

    private $proxyHost;

    private $proxyPort;

    private $proxyUser;

    private $proxyPassword;

    /**
     * @param string $proxyHost
     * @param string $proxyPort
     * @param string|false $proxyUser
     * @param string|false $proxyPassword
     */
    public function __construct($proxyHost, $proxyPort, $proxyUser = false, $proxyPassword = false)
    {
        $this->proxyHost = $proxyHost;
        $this->proxyPort = $proxyPort;
        $this->proxyUser = $proxyUser;
        $this->proxyPassword = $proxyPassword;
    }


    /**
     * Sets up given cURL resource with desired parameters.
     *
     * @param resource $resource
     */
    public function decorate($resource)
    {
        curl_setopt($resource, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt(
            $resource,
            CURLOPT_PROXY,
            sprintf(
                '%s:%s',
                $this->proxyHost,
                $this->proxyPort
            )
        );

        if ($this->proxyUser && $this->proxyPassword) {
            curl_setopt(
                $resource,
                CURLOPT_PROXYUSERPWD,
                sprintf(
                    '%s:%s',
                    $this->proxyUser,
                    $this->proxyPassword
                )
            );
        }
    }
}
<?php

namespace Edge\Ares\Container;

/**
 * Class AddressContainer
 *
 * @author Marek Makovec <marek.makovec@edgedesign.cz>
 */
class Address
{
    /** @var int */
    private $ico;

    /** @var string */
    private $dic;

    /** @var string */
    private $firma;

    /** @var string */
    private $ulice;

    /** @var int */
    private $cisloOrientacni;

    /** @var int */
    private $cisloPopisne;

    /** @var string */
    private $mesto;

    /** @var string */
    private $castObce;

    /** @var int */
    private $psc;

    public function __construct($castObce, $cisloOrientacni, $cisloPopisne, $dic, $firma, $ico, $mesto, $psc, $ulice)
    {
        $this->castObce = $castObce;
        $this->cisloOrientacni = $cisloOrientacni;
        $this->cisloPopisne = $cisloPopisne;
        $this->dic = $dic;
        $this->firma = $firma;
        $this->ico = $ico;
        $this->mesto = $mesto;
        $this->psc = $psc;
        $this->ulice = $ulice;
    }

    /**
     * @return string
     */
    public function getCastObce()
    {
        return $this->castObce;
    }

    /**
     * @return int
     */
    public function getCisloOrientacni()
    {
        return $this->cisloOrientacni;
    }

    /**
     * @return int
     */
    public function getCisloPopisne()
    {
        return $this->cisloPopisne;
    }

    /**
     * @return string
     */
    public function getDic()
    {
        return $this->dic;
    }

    /**
     * @return string
     */
    public function getFirma()
    {
        return $this->firma;
    }

    /**
     * @return int
     */
    public function getIco()
    {
        return $this->ico;
    }

    /**
     * @return string
     */
    public function getMesto()
    {
        return $this->mesto;
    }

    /**
     * @return int
     */
    public function getPsc()
    {
        return $this->psc;
    }

    /**
     * @return string
     */
    public function getUlice()
    {
        return $this->ulice;
    }
}

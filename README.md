# Edgedesign ARES
Simple library for fetching information about legal subjects from Czech database called ARES.cz

## Usage

In simplest case, without using any proxy server, library can be instantiated like this:
```php
$parser = new \Edge\Ares\Parser\AddressParser();
$provider = new \Edge\Ares\Provider\HttpProvider();
$ares = new \Edge\Ares\Ares($parser, $provider);
```

In case proxy server needs to be specified, you can use this way:
```php
$proxyDecorator = new \Edge\Ares\Decorator\ProxyCurlDecorator($hostname, $proxy);
$parser = new \Edge\Ares\Parser\AddressParser();
$provider = new \Edge\Ares\Provider\HttpProvider($proxyDecorator);
$ares = new \Edge\Ares\Ares($parser, $provider);
```

When credentials needs to be specified too, you can slightly modify the example above:
```php
$proxyDecorator = new \Edge\Ares\Decorator\ProxyCurlDecorator($hostname, $proxy, $username, $password);
$parser = new \Edge\Ares\Parser\AddressParser();
$provider = new \Edge\Ares\Provider\HttpProvider($proxyDecorator);
$ares = new \Edge\Ares\Ares($parser, $provider);
```

When \Edge\Ares\Ares is instantiated, you can use it like this:
```php
try {
    /** @var \Edge\Ares\Ares $ares */
    /** @var \Edge\Ares\Container\Address $address */
    $address = $ares->fetchSubjectAddress(12345678);
} catch (\Edge\Ares\Exception\ExceptionInterface $e) {
    // Do some error handling here.
}
```
<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite014c57c9e1a5da341728ddb7f2e121d
{
    public static $files = array(
        'e40631d46120a9c38ea139981f8dab26' => __DIR__ . '/..' . '/ircmaxell/password-compat/lib/password.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        'edc6464955a37aa4d5fbf39d40fb6ee7' => __DIR__ . '/..' . '/symfony/polyfill-php55/bootstrap.php',
        '3e2471375464aac821502deb0ac64275' => __DIR__ . '/..' . '/symfony/polyfill-php54/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array(
        'T' =>
            array(
                'Twig\\' => 5,
            ),
        'S' =>
            array(
                'Symfony\\Polyfill\\Php55\\' => 23,
                'Symfony\\Polyfill\\Php54\\' => 23,
                'Symfony\\Polyfill\\Mbstring\\' => 26,
                'Symfony\\Component\\Routing\\' => 26,
                'Symfony\\Component\\HttpKernel\\' => 29,
                'Symfony\\Component\\HttpFoundation\\' => 33,
                'Symfony\\Component\\EventDispatcher\\' => 34,
                'Symfony\\Component\\Debug\\' => 24,
                'Silex\\' => 6,
            ),
        'P' =>
            array(
                'Psr\\Log\\' => 8,
            ),
    );

    public static $prefixDirsPsr4 = array(
        'Twig\\' =>
            array(
                0 => __DIR__ . '/..' . '/twig/twig/src',
            ),
        'Symfony\\Polyfill\\Php55\\' =>
            array(
                0 => __DIR__ . '/..' . '/symfony/polyfill-php55',
            ),
        'Symfony\\Polyfill\\Php54\\' =>
            array(
                0 => __DIR__ . '/..' . '/symfony/polyfill-php54',
            ),
        'Symfony\\Polyfill\\Mbstring\\' =>
            array(
                0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
            ),
        'Symfony\\Component\\Routing\\' =>
            array(
                0 => __DIR__ . '/..' . '/symfony/routing',
            ),
        'Symfony\\Component\\HttpKernel\\' =>
            array(
                0 => __DIR__ . '/..' . '/symfony/http-kernel',
            ),
        'Symfony\\Component\\HttpFoundation\\' =>
            array(
                0 => __DIR__ . '/..' . '/symfony/http-foundation',
            ),
        'Symfony\\Component\\EventDispatcher\\' =>
            array(
                0 => __DIR__ . '/..' . '/symfony/event-dispatcher',
            ),
        'Symfony\\Component\\Debug\\' =>
            array(
                0 => __DIR__ . '/..' . '/symfony/debug',
            ),
        'Silex\\' =>
            array(
                0 => __DIR__ . '/..' . '/silex/silex/src/Silex',
            ),
        'Psr\\Log\\' =>
            array(
                0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
            ),
    );

    public static $prefixesPsr0 = array(
        'T' =>
            array(
                'Twig_' =>
                    array(
                        0 => __DIR__ . '/..' . '/twig/twig/lib',
                    ),
            ),
        'S' =>
            array(
                'Symfony\\Bridge\\Twig' =>
                    array(
                        0 => __DIR__ . '/..' . '/symfony/twig-bridge',
                    ),
            ),
        'P' =>
            array(
                'Pimple' =>
                    array(
                        0 => __DIR__ . '/..' . '/pimple/pimple/lib',
                    ),
            ),
    );

    public static $classMap = array(
        'CallbackFilterIterator' => __DIR__ . '/..' . '/symfony/polyfill-php54/Resources/stubs/CallbackFilterIterator.php',
        'RecursiveCallbackFilterIterator' => __DIR__ . '/..' . '/symfony/polyfill-php54/Resources/stubs/RecursiveCallbackFilterIterator.php',
        'SessionHandlerInterface' => __DIR__ . '/..' . '/symfony/polyfill-php54/Resources/stubs/SessionHandlerInterface.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite014c57c9e1a5da341728ddb7f2e121d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite014c57c9e1a5da341728ddb7f2e121d::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInite014c57c9e1a5da341728ddb7f2e121d::$prefixesPsr0;
            $loader->classMap = ComposerStaticInite014c57c9e1a5da341728ddb7f2e121d::$classMap;

        }, null, ClassLoader::class);
    }
}

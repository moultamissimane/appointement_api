<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit1c3260cfa4cff3800f50c4f7595d8739
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit1c3260cfa4cff3800f50c4f7595d8739', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit1c3260cfa4cff3800f50c4f7595d8739', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        \Composer\Autoload\ComposerStaticInit1c3260cfa4cff3800f50c4f7595d8739::getInitializer($loader)();

        $loader->register(true);

        return $loader;
    }
}

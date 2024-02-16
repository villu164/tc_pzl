<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc6c97df0e532bfa7a466eae4cda857ba
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

        spl_autoload_register(array('ComposerAutoloaderInitc6c97df0e532bfa7a466eae4cda857ba', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc6c97df0e532bfa7a466eae4cda857ba', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc6c97df0e532bfa7a466eae4cda857ba::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
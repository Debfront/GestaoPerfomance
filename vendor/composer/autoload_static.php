<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit339e05bce4fe78e4a6d651452bc88bad
{
    public static $prefixesPsr0 = array (
        'J' => 
        array (
            'JasperPHP' => 
            array (
                0 => __DIR__ . '/..' . '/cossou/jasperphp/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit339e05bce4fe78e4a6d651452bc88bad::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit339e05bce4fe78e4a6d651452bc88bad::$classMap;

        }, null, ClassLoader::class);
    }
}

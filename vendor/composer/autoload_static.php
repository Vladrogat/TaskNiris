<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3010d67e62c127b1e5b336a03aaecb64
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3010d67e62c127b1e5b336a03aaecb64::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3010d67e62c127b1e5b336a03aaecb64::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3010d67e62c127b1e5b336a03aaecb64::$classMap;

        }, null, ClassLoader::class);
    }
}

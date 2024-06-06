<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb3f90c694e4412ebdefbc4b6ddefab39
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Midtrans\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Midtrans\\' => 
        array (
            0 => __DIR__ . '/..' . '/midtrans/midtrans-php/Midtrans',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb3f90c694e4412ebdefbc4b6ddefab39::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb3f90c694e4412ebdefbc4b6ddefab39::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb3f90c694e4412ebdefbc4b6ddefab39::$classMap;

        }, null, ClassLoader::class);
    }
}

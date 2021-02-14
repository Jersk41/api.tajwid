<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0fe20372aef9f1d23f16e4546c7e8649
{
    public static $prefixLengthsPsr4 = array (
        'y' => 
        array (
            'yidas\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'yidas\\' => 
        array (
            0 => __DIR__ . '/..' . '/yidas/codeigniter-rest/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0fe20372aef9f1d23f16e4546c7e8649::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0fe20372aef9f1d23f16e4546c7e8649::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0fe20372aef9f1d23f16e4546c7e8649::$classMap;

        }, null, ClassLoader::class);
    }
}
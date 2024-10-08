<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit28cca52e4ede3a6b9b72540cb1d1a98e
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Aliyun\\Test\\' => 12,
            'Aliyun\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Aliyun\\Test\\' => 
        array (
            0 => __DIR__ . '/..' . '/jjonline/aliyun-dysms-php-sdk/tests',
        ),
        'Aliyun\\' => 
        array (
            0 => __DIR__ . '/..' . '/jjonline/aliyun-dysms-php-sdk/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit28cca52e4ede3a6b9b72540cb1d1a98e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit28cca52e4ede3a6b9b72540cb1d1a98e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit28cca52e4ede3a6b9b72540cb1d1a98e::$classMap;

        }, null, ClassLoader::class);
    }
}

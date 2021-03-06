<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6aeb6cee9d7e42938328db4573844d0c
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Chat\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Chat\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6aeb6cee9d7e42938328db4573844d0c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6aeb6cee9d7e42938328db4573844d0c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6aeb6cee9d7e42938328db4573844d0c::$classMap;

        }, null, ClassLoader::class);
    }
}

After Laravel section......
to get to /usr/local/bin
ln -s /opt/lampp/bin/php /usr/local/bin/php
{
            "name": "intervention/image",
            "version": "2.2.1",
            "source": {
                "type": "git",
                "url": "https://github.com/Intervention/image.git",
                "reference": "79f0a35da7d4f75bb85d9c04513dd5929e21f75e"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/Intervention/image/zipball/79f0a35da7d4f75bb85d9c04513dd5929e21f75e",
                "reference": "79f0a35da7d4f75bb85d9c04513dd5929e21f75e",
                "shasum": ""
            },
            "require": {
                "ext-fileinfo": "*",
                "php": ">=5.3.0"
            },
            "require-dev": {
                "mockery/mockery": "~0.9.2",
                "phpunit/phpunit": "3.*"
            },
            "suggest": {
                "ext-gd": "to use GD library based image processing.",
                "ext-imagick": "to use Imagick based image processing.",
                "intervention/imagecache": "Caching extension for the Intervention Image library"
            },
            "type": "library",
            "autoload": {
                "psr-4": {
                    "Intervention\\Image\\": "src/Intervention/Image"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Oliver Vogel",
                    "email": "oliver@olivervogel.net",
                    "homepage": "http://olivervogel.net/"
                }
            ],
            "description": "Image handling and manipulation library with support for Laravel integration",
            "homepage": "http://image.intervention.io/",
            "keywords": [
                "gd",
                "image",
                "imagick",
                "laravel",
                "thumbnail",
                "watermark"
            ],
            "time": "2015-05-09 16:06:30"
        },
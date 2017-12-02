# Flysystem Factory

This is a factory package to provide for an easy to use configuration and api for flysystem users.

**Package details** 

[![Latest Release Version](https://img.shields.io/github/release/mjrider/flysystem-factory.svg?style=flat-square)](https://packagist.org/packages/mjrider/flysystem-factory)
[![License](https://img.shields.io/github/license/mjrider/flysystem-factory.svg?style=flat-square)](https://packagist.org/packages/mjrider/flysystem-factory)
![Maintenance](https://img.shields.io/maintenance/yes/2017.svg?style=flat-square)
[![Total Downloads](https://img.shields.io/packagist/dt/mjrider/flysystem-factory.svg?style=flat-square)](https://packagist.org/packages/mjrider/flysystem-factory)

**Code quality**

[![Build Status](https://travis-ci.org/mjrider/flysystem-factory.svg?branch=master)](https://travis-ci.org/mjrider/flysystem-factory)

**Compatibility** 

![PHP_Compatibility 5.4 and up](https://img.shields.io/badge/empty-yes-brightgreen.svg?&label=PHP%20>=%205.4&style=flat-square)
![PHP_Compatibility 7.0 and up](https://img.shields.io/badge/empty-yes-brightgreen.svg?&label=PHP%20>=%207.0&style=flat-square)

## Usage

You can require the bundle:
```
composer require mjrider/flysystem-factory
```

Or, if you prefer, you can add the following line to your `composer.json` file:

```json
"require": {
   "mjrider/flysystem-factory": "^0.1"
}
```

Various backends require additional composer packages. Due to the fact that some are mutual exclusive they are not not a dependency for this package. Please install them conform your own needs

Adapters:
* S3: `league/flysystem-aws-s3-v3`
* B2: `mhetreramesh/flysystem-backblaze`
* S3v2: `league/flysystem-aws-s3-v2`

Caching:
* Predis: `predis/predis`
* Memcached: `ext-memcached`

## Examples
Examples are listed in de [examples.md]

## Upgrading

From time to time there will be breaking change. These will be documented in [UPGRADING.md]. 

It is highly recommended to check what has changed before upgrading to a new minor or major release.
 
[UPGRADING.md]: https://github.com/mjrider/flysystem-factory/blob/master/UPGRADING.md

### Enforcement
The `master` branch is protected so that _at least_ one other developer approves
 by reviewing the change.

For more information about required reviews for pull requests, please check the official GitHub documentation about
[this subject].

[this subject]: https://help.github.com/articles/about-required-reviews-for-pull-requests/

## Authors & Contributors

For a full list off all author and/or contributors, please check the [contributors page].

[contributors page]: https://github.com/mjrider/flysystem-factory/graphs/contributors

## License
MIT License

Copyright (c) 2017 Robbert Müller

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

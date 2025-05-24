# GB/T 3304

[![Latest Version](https://img.shields.io/packagist/v/tourze/gb-t-3304.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-3304)
[![Build Status](https://github.com/tourze/gb-t-3304/actions/workflows/ci.yml/badge.svg)](https://github.com/tourze/gb-t-3304/actions)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

## Introduction

This package implements the GB/T 3304-1991 standard "Names of nationalities of China in romanization with codes" as a type-safe PHP 8.1+ enum. It provides both numeric (01-56) and two-letter (HA-JN) codes for all 56 officially recognized Chinese ethnic groups, with convenient integration interfaces for modern PHP applications.

## Features

- Full coverage of all 56 Chinese nationalities
- Provides numeric codes (01-56) and two-letter codes (HA-JN)
- Implements `Labelable`, `Itemable`, and `Selectable` interfaces for easy integration
- Type-safe, robust enum implementation
- Simple API for code, label, and mapping conversion
- Well-tested with PHPUnit

## Installation

**Requirements:**

- PHP >= 8.1
- Composer
- Dependency: `tourze/enum-extra ~0.0.5`

**Install via Composer:**

```bash
composer require tourze/gb-t-3304
```

## Quick Start

```php
use Tourze\GBT3304\Nationality;

// Get numeric code
$code = Nationality::Han->value; // "01"

// Get Chinese label
$label = Nationality::Han->getLabel(); // "汉族"

// Get two-letter code
$alphaCode = Nationality::Han->toCode(); // "HA"
```

## Documentation

- [API Reference](https://github.com/tourze/gb-t-3304)
- See source code and tests for advanced usage
- All enums implement `Labelable`, `Itemable`, `Selectable` for flexible integration

## Contributing

- Please submit issues or pull requests via GitHub
- Follow PSR-12 coding style
- Ensure all tests pass (`composer test`)
- Add tests for new features

## License

MIT License. See [LICENSE](LICENSE) for details.

## Changelog

See [CHANGELOG.md](CHANGELOG.md) for release history and upgrade notes.

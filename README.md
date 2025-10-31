# GB/T 3304

[English](README.md) | [中文](README.zh-CN.md)

[![Latest Version](https://img.shields.io/packagist/v/tourze/gb-t-3304.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-3304)
[![Build Status](https://github.com/tourze/gb-t-3304/actions/workflows/ci.yml/badge.svg)](https://github.com/tourze/gb-t-3304/actions)
[![Quality Score](https://img.shields.io/scrutinizer/g/tourze/gb-t-3304.svg?style=flat-square)](https://scrutinizer-ci.com/g/tourze/gb-t-3304)
[![Total Downloads](https://img.shields.io/packagist/dt/tourze/gb-t-3304.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-3304)
[![PHP Version Require](https://img.shields.io/packagist/php-v/tourze/gb-t-3304.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-3304)
[![Coverage Status](https://img.shields.io/badge/coverage-100%25-brightgreen.svg?style=flat-square)](https://github.com/tourze/gb-t-3304)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

## Introduction

This package implements the GB/T 3304-1991 standard "Names of nationalities of China in romanization with codes" as a type-safe PHP 8.1+ enum.
It provides both numeric (01-56) and two-letter (HA-JN) codes for all 56 officially recognized Chinese ethnic groups,
with convenient integration interfaces for modern PHP applications.

## Overview

GB/T 3304-1991 is a Chinese national standard that defines the romanization and coding system for Chinese ethnic groups.
This package provides a modern PHP implementation using enums, making it easy to work with Chinese nationality data in a type-safe manner.

## Features

- **Complete Coverage**: All 56 officially recognized Chinese ethnic groups
- **Dual Coding System**: Both numeric codes (01-56) and two-letter codes (HA-JN)
- **Type Safety**: Modern PHP 8.1+ enum implementation
- **Easy Integration**: Implements `Labelable`, `Itemable`, and `Selectable` interfaces
- **Clean API**: Simple methods for code, label, and mapping conversion
- **Well Tested**: Comprehensive PHPUnit test suite with 100% coverage
- **Standards Compliant**: Follows GB/T 3304-1991 specification exactly

## Installation

**Requirements:**

- PHP >= 8.1
- Composer
- Dependency: `tourze/enum-extra ~0.1.0`

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

## Advanced Usage

### Getting All Nationalities

```php
// Get all nationality options for forms/selects
$options = Nationality::getSelectOptions();
// Returns: ['01' => '汉族', '02' => '蒙古族', ...]

// Get as items for API responses
$items = Nationality::getItems();
// Returns: [['value' => '01', 'label' => '汉族'], ...]
```

### Finding by Code

```php
// From numeric code
$nationality = Nationality::from('01'); // Han

// From alpha code (you'll need to implement this if needed)
$han = array_search('HA', array_map(fn($n) => $n->toCode(), Nationality::cases()));
```

### Integration with Forms

```php
// Symfony forms
$builder->add('nationality', ChoiceType::class, [
    'choices' => Nationality::getSelectOptions(),
]);

// Laravel
Form::select('nationality', Nationality::getSelectOptions());
```

## API Reference

### Methods

- `getLabel(): string` - Returns the Chinese name of the nationality
- `toCode(): string` - Returns the two-letter code
- `value` - The numeric code (01-56)
- `getSelectOptions(): array` - Returns all options for dropdowns
- `getItems(): array` - Returns all items for API responses

### Interfaces

- `Labelable` - Provides `getLabel()` method
- `Itemable` - Provides `getItems()` static method  
- `Selectable` - Provides `getSelectOptions()` static method

## Development

### Running Tests

```bash
# Run all tests
composer test

# Run with coverage
composer test-coverage

# Run PHPStan
composer analyse
```

### Code Quality

This package maintains high code quality standards:

- PHPStan Level 9 (maximum)
- 100% test coverage
- PSR-12 coding standards
- No external dependencies except `tourze/enum-extra`

## Contributing

Contributions are welcome! Please follow these guidelines:

1. **Issues**: Report bugs or request features via GitHub Issues
2. **Pull Requests**: Fork the repo and submit PRs against the main branch
3. **Code Style**: Follow PSR-12 coding standards
4. **Testing**: Ensure all tests pass and add tests for new features
5. **Documentation**: Update README and docblocks as needed

### Development Setup

```bash
git clone https://github.com/tourze/gb-t-3304.git
cd gb-t-3304
composer install
composer test
```

## License

MIT License. See [LICENSE](LICENSE) for details.


## Related Standards

- [GB/T 3304-1991](https://openstd.samr.gov.cn/bzgk/gb/newGbInfo?hcno=E5C3271B62636C5DA6853A0DA23EBBA9) - Official standard document
- [ISO 639](https://www.iso.org/iso-639-language-codes.html) - Language codes standard
- [ISO 3166](https://www.iso.org/iso-3166-country-codes.html) - Country codes standard

## Security

If you discover any security-related issues, please email security@tourze.org instead of using the issue tracker.

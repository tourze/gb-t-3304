# GB/T 3304

[English](#english) | [中文](#中文)

## English

### Introduction

This package provides an implementation of the GB/T 3304-1991 standard "Names of nationalities of China in romanization with codes" as a PHP 8.1+ enum.

### Features

- Complete implementation of all 56 ethnic groups in China
- Provides both numeric codes (01-56) and two-letter codes (HA-JN)
- Implements `Labelable`, `Itemable`, and `Selectable` interfaces for easy integration
- Type-safe enum implementation

### Requirements

- PHP 8.1 or higher
- tourze/enum-extra package

### Installation

```bash
composer require tourze/gb-t-3304
```

### Usage

```php
use Tourze\GBT3304\Nationality;

// Get numeric code
$code = Nationality::Han->value; // "01"

// Get Chinese label
$label = Nationality::Han->getLabel(); // "汉族"

// Get two-letter code
$letterCode = Nationality::Han->toCode(); // "HA"

// Get all options for select
$options = Nationality::getItems(); // Returns array of all nationalities
```

## 中文

### 简介

本包提供了 GB/T 3304-1991 标准《中国各民族名称的罗马字母拼写法和代码》的 PHP 8.1+ 枚举实现。

### 特性

- 完整实现了中国 56 个民族
- 提供数字代码（01-56）和双字母代码（HA-JN）
- 实现了 `Labelable`、`Itemable` 和 `Selectable` 接口，便于集成
- 类型安全的枚举实现

### 要求

- PHP 8.1 或更高版本
- tourze/enum-extra 包

### 安装

```bash
composer require tourze/gb-t-3304
```

### 使用示例

```php
use Tourze\GBT3304\Nationality;

// 获取数字代码
$code = Nationality::Han->value; // "01"

// 获取中文名称
$label = Nationality::Han->getLabel(); // "汉族"

// 获取双字母代码
$letterCode = Nationality::Han->toCode(); // "HA"

// 获取所有选项（用于下拉选择等）
$options = Nationality::getItems(); // 返回所有民族的数组
```

# GB/T 3304

[English](README.md) | [中文](README.zh-CN.md)

[![最新版本](https://img.shields.io/packagist/v/tourze/gb-t-3304.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-3304)
[![构建状态](https://github.com/tourze/gb-t-3304/actions/workflows/ci.yml/badge.svg)](https://github.com/tourze/gb-t-3304/actions)
[![代码质量](https://img.shields.io/scrutinizer/g/tourze/gb-t-3304.svg?style=flat-square)](https://scrutinizer-ci.com/g/tourze/gb-t-3304)
[![总下载量](https://img.shields.io/packagist/dt/tourze/gb-t-3304.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-3304)
[![PHP 版本要求](https://img.shields.io/packagist/php-v/tourze/gb-t-3304.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-3304)
[![代码覆盖率](https://img.shields.io/badge/coverage-100%25-brightgreen.svg?style=flat-square)](https://github.com/tourze/gb-t-3304)
[![协议](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

## 简介

本包实现了 GB/T 3304-1991 标准《中国各民族名称的罗马字母拼写法和代码》的 PHP 8.1+ 类型安全枚举，
覆盖中国官方56个民族，支持数字代码（01-56）和双字母代码（HA-JN），
并提供现代 PHP 应用集成的便利接口。

## 概述

GB/T 3304-1991 是中国国家标准，定义了中国各民族名称的罗马字母拼写法和代码规范。
本包提供了使用 PHP 枚举的现代化实现，使您能够以类型安全的方式处理中国民族数据。

## 特性

- **完整覆盖**：包含中国官方认定的全部56个民族
- **双重编码系统**：同时支持数字代码（01-56）和双字母代码（HA-JN）
- **类型安全**：现代 PHP 8.1+ 枚举实现
- **便于集成**：实现 `Labelable`、`Itemable`、`Selectable` 接口
- **清晰的 API**：简单的方法进行代码、标签和映射转换
- **完善测试**：全面的 PHPUnit 测试套件，100% 代码覆盖率
- **标准合规**：严格遵循 GB/T 3304-1991 规范

## 安装

**环境要求：**

- PHP >= 8.1
- Composer
- 依赖：`tourze/enum-extra ~0.1.0`

**Composer 安装：**

```bash
composer require tourze/gb-t-3304
```

## 快速开始

```php
use Tourze\GBT3304\Nationality;

// 获取数字代码
$code = Nationality::Han->value; // "01"

// 获取中文名称
$label = Nationality::Han->getLabel(); // "汉族"

// 获取双字母代码
$alphaCode = Nationality::Han->toCode(); // "HA"
```

## 高级用法

### 获取所有民族

```php
// 获取所有民族选项用于表单/下拉框
$options = Nationality::getSelectOptions();
// 返回：['01' => '汉族', '02' => '蒙古族', ...]

// 获取数据项用于 API 响应
$items = Nationality::getItems();
// 返回：[['value' => '01', 'label' => '汉族'], ...]
```

### 按代码查找

```php
// 从数字代码
$nationality = Nationality::from('01'); // Han

// 从字母代码（如需要可以实现）
$han = array_search('HA', array_map(fn($n) => $n->toCode(), Nationality::cases()));
```

### 表单集成

```php
// Symfony 表单
$builder->add('nationality', ChoiceType::class, [
    'choices' => Nationality::getSelectOptions(),
]);

// Laravel
Form::select('nationality', Nationality::getSelectOptions());
```

## API 参考

### 方法

- `getLabel(): string` - 返回民族的中文名称
- `toCode(): string` - 返回双字母代码
- `value` - 数字代码（01-56）
- `getSelectOptions(): array` - 返回所有选项用于下拉框
- `getItems(): array` - 返回所有数据项用于 API 响应

### 接口

- `Labelable` - 提供 `getLabel()` 方法
- `Itemable` - 提供 `getItems()` 静态方法  
- `Selectable` - 提供 `getSelectOptions()` 静态方法

## 开发

### 运行测试

```bash
# 运行所有测试
composer test

# 运行带覆盖率的测试
composer test-coverage

# 运行 PHPStan
composer analyse
```

### 代码质量

本包保持高代码质量标准：

- PHPStan Level 9（最高级别）
- 100% 测试覆盖率
- PSR-12 编码标准
- 除 `tourze/enum-extra` 外无外部依赖

## 贡献指南

欢迎贡献！请遵循以下指南：

1. **问题报告**：通过 GitHub Issues 报告 Bug 或请求功能
2. **拉取请求**：Fork 仓库并向 main 分支提交 PR
3. **代码风格**：遵循 PSR-12 编码标准
4. **测试**：确保所有测试通过并为新功能添加测试
5. **文档**：根据需要更新 README 和文档注释

### 开发环境设置

```bash
git clone https://github.com/tourze/gb-t-3304.git
cd gb-t-3304
composer install
composer test
```

## 版权和许可

MIT 协议。详见 [LICENSE](LICENSE) 文件获取更多信息。


## 相关标准

- [GB/T 3304-1991](https://openstd.samr.gov.cn/bzgk/gb/newGbInfo?hcno=E5C3271B62636C5DA6853A0DA23EBBA9) - 官方标准文档
- [ISO 639](https://www.iso.org/iso-639-language-codes.html) - 语言代码标准
- [ISO 3166](https://www.iso.org/iso-3166-country-codes.html) - 国家代码标准

## 安全

如果您发现任何安全相关问题，请发送邮件至 security@tourze.org，而不是使用问题跟踪器。

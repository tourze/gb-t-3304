# GB/T 3304

[![最新版本](https://img.shields.io/packagist/v/tourze/gb-t-3304.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-3304)
[![构建状态](https://github.com/tourze/gb-t-3304/actions/workflows/ci.yml/badge.svg)](https://github.com/tourze/gb-t-3304/actions)
[![协议](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

## 简介

本包实现了 GB/T 3304-1991 标准《中国各民族名称的罗马字母拼写法和代码》的 PHP 8.1+ 类型安全枚举，覆盖中国官方56个民族，支持数字代码（01-56）和双字母代码（HA-JN），并提供现代 PHP 应用集成的便利接口。

## 特性

- 覆盖中国全部56个民族
- 提供数字代码（01-56）和双字母代码（HA-JN）
- 实现 `Labelable`、`Itemable`、`Selectable` 等接口，便于集成
- 类型安全、健壮的枚举实现
- 简单易用的API，支持代码、名称、映射转换
- 完善的单元测试

## 安装

**环境要求：**

- PHP >= 8.1
- Composer
- 依赖：`tourze/enum-extra ~0.0.5`

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

## 详细文档

- [API 文档](https://github.com/tourze/gb-t-3304)
- 高级用法请参考源码及测试
- 所有枚举均实现 `Labelable`、`Itemable`、`Selectable` 接口，便于灵活集成

## 贡献指南

- 请通过 GitHub 提交 issue 或 PR
- 遵循 PSR-12 代码规范
- 提交前请确保所有测试通过（`composer test`）
- 新功能请补充测试用例

## 版权和许可

MIT 协议，详见 [LICENSE](LICENSE)

## 更新日志

详见 [CHANGELOG.md](CHANGELOG.md)

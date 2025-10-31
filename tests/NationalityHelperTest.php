<?php

declare(strict_types=1);

namespace Tourze\GBT3304\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Tourze\GBT3304\Nationality;
use Tourze\GBT3304\Tests\Helpers\NationalityTestHelper;

/**
 * 测试 NationalityTestHelper 辅助类
 *
 * @internal
 */
#[CoversClass(NationalityTestHelper::class)]
final class NationalityHelperTest extends TestCase
{
    /**
     * 测试获取随机民族
     */
    public function testGetRandomNationality(): void
    {
        $nationality = NationalityTestHelper::getRandomNationality();
        $this->assertInstanceOf(Nationality::class, $nationality);
    }

    /**
     * 测试获取所有数字代码
     */
    public function testGetAllNumericCodes(): void
    {
        $codes = NationalityTestHelper::getAllCodesOfType('numeric');

        $this->assertNotEmpty($codes);
        $this->assertCount(56, $codes);
        $this->assertContains('01', $codes);
        $this->assertContains('56', $codes);
    }

    /**
     * 测试获取所有字母代码
     */
    public function testGetAllAlphaCodes(): void
    {
        $codes = NationalityTestHelper::getAllCodesOfType('alpha');

        $this->assertNotEmpty($codes);
        $this->assertCount(56, $codes);
        $this->assertContains('HA', $codes);
        $this->assertContains('JN', $codes);
    }

    /**
     * 测试创建代码到名称的映射
     */
    public function testCreateCodeToLabelMap(): void
    {
        $map = NationalityTestHelper::createCodeToLabelMap();

        $this->assertNotEmpty($map);
        $this->assertCount(56, $map);
        $this->assertArrayHasKey('01', $map);
        $this->assertSame('汉族', $map['01']);
        $this->assertArrayHasKey('56', $map);
        $this->assertSame('基诺族', $map['56']);
    }

    /**
     * 测试助手类与原始枚举的一致性
     */
    public function testConsistencyWithEnum(): void
    {
        $map = NationalityTestHelper::createCodeToLabelMap();

        foreach (Nationality::cases() as $nationality) {
            $key = $nationality->value;
            $this->assertArrayHasKey($key, $map);

            // 使用array_key_exists确保PHPStan理解数组访问的安全性
            if (array_key_exists($key, $map)) {
                $this->assertSame($nationality->getLabel(), $map[$key]);
            }
        }
    }
}

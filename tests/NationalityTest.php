<?php

declare(strict_types=1);

namespace Tourze\GBT3304\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use Tourze\GBT3304\Nationality;
use Tourze\PHPUnitEnum\AbstractEnumTestCase;

/**
 * 测试 Nationality 枚举类
 *
 * @internal
 */
#[CoversClass(Nationality::class)]
final class NationalityTest extends AbstractEnumTestCase
{
    /**
     * 测试枚举值是否正确
     */
    public function testEnumValues(): void
    {
        $this->assertSame('01', Nationality::Han->value);
        $this->assertSame('02', Nationality::Mongol->value);
        $this->assertSame('03', Nationality::Hui->value);
        $this->assertSame('56', Nationality::Jino->value);
    }

    /**
     * 测试获取标签功能
     */
    public function testGetLabel(): void
    {
        $this->assertSame('汉族', Nationality::Han->getLabel());
        $this->assertSame('蒙古族', Nationality::Mongol->getLabel());
        $this->assertSame('回族', Nationality::Hui->getLabel());
        $this->assertSame('藏族', Nationality::Zang->getLabel());
        $this->assertSame('维吾尔族', Nationality::Uygur->getLabel());
        $this->assertSame('基诺族', Nationality::Jino->getLabel());
    }

    /**
     * 测试双字母代码转换功能
     */
    public function testToCode(): void
    {
        $this->assertSame('HA', Nationality::Han->toCode());
        $this->assertSame('MG', Nationality::Mongol->toCode());
        $this->assertSame('HU', Nationality::Hui->toCode());
        $this->assertSame('ZA', Nationality::Zang->toCode());
        $this->assertSame('UG', Nationality::Uygur->toCode());
        $this->assertSame('JN', Nationality::Jino->toCode());
    }

    /**
     * 测试 toArray 功能 (来自 ItemTrait)
     */
    public function testToArray(): void
    {
        $array = Nationality::Han->toArray();

        $this->assertNotEmpty($array);
        $this->assertArrayHasKey('value', $array);
        $this->assertArrayHasKey('label', $array);
        $this->assertSame('01', $array['value']);
        $this->assertSame('汉族', $array['label']);

        $array = Nationality::Jino->toArray();
        $this->assertNotEmpty($array);
        $this->assertArrayHasKey('value', $array);
        $this->assertArrayHasKey('label', $array);
        $this->assertSame('56', $array['value']);
        $this->assertSame('基诺族', $array['label']);
    }

    /**
     * 测试 genOptions 功能 (来自 SelectTrait)
     */
    public function testGenOptions(): void
    {
        $options = Nationality::genOptions();

        $this->assertNotEmpty($options);
        $this->assertCount(56, $options);

        // 检查第一个选项
        $firstOption = $options[0];
        $this->assertNotEmpty($firstOption);
        $this->assertArrayHasKey('value', $firstOption);
        $this->assertArrayHasKey('label', $firstOption);
        $this->assertSame('01', $firstOption['value']);
        $this->assertSame('汉族', $firstOption['label']);

        // 检查最后一个选项
        $lastOption = $options[55];
        $this->assertNotEmpty($lastOption);
        $this->assertArrayHasKey('value', $lastOption);
        $this->assertArrayHasKey('label', $lastOption);
        $this->assertSame('56', $lastOption['value']);
        $this->assertSame('基诺族', $lastOption['label']);
    }

    /**
     * 测试从数值获取枚举实例
     */
    public function testFromValue(): void
    {
        $han = Nationality::from('01');
        $this->assertSame(Nationality::Han, $han);

        $jino = Nationality::from('56');
        $this->assertSame(Nationality::Jino, $jino);
    }

    /**
     * 测试尝试从无效值获取枚举实例时应抛出异常
     */
    public function testFromInvalidValue(): void
    {
        $this->expectException(\ValueError::class);
        Nationality::from('99');
    }

    /**
     * 测试安全地尝试从值获取枚举实例
     */
    public function testTryFrom(): void
    {
        $han = Nationality::tryFrom('01');
        $this->assertSame(Nationality::Han, $han);

        $invalidNationality = Nationality::tryFrom('99');
        $this->assertNull($invalidNationality);
    }

    /**
     * 测试获取所有枚举情况
     */
    public function testCases(): void
    {
        $cases = Nationality::cases();
        $this->assertCount(56, $cases);
        $this->assertSame(Nationality::Han, $cases[0]);
        $this->assertSame(Nationality::Jino, $cases[55]);
    }

    /**
     * 测试环境变量过滤枚举选项
     */
    public function testGenOptionsWithEnvFilter(): void
    {
        $originalEnv = $this->backupEnvVariable();

        try {
            $_ENV['enum-display:' . Nationality::class . '-01'] = false;
            $options = Nationality::genOptions();

            $this->assertCount(55, $options);
            $this->assertOptionFiltered($options, '01', '汉族选项不应该出现在过滤后的选项列表中');
            $this->assertOptionExists($options, '02', '蒙古族选项应该出现在过滤后的选项列表中');
        } finally {
            $this->restoreEnvVariable($originalEnv);
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function backupEnvVariable(): array
    {
        $originalEnv = [];
        $envKey = 'enum-display:' . Nationality::class . '-01';
        if (isset($_ENV[$envKey])) {
            $originalEnv[$envKey] = $_ENV[$envKey];
        }

        return $originalEnv;
    }

    /**
     * @param array<string, mixed> $originalEnv
     */
    private function restoreEnvVariable(array $originalEnv): void
    {
        $envKey = 'enum-display:' . Nationality::class . '-01';
        if (isset($originalEnv[$envKey])) {
            $_ENV[$envKey] = $originalEnv[$envKey];
        } else {
            unset($_ENV[$envKey]);
        }
    }

    /**
     * @param array<int, array<string, string>> $options
     */
    private function assertOptionFiltered(array $options, string $value, string $message): void
    {
        $found = $this->findOptionByValue($options, $value);
        $this->assertFalse($found, $message);
    }

    /**
     * @param array<int, array<string, string>> $options
     */
    private function assertOptionExists(array $options, string $value, string $message): void
    {
        $found = $this->findOptionByValue($options, $value);
        $this->assertTrue($found, $message);
    }

    /**
     * @param array<int, array<string, string>> $options
     */
    private function findOptionByValue(array $options, string $value): bool
    {
        foreach ($options as $option) {
            if ($value === $option['value']) {
                return true;
            }
        }

        return false;
    }

    /**
     * 测试完整映射覆盖
     * 确保所有民族的代码映射都正确
     */
    public function testCompleteCodeMapping(): void
    {
        // 测试所有枚举实例的toCode方法都有返回值
        foreach (Nationality::cases() as $nationality) {
            $code = $nationality->toCode();
            $this->assertNotEmpty($code, sprintf('民族 %s 没有对应的双字母代码', $nationality->getLabel()));
            $this->assertSame(2, strlen($code), sprintf('民族 %s 的双字母代码长度不为2', $nationality->getLabel()));
        }
    }

    /**
     * 测试实际业务场景使用
     */
    public function testIntegrationScenario(): void
    {
        // 模拟数据库中存储的民族代码
        $storedNationalityCode = '01'; // 数据库中存储的是汉族代码

        // 从数据库加载数据，并转换为枚举实例
        $nationality = Nationality::from($storedNationalityCode);
        $this->assertSame(Nationality::Han, $nationality);

        // 显示给用户的民族名称
        $displayName = $nationality->getLabel();
        $this->assertSame('汉族', $displayName);

        // 在API中使用双字母代码
        $apiCode = $nationality->toCode();
        $this->assertSame('HA', $apiCode);

        // 创建选择列表供前端使用
        $selectOptions = Nationality::genOptions();
        $this->assertNotEmpty($selectOptions);
        $this->assertArrayHasKey(0, $selectOptions);
        $this->assertArrayHasKey('value', $selectOptions[0]);
        $this->assertArrayHasKey('label', $selectOptions[0]);
    }
}

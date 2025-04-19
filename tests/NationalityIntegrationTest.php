<?php

namespace Tourze\GBT3304\Tests;

use PHPUnit\Framework\TestCase;
use Tourze\GBT3304\Nationality;

/**
 * 民族代码实际应用场景测试
 */
class NationalityIntegrationTest extends TestCase
{
    /**
     * 模拟表单提交和验证场景
     */
    public function testFormSubmissionScenario(): void
    {
        // 模拟表单提交的民族代码
        $submittedCode = '04'; // 藏族

        // 验证提交的代码是否有效
        $isValid = in_array($submittedCode, array_map(fn($case) => $case->value, Nationality::cases()), true);
        $this->assertTrue($isValid, '提交的民族代码应该是有效的');

        // 转换为枚举实例
        $nationality = Nationality::from($submittedCode);
        $this->assertInstanceOf(Nationality::class, $nationality);
        $this->assertSame(Nationality::Zang, $nationality);

        // 获取显示名称
        $displayName = $nationality->getLabel();
        $this->assertSame('藏族', $displayName);

        // 模拟保存到数据库
        $savedCode = $nationality->value;
        $this->assertSame('04', $savedCode);
    }

    /**
     * 模拟API响应场景
     */
    public function testApiResponseScenario(): void
    {
        // 模拟从数据库读取的民族代码
        $storedCode = '17'; // 哈萨克族

        // 转换为枚举实例
        $nationality = Nationality::from($storedCode);

        // 构建API响应
        $response = [
            'nationality' => [
                'code' => $nationality->value,
                'name' => $nationality->getLabel(),
                'alpha_code' => $nationality->toCode(),
            ]
        ];

        // 验证响应格式
        $this->assertArrayHasKey('nationality', $response);
        $this->assertArrayHasKey('code', $response['nationality']);
        $this->assertArrayHasKey('name', $response['nationality']);
        $this->assertArrayHasKey('alpha_code', $response['nationality']);

        // 验证内容
        $this->assertSame('17', $response['nationality']['code']);
        $this->assertSame('哈萨克族', $response['nationality']['name']);
        $this->assertSame('KZ', $response['nationality']['alpha_code']);
    }

    /**
     * 模拟多语言国际化场景
     */
    public function testInternationalizationScenario(): void
    {
        // 模拟用户选择的民族
        $selectedNationality = Nationality::Uygur;

        // 创建模拟翻译表 (实际应用中这会从语言文件或数据库加载)
        $translations = [
            'zh' => [
                'Uygur' => '维吾尔族'
            ],
            'en' => [
                'Uygur' => 'Uygur Nationality'
            ],
        ];

        // 模拟中文环境下的展示
        $zhLanguage = 'zh';
        $zhDisplay = $translations[$zhLanguage][str_replace('Tourze\\GBT3304\\Nationality::', '', $selectedNationality->name)] ?? $selectedNationality->getLabel();
        $this->assertSame('维吾尔族', $zhDisplay);

        // 模拟英文环境下的展示
        $enLanguage = 'en';
        $enDisplay = $translations[$enLanguage][str_replace('Tourze\\GBT3304\\Nationality::', '', $selectedNationality->name)] ?? $selectedNationality->name;
        $this->assertSame('Uygur Nationality', $enDisplay);

        // 标准代码在所有语言环境中保持一致
        $code = $selectedNationality->value;
        $letterCode = $selectedNationality->toCode();
        $this->assertSame('05', $code);
        $this->assertSame('UG', $letterCode);
    }

    /**
     * 模拟数据导入导出场景
     */
    public function testDataImportExportScenario(): void
    {
        // 模拟从Excel导入的民族数据
        $importedData = [
            ['id' => 1, 'name' => '张三', 'nationality_code' => '01'],
            ['id' => 2, 'name' => '李四', 'nationality_code' => '08'],
            ['id' => 3, 'name' => '王五', 'nationality_code' => 'invalid'],
        ];

        $processedData = [];
        foreach ($importedData as $row) {
            $processedRow = $row;

            // 验证并处理民族代码
            $nationalityCode = $row['nationality_code'];
            $nationality = Nationality::tryFrom($nationalityCode);

            if ($nationality !== null) {
                $processedRow['nationality_name'] = $nationality->getLabel();
                $processedRow['nationality_valid'] = true;
            } else {
                $processedRow['nationality_name'] = '未知';
                $processedRow['nationality_valid'] = false;
            }

            $processedData[] = $processedRow;
        }

        // 验证处理结果
        $this->assertCount(3, $processedData);
        $this->assertTrue($processedData[0]['nationality_valid']);
        $this->assertSame('汉族', $processedData[0]['nationality_name']);
        $this->assertTrue($processedData[1]['nationality_valid']);
        $this->assertSame('壮族', $processedData[1]['nationality_name']);
        $this->assertFalse($processedData[2]['nationality_valid']);
        $this->assertSame('未知', $processedData[2]['nationality_name']);
    }
}

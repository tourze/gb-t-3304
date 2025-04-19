<?php

namespace Tourze\GBT3304\Tests\Helpers;

use Tourze\GBT3304\Nationality;

/**
 * Nationality测试助手类
 */
class NationalityTestHelper
{
    /**
     * 获取随机民族枚举
     */
    public static function getRandomNationality(): Nationality
    {
        $cases = Nationality::cases();
        $randomIndex = array_rand($cases);
        return $cases[$randomIndex];
    }

    /**
     * 获取不同类型的民族代码
     *
     * @param string $type 代码类型：numeric(数字代码) 或 alpha(字母代码)
     * @return array 指定类型的所有民族代码
     */
    public static function getAllCodesOfType(string $type = 'numeric'): array
    {
        $result = [];
        foreach (Nationality::cases() as $nationality) {
            if ($type === 'numeric') {
                $result[] = $nationality->value;
            } elseif ($type === 'alpha') {
                $result[] = $nationality->toCode();
            }
        }
        return $result;
    }

    /**
     * 创建民族代码与名称的映射数组
     *
     * @return array 代码=>名称的映射数组
     */
    public static function createCodeToLabelMap(): array
    {
        $map = [];
        foreach (Nationality::cases() as $nationality) {
            $map[$nationality->value] = $nationality->getLabel();
        }
        return $map;
    }
}

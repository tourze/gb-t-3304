<?php

declare(strict_types=1);

namespace Tourze\GBT3304;

use Tourze\EnumExtra\Itemable;
use Tourze\EnumExtra\ItemTrait;
use Tourze\EnumExtra\Labelable;
use Tourze\EnumExtra\Selectable;
use Tourze\EnumExtra\SelectTrait;

/**
 * 标准号：GB/T 3304-1991
 * 中文标准名称：中国各民族名称的罗马字母拼写法和代码
 * 英文标准名称：Names of nationalities of China in romanization with codes
 *
 * @see https://openstd.samr.gov.cn/bzgk/gb/newGbInfo?hcno=E5C3271B62636C5DA6853A0DA23EBBA9
 */
enum Nationality: string implements Labelable, Itemable, Selectable
{
    use ItemTrait;
    use SelectTrait;

    case Han = '01';
    case Mongol = '02';
    case Hui = '03';
    case Zang = '04';
    case Uygur = '05';
    case Miao = '06';
    case Yi = '07';
    case Zhuang = '08';
    case Buyei = '09';
    case Chosen = '10';
    case Man = '11';
    case Dong = '12';
    case Yao = '13';
    case Bai = '14';
    case Tujia = '15';
    case Hani = '16';
    case Kazak = '17';
    case Dai = '18';
    case Li = '19';
    case Lisu = '20';
    case Va = '21';
    case She = '22';
    case Gaoshan = '23';
    case Lahu = '24';
    case Shui = '25';
    case Dongxiang = '26';
    case Naxi = '27';
    case Jingpo = '28';
    case Kirgiz = '29';
    case Tu = '30';
    case Daur = '31';
    case Mulao = '32';
    case Qiang = '33';
    case Blang = '34';
    case Salar = '35';
    case Maonan = '36';
    case Gelao = '37';
    case Xibe = '38';
    case Achang = '39';
    case Pumi = '40';
    case Tajik = '41';
    case Nu = '42';
    case Uzbek = '43';
    case Russ = '44';
    case Ewenki = '45';
    case Deang = '46';
    case Bonan = '47';
    case Yugur = '48';
    case Gin = '49';
    case Tatar = '50';
    case Derung = '51';
    case Oroqen = '52';
    case Hezhen = '53';
    case Monba = '54';
    case Lhoba = '55';
    case Jino = '56';

    public function getLabel(): string
    {
        return match ($this) {
            self::Han => '汉族',
            self::Mongol => '蒙古族',
            self::Hui => '回族',
            self::Zang => '藏族',
            self::Uygur => '维吾尔族',
            self::Miao => '苗族',
            self::Yi => '彝族',
            self::Zhuang => '壮族',
            self::Buyei => '布依族',
            self::Chosen => '朝鲜族',
            self::Man => '满族',
            self::Dong => '侗族',
            self::Yao => '瑶族',
            self::Bai => '白族',
            self::Tujia => '土家族',
            self::Hani => '哈尼族',
            self::Kazak => '哈萨克族',
            self::Dai => '傣族',
            self::Li => '黎族',
            self::Lisu => '傈僳族',
            self::Va => '佤族',
            self::She => '畲族',
            self::Gaoshan => '高山族',
            self::Lahu => '拉祜族',
            self::Shui => '水族',
            self::Dongxiang => '东乡族',
            self::Naxi => '纳西族',
            self::Jingpo => '景颇族',
            self::Kirgiz => '柯尔克孜族',
            self::Tu => '土族',
            self::Daur => '达斡尔族',
            self::Mulao => '仫佬族',
            self::Qiang => '羌族',
            self::Blang => '布朗族',
            self::Salar => '撒拉族',
            self::Maonan => '毛南族',
            self::Gelao => '仡佬族',
            self::Xibe => '锡伯族',
            self::Achang => '阿昌族',
            self::Pumi => '普米族',
            self::Tajik => '塔吉克族',
            self::Nu => '怒族',
            self::Uzbek => '乌孜别克族',
            self::Russ => '俄罗斯族',
            self::Ewenki => '鄂温克族',
            self::Deang => '德昂族',
            self::Bonan => '保安族',
            self::Yugur => '裕固族',
            self::Gin => '京族',
            self::Tatar => '塔塔尔族',
            self::Derung => '独龙族',
            self::Oroqen => '鄂伦春族',
            self::Hezhen => '赫哲族',
            self::Monba => '门巴族',
            self::Lhoba => '珞巴族',
            self::Jino => '基诺族',
        };
    }

    public function toCode(): string
    {
        return match ($this) {
            self::Han => 'HA',
            self::Mongol => 'MG',
            self::Hui => 'HU',
            self::Zang => 'ZA',
            self::Uygur => 'UG',
            self::Miao => 'MH',
            self::Yi => 'YI',
            self::Zhuang => 'ZH',
            self::Buyei => 'BY',
            self::Chosen => 'CS',
            self::Man => 'MA',
            self::Dong => 'DO',
            self::Yao => 'YA',
            self::Bai => 'BA',
            self::Tujia => 'TJ',
            self::Hani => 'HN',
            self::Kazak => 'KZ',
            self::Dai => 'DA',
            self::Li => 'LI',
            self::Lisu => 'LS',
            self::Va => 'VA',
            self::She => 'SH',
            self::Gaoshan => 'GS',
            self::Lahu => 'LH',
            self::Shui => 'SW',
            self::Dongxiang => 'DX',
            self::Naxi => 'NX',
            self::Jingpo => 'JP',
            self::Kirgiz => 'KG',
            self::Tu => 'TU',
            self::Daur => 'DU',
            self::Mulao => 'ML',
            self::Qiang => 'QI',
            self::Blang => 'BL',
            self::Salar => 'SL',
            self::Maonan => 'MN',
            self::Gelao => 'GL',
            self::Xibe => 'XB',
            self::Achang => 'AC',
            self::Pumi => 'PM',
            self::Tajik => 'TA',
            self::Nu => 'NU',
            self::Uzbek => 'UZ',
            self::Russ => 'RS',
            self::Ewenki => 'EW',
            self::Deang => 'DE',
            self::Bonan => 'BN',
            self::Yugur => 'YG',
            self::Gin => 'GI',
            self::Tatar => 'TT',
            self::Derung => 'DR',
            self::Oroqen => 'OR',
            self::Hezhen => 'HZ',
            self::Monba => 'MB',
            self::Lhoba => 'LB',
            self::Jino => 'JN',
        };
    }
}

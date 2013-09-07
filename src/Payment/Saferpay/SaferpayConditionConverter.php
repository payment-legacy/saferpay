<?php

namespace Payment\Saferpay;

class SaferpayConditionConverter
{
    /**
     * @param  string $condition
     * @return string
     */
    public static function toRegex($condition)
    {
        $preparedPattern = str_replace(
            array (
                ']',
                '[',
                '..',
                'a',
                'n',
                's'
            ),
            array (
                '}',
                ']{',
                '1,',
                'a-z\p{L}\ \t',
                '\d',
                '\+\-\_\:\;\/\\\<\>\(\)\.\,\=\?\@',
            ),
            $condition
        );

        return '/^([' . $preparedPattern . ')$/ui' ;
    }

    /**
     * @param $condition
     * @return bool
     */
    public static function isCondition($condition)
    {
        if(strpos($condition, 'n[') === 0 ||
           strpos($condition, 'ns[') === 0 ||
           strpos($condition, 'a[') === 0 ||
           strpos($condition, 'an[') === 0 ||
           strpos($condition, 'ans[') === 0
        ) {
            return true;
        }

        return false;
    }
}

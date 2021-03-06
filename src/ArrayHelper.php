<?php
declare(strict_types=1);

namespace Echron\Tools;

class ArrayHelper
{

    public static function unique(array $input, array $fields = null): array
    {
        if (\is_null($fields)) {
            $fields = self::getAllFields($input);
        }
        $result = [];
        foreach ($input as $optionA) {
            $duplicateSuperAttributes = array_filter($result, function ($optionB) use (
                $optionA,
                $fields
            ) {
                if (count($fields) === 0) {
                    return false;
                }
                foreach ($fields as $field) {
                    if (!isset($optionB[$field]) || !isset($optionA[$field]) || $optionB[$field] !== $optionA[$field]) {
                        return false;
                    }
                }

                return true;
            });

            if (count($duplicateSuperAttributes) === 0) {
                $result[] = $optionA;
            }
        }

        return $result;
    }

    private static function getAllFields(array $input): array
    {
        $result = [];
        foreach ($input as $elem) {
            $fields = \array_keys($elem);
            foreach ($fields as $field) {
                $result[] = $field;
            }
        }

        return \array_unique($result);
    }
}

<?php

namespace common\yii\validators;

/**
 * @inheritdoc
 *
 * @author Maxim Podberezhskiy
 */
class CompareValidator extends \yii\validators\CompareValidator
{
    const ATTR_COMPARE_ATTRIBUTE = 'compareAttribute';
    const ATTR_COMPARE_VALUE     = 'compareValue';
    const ATTR_MESSAGE           = 'message';
    const ATTR_TYPE              = 'type';
    const ATTR_OPERATOR          = 'operator';

    const TYPE_NUMBER       = 'number';

    const OPERATOR_EQUAL      = '=';
    const OPERATOR_MORE       = '>';
    const OPERATOR_LESS       = '<';
    const OPERATOR_MORE_EQUAL = '>=';
    const OPERATOR_LESS_EQUAL = '<=';

    const VALUE_TRUE  = 1;
    const VALUE_FALSE = 0;
}
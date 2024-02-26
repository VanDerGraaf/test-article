<?php

namespace common\yii\validators;

/**
 * @inheritdoc
 *
 * @author Maxim Podberezhskiy
 */
class BooleanValidator extends \yii\validators\BooleanValidator
{
    const ATTR_TRUE_VALUE  = 'trueValue';
    const ATTR_FALSE_VALUE = 'falseValue';
    const ATTR_STRICT      = 'strict';
    const ATTR_MESSAGE     = 'message';
}
<?php

namespace common\yii\validators;

/**
 * Class EmailValidator
 * @package common\yii\validators
 *
 * @author Maxim Podberezhskiy
 */
class EmailValidator extends \yii\validators\EmailValidator
{
    const ATTR_ON = 'on';
    const ATTR_MESSAGE = 'message';
}

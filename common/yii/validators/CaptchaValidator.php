<?php

namespace common\yii\validators;

/**
 * Class CaptchaValidator
 * @package common\yii\validators
 * @author Maxim Podberezhskiy
 */
class CaptchaValidator extends \yii\captcha\CaptchaValidator
{
    const ATTR_MESSAGE     = 'message';
}
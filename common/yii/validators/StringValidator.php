<?php

namespace common\yii\validators;

/**
 * @inheritdoc
 *
 * @author Maxim Podberezhskiy
 */
class StringValidator extends \yii\validators\StringValidator {
    const ATTR_MIN       = 'min';
    const ATTR_MAX       = 'max';
    const ATTR_LENGTH    = 'length';
    const ATTR_ON        = 'on';
    const ATTR_TOO_SHORT = 'tooShort';
    const ATTR_TOO_LONG  = 'tooLong';
    const ATTR_NOT_EQUAL = 'notEqual';
    const ATTR_MESSAGE   = 'message';

    const VARCHAR_LENGTH      = 255;
    const VARCHAR_LENGTH_100  = 100;
    const VARCHAR_LENGTH_20   = 20;
    const VARCHAR_LENGTH_2    = 2;
    const VARCHAR_LENGTH_3    = 3;
    const VARCHAR_LENGTH_4    = 4;
    const VARCHAR_LENGTH_5    = 5;
    const VARCHAR_LENGTH_6    = 6;
    const VARCHAR_LENGTH_8    = 8;
    const VARCHAR_LENGTH_10   = 10;
    const VARCHAR_LENGTH_12   = 12;
    const VARCHAR_LENGTH_15   = 15;
    const VARCHAR_LENGTH_50   = 50;
    const VARCHAR_LENGTH_1000 = 1000;
}

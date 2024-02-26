<?php

declare(strict_types=1);

namespace common\yii\validators;

/**
 * @inheritdoc
 *
 * @author Maxim Podberezhskiy
 */
class RangeValidator extends \yii\validators\RangeValidator {
	const ATTR_RANGE   = 'range';
	const ATTR_MESSAGE = 'message';
    const ATTR_ON      = 'on';
    const ATTR_EXCEPT  = 'except';
}

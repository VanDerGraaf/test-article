<?php

declare(strict_types=1);

namespace common\yii\validators;

/**
 * @inheritdoc
 *
 * @author Maxim Podberezhskiy
 */
class NumberValidator extends \yii\validators\NumberValidator {
	const ATTR_MIN            = 'min';
	const ATTR_MAX            = 'max';
	const ATTR_NUMBER_PATTERN = 'numberPattern';
	const ATTR_TOO_BIG        = 'tooBig';
	const ATTR_TOO_SMALL      = 'tooSmall';
	const ATTR_SKIP_ON_EMPTY  = 'skipOnEmpty';
	const ATTR_MESSAGE        = 'message';
}

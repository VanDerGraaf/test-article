<?php

declare(strict_types=1);

namespace common\yii\validators;

/**
 * @inheritdoc
 *
 * @author Maxim Podberezhskiy
 */
class IntegerValidator extends NumberValidator {
	/** @inheritdoc */
	public $integerOnly = true;
}

<?php

namespace common\yii\validators;

/**
 * @author Maxim Podberezhskiy
 */
class FloatValidator extends NumberValidator {
	/** @inheritdoc */
	public $integerOnly = false;
}
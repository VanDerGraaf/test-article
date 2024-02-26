<?php

namespace common\yii\validators;

/**
 * {@inheritdoc}
 *
 * @author Maxim Podberezhskiy
 */
class UniqueValidator extends \yii\validators\UniqueValidator {
	const ATTR_TARGET_CLASS     = 'targetClass';
	const ATTR_TARGET_ATTRIBUTE = 'targetAttribute';
	const ATTR_FILTER           = 'filter';
	const ATTR_MESSAGE          = 'message';
	const ATTR_COMBO_NOT_UNIQUE = 'comboNotUnique';
	const ATTR_ON               = 'on';
}
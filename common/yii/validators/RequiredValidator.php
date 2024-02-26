<?php

namespace common\yii\validators;

/**
 * @inheritdoc
 *
 * @author Maxim Podberezhskiy
 */
class RequiredValidator extends \yii\validators\RequiredValidator {
	const ATTR_ON          = 'on';
	const ATTR_MESSAGE     = 'message';
	const ATTR_WHEN_CLIENT = 'whenClient';
	const ATTR_WHEN        = 'when';
	const ATTR_REQUIRED_VALUE = 'requiredValue';
}

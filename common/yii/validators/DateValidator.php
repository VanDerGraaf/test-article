<?php

namespace common\yii\validators;

use Exception;
use Yii;
use yii\base\InvalidConfigException;

/**
 * @inheritdoc
 *
 * @author Maxim Podberezhskiy
 */
class DateValidator extends \yii\validators\DateValidator {
	public const ATTR_FORMAT    = 'format';
	public const ATTR_MIN       = 'min';
	public const ATTR_MAX       = 'max';
	public const ATTR_TOO_BIG   = 'tooBig';
	public const ATTR_TOO_SMALL = 'tooSmall';
	public const ATTR_MESSAGE   = 'message';

	public const DEFAULT_FORMAT = 'php:Y-m-d';
	public const FORMAT_DATATIM = 'php:Y-m-d H:i:s';

    public const FORMAT_FRONTEND_OUTPUT = 'php:d.m.Y';
    public const FORMAT_FRONTEND_DATE_TIME = 'php:d.m.Y H:i';
}

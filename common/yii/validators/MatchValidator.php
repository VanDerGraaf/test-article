<?php

namespace common\yii\validators;

use yii\validators\RegularExpressionValidator;

/**
 * Class MatchValidator
 * @package common\yii\validators
 * @author Maxim Podberezhskiy
 */
class MatchValidator extends RegularExpressionValidator
{
    const PATTERN = 'pattern';
    const MESSAGE = 'message';

    const ONLY_LETTERS = '/^[ а-яА-Яa-zA-Z]+$/u';
    const MONEY_MATCH  = '/^([1-9]\d+|\d)(\.\d{1,2})?$/';
}
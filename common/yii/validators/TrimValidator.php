<?php

namespace common\yii\validators;

use yii\validators\FilterValidator;

/**
 * {@inheritdoc}
 *
 * @author Maxim Podberezhskiy
 */
class TrimValidator extends FilterValidator {
    public $filter      = 'trim';
    public $skipOnEmpty = true;
}

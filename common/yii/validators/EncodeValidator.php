<?php

namespace common\yii\validators;

use yii\validators\FilterValidator;

/**
 * {@inheritdoc}
 *
 * @author Maxim Podberezhskiy
 */
class EncodeValidator extends FilterValidator {
    public $filter = '\yii\helpers\Html::encode';
}
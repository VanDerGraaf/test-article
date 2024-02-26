<?php

declare(strict_types=1);

namespace common\yii\validators;

/**
 * {@inheritdoc}
 *
 * @author Maxim Podberezhskiy
 */
class ExistValidator extends \yii\validators\ExistValidator {
    const ATTR_TARGET_CLASS              = 'targetClass';
    const ATTR_TARGET_ATTRIBUTE          = 'targetAttribute';
    const ATTR_TARGET_RELATION           = 'targetRelation';
    const ATTR_FILTER                    = 'filter';
    const ATTR_ALLOW_ARRAY               = 'allowArray';
    const ATTR_TARGET_ATTRIBUTE_JUNCTION = 'targetAttributeJunction';
    const ATTR_FORCE_MASTER_DB           = 'forceMasterDb';
    const ATTR_ON                        = 'on';
    const ATTR_MESSAGE                   = 'message';
    const ATTR_SKIP_ON_ERROR             = 'skipOnError';
}
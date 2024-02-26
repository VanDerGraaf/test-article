<?php

namespace common\yii\validators;

/**
 * @inheritdoc
 *
 * @author Maxim Podberezhskiy
 */
class FileValidator extends \yii\validators\FileValidator
{
    const  ATTR_TYPE_FILE         = 'file';
    const  ATTR_TYPE_IMAGE        = 'image';

    const  ATTR_SKIP_ON_EMPTY     = 'skipOnEmpty';
    const  ATTR_UPLOAD_REQUIRED   = 'uploadRequired'; // сообщение об ошибке

    const  ATTR_CHECK_EXTENSION_BY_MIME_TYPE = 'checkExtensionByMimeType';
    const  ATTR_EXTENSIONS   = 'extensions';
    const  ATTR_MIME_TYPES   = 'mimeTypes';
    const  ATTR_WRONG_EXTENSION = 'wrongExtension'; // сообщение об ошибке

    const  ATTR_MAX_SIZE     = 'maxSize';
    const  ATTR_TOOBIG       = 'tooBig'; // сообщение об ошибке
    const  ATTR_TOO_BIG      = 'tooBig'; // сообщение об ошибке

    const  ATTR_MIN_SIZE     = 'minSize';
    const  ATTR_TOO_SMALL    = 'tooSmall'; // сообщение об ошибке
    const  ATTR_TOOSMALL     = 'tooSmall'; // сообщение об ошибке

    const  ATTR_MAX_FILES    = 'maxFiles';
    const  ATTR_TOO_MANY     = 'tooMany'; // сообщение об ошибке
    const  ATTR_TOOMANY      = 'tooMany'; // сообщение об ошибке
    const  ATTR_MIN_FILES    = 'minFiles';
    const  ATTR_TOO_FEW      = 'tooFew'; // сообщение об ошибке
    const  ATTR_TOOFEW       = 'tooFew'; // сообщение об ошибке
}
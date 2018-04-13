<?php

namespace RAE\Response\Model;

use RAE\AutoPropertyMapper;

/**
 * Definition.
 *
 * @method mixed getDefinition()
 * @method mixed getType()
 * @method bool isDefinition()
 * @method bool isType()
 * @method $this setDefinition(mixed $value)
 * @method $this setType(mixed $value)
 * @method $this unsetDefinition()
 * @method $this unsetType()
 */
class Definition extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'type'       => '',
        'definition' => '',
    ];
}

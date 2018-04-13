<?php

namespace RAE\Response\Model;

use RAE\AutoPropertyMapper;

/**
 * Res.
 *
 * @method mixed getGrp()
 * @method mixed getHeader()
 * @method mixed getId()
 * @method bool isGrp()
 * @method bool isHeader()
 * @method bool isId()
 * @method $this setGrp(mixed $value)
 * @method $this setHeader(mixed $value)
 * @method $this setId(mixed $value)
 * @method $this unsetGrp()
 * @method $this unsetHeader()
 * @method $this unsetId()
 */
class Res extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'header' => '',
        'id'     => '',
        'grp'    => '',
    ];
}

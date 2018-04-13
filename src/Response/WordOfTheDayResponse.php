<?php

namespace RAE\Response;

use RAE\Response;

/**
 * WordOfTheDayResponse.
 *
 * @method string getHeader()
 * @method string getId()
 * @method mixed getMessage()
 * @method string getStatus()
 * @method Model\_Message[] get_Messages()
 * @method bool isHeader()
 * @method bool isId()
 * @method bool isMessage()
 * @method bool isStatus()
 * @method bool is_Messages()
 * @method $this setHeader(string $value)
 * @method $this setId(string $value)
 * @method $this setMessage(mixed $value)
 * @method $this setStatus(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetHeader()
 * @method $this unsetId()
 * @method $this unsetMessage()
 * @method $this unsetStatus()
 * @method $this unset_Messages()
 */
class WordOfTheDayResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'header' => 'string',
        'id'     => 'string',
    ];
}

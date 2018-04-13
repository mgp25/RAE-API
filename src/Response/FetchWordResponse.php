<?php

namespace RAE\Response;

use RAE\Response;

/**
 * FetchWordResponse.
 *
 * @method Model\Definition[] getDefinitions()
 * @method mixed getMessage()
 * @method string getStatus()
 * @method Model\_Message[] get_Messages()
 * @method bool isDefinitions()
 * @method bool isMessage()
 * @method bool isStatus()
 * @method bool is_Messages()
 * @method $this setDefinitions(Model\Definition[] $value)
 * @method $this setMessage(mixed $value)
 * @method $this setStatus(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetDefinitions()
 * @method $this unsetMessage()
 * @method $this unsetStatus()
 * @method $this unset_Messages()
 */
class FetchWordResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'definitions' => 'Model\Definition[]',
    ];
}

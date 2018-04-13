<?php

namespace RAE\Response;

use RAE\Response;

/**
 * SearchWordResponse.
 *
 * @method int getApprox()
 * @method mixed getMessage()
 * @method Model\Res[] getRes()
 * @method string getStatus()
 * @method Model\_Message[] get_Messages()
 * @method bool isApprox()
 * @method bool isMessage()
 * @method bool isRes()
 * @method bool isStatus()
 * @method bool is_Messages()
 * @method $this setApprox(int $value)
 * @method $this setMessage(mixed $value)
 * @method $this setRes(Model\Res[] $value)
 * @method $this setStatus(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetApprox()
 * @method $this unsetMessage()
 * @method $this unsetRes()
 * @method $this unsetStatus()
 * @method $this unset_Messages()
 */
class SearchWordResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'approx' => 'int',
        'res'    => 'Model\Res[]',
    ];
}

<?php

/**
 * Contao Entity Attributes Bundle for Contao Open Source CMS
 *
 * @copyright   2020 - 2021 Tastaturberuf <https://tastaturberuf.de>
 * @author      Daniel Jahnsmüller <https://tastaturberuf.de>
 * @licence     LGPL-3.0-or-later
 */

declare(strict_types=1);


namespace Tastaturberuf\ContaoEntityAttributesBundle\Attribute;


#[\Attribute]
class Field extends AbstractAttribute
{

    public function __construct(
        public string $inputType = 'text',
        public ?array $label     = null,
        public mixed  $default   = null,
        public bool   $exclude   = true,
        public bool   $search    = false,
        public bool   $sorting   = false,
        public bool   $filter    = false,
        public int    $flag      = 0,
        public array  $options   = [],
        public array  $reference = [],
        public array  $eval      = [],
               mixed  ...$__custom_properties
    )
    {
        $this->parseCustomProperties($__custom_properties);
    }

}

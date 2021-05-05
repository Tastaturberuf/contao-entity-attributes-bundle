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
class Listing extends AbstractAttribute
{

    public function __construct(
        public array $sorting           = [],
        public array $label             = [],
        public array $global_operations = [],
        public array $operations        = [],
               mixed ...$__custom_properties
    )
    {
        $this->parseCustomProperties($__custom_properties);
    }

}

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


#[\Attribute(\Attribute::TARGET_CLASS)]
class OperationCut extends Operation
{

    public function __construct(
        string $name = 'cut',
        string $label = null,
        string $href = 'act=paste&amp;mode=cut',
        string $icon = 'cut.svg',
        string $attributes = 'onclick="Backend.getScrollOffset();"',
        string $route = null,
        array ...$__custom_properties
    ) {
        parent::__construct($name, $label, $href, $icon, $attributes, $route, __custom_properties: $__custom_properties);
    }

}

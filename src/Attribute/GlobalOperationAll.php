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
class GlobalOperationAll extends GlobalOperation
{

    public function __construct(
        string  $name       = 'all',
        ?string $label      = null,
        ?string $href       = 'act=select',
        ?string $class      = 'header_edit_all',
        ?string $attributes = 'onclick="Backend.getScrollOffset()" accesskey="e"',
        ?string $route      = null,
        mixed   ...$__custom_properties
    )
    {
        parent::__construct(
            name:                $name,
            label:               $label,
            href:                $href,
            class:               $class,
            attributes:          $attributes,
            route:               $route,
            __custom_properties: $__custom_properties
        );
    }

}

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
class OperationDelete extends Operation
{

    public function __construct(
        string $name       = 'delete',
        string $label      = null,
        string $href       = 'act=delete',
        string $icon       = 'delete.svg',
        string $attributes = null,
        string $route      = null,
        mixed  ...$__custom_properties
    )
    {
        if ( !$attributes )
        {
            $label = $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? 'Do you really want to delete element ID %s?';

            $attributes = 'onclick="if(!confirm(\''.$label.'\'))return false;Backend.getScrollOffset()"';
        }

        parent::__construct(
            $name,
            $label,
            $href,
            $icon,
            $attributes,
            $route,
            __custom_properties: $__custom_properties
        );
    }

}

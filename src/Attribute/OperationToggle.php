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
class OperationToggle extends Operation
{

    public function __construct(
        string $name,
        ?string $label = null,
        ?string $href = null,
        ?string $icon = null,
        string $attributes = 'onclick="Backend.getScrollOffset();"',
        ?string $route = null,
        ?string $field = null,
        array   $options = [],
        array ...$__custom_properties
    ) {
        parent::__construct($name, $label, $href, $icon, $attributes, $route, __custom_properties: $__custom_properties);

        $this->haste_ajax_operation = [
            'field' => $field ?? $name,
            'options' => $options
        ];
    }

}
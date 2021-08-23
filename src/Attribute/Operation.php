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


#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::IS_REPEATABLE)]
class Operation extends AbstractAttribute
{

    public function __construct(
        protected string $name,
        public ?string $label = null,
        public null|string|array $href = null,
        public ?string $icon = null,
        public string $attributes = 'onclick="Backend.getScrollOffset();"',
        public ?string $route = null,
        array ...$__custom_properties
    )
    {
        if ( is_array($href) )
        {
            $this->href = http_build_query($href);
        }

        $this->parseCustomProperties($__custom_properties);
    }


    public function getName(): string
    {
        return $this->name;
    }

}

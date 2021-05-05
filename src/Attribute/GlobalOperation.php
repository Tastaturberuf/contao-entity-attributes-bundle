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
class GlobalOperation extends AbstractAttribute
{

    public function __construct(
        protected string  $name,
        public ?string $label      = null,
        public ?string $href       = null,
        public ?string $class      = null,
        public ?string $attributes = null,
        public ?string $route      = null,
               array   ...$__custom_properties
    )
    {
        $this->parseCustomProperties($__custom_properties);
    }


    public function getName(): string
    {
        return $this->name;
    }

}

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


abstract class AbstractAttribute
{

    protected function parseCustomProperties(array $properties): void
    {
        foreach ($properties as $key => $property)
        {
            // make sure the property do not exists already
            if ( !property_exists($this, $key) && '__custom_properties' !== $key )
            {
                $this->$key = $property;
            }
        }
    }

}

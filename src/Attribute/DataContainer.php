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
class DataContainer extends AbstractAttribute
{

    public function __construct(
               string $dataContainer = 'Table',
        public array  $config        = [],
        public array  $list          = [],
        public array  $fields        = [],
        public array  $palettes      = [],
        public array  $subpalettes   = [],
               mixed  ...$__custom_properties
    )
    {
        // required minimal config configuration
        $this->config = \array_replace_recursive([
                'dataContainer' => $dataContainer
            ],
            $config
        );

        // required minimal list configuration
        $this->list = \array_replace_recursive([
                'label' => [
                    'fields' => ['id']
                ]
            ],
            $list
        );

        $this->parseCustomProperties($__custom_properties);
    }

}

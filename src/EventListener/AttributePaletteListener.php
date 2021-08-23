<?php

/**
 * Contao Entity Attributes Bundle for Contao Open Source CMS
 *
 * @copyright   2020 - 2021 Tastaturberuf <https://tastaturberuf.de>
 * @author      Daniel Jahnsmüller <https://tastaturberuf.de>
 * @licence     LGPL-3.0-or-later
 */

declare(strict_types=1);

namespace Tastaturberuf\ContaoEntityAttributesBundle\EventListener;


use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\Palette;
use Tastaturberuf\ContaoEntityAttributesBundle\Event\ParseAttributesEvent;


class AttributePaletteListener extends AbstractAttributeListener
{

    public function __invoke(ParseAttributesEvent $event): void
    {
        foreach ($event->getProperties() as $property)
        {
            foreach ($property->getAttributes(Palette::class) as $attribute)
            {
                /** @var Palette $palette */
                $palette = $attribute->newInstance();
                $this->createPalette($palette, $property, $event->getTable());
            }
        }
    }


    private function createPalette(Palette $attribute, \ReflectionProperty $property, string $table): void
    {
        foreach ($attribute->palettes as $palette)
        {
            $legend = $attribute->legend ?? $this->getName($property);

            if ( $attribute->hide )
            {
                $GLOBALS['TL_DCA'][$table]['metapalettes'][$palette][$legend][] = ':hide';
            }

            $GLOBALS['TL_DCA'][$table]['metapalettes'][$palette][$legend][] = $this->getName($property);
        }
    }

}
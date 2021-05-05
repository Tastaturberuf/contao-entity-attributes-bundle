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


use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\Palettes;
use Tastaturberuf\ContaoEntityAttributesBundle\Event\ParseAttributesEvent;


class AttributePalettesListener extends AbstractAttributeListener
{

    public function __invoke(ParseAttributesEvent $event): void
    {
        foreach ($event->getReflection()->getAttributes(Palettes::class, \ReflectionAttribute::IS_INSTANCEOF) as $attribute)
        {
            /** @var Palettes $palettes */
            $palettes = $attribute->newInstance();

            foreach ($palettes->palettes as $paletteName)
            {
                $GLOBALS['TL_DCA'][$event->getTable()]['metapalettes'][$paletteName] = \array_replace_recursive(
                $GLOBALS['TL_DCA'][$event->getTable()]['metapalettes'][$paletteName] ?? [],
                    $this->getLegendsAsArrays($palettes->legends)
                );
            }

            dump($GLOBALS['TL_DCA']);
        }
    }


    private function getLegendsAsArrays(array $legends): array
    {
        $array = [];

        foreach ($legends as $legend)
        {
            $array[$legend] = [];
        }

        return $array;
    }

}
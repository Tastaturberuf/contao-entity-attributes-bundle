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


use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\DataContainer;
use Tastaturberuf\ContaoEntityAttributesBundle\Event\ParseAttributesEvent;

class AttributeDataContainerListener extends AbstractAttributeListener
{

    public function __invoke(ParseAttributesEvent $event): void
    {
        foreach ($event->getReflection()->getAttributes(DataContainer::class) as $attribute)
        {
            $GLOBALS['TL_DCA'][$event->getTable()] = \array_replace_recursive($GLOBALS['TL_DCA'][$event->getTable()] ?? [], (array) $attribute->newInstance());
        }
    }

}

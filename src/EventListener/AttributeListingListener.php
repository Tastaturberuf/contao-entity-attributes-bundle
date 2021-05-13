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


use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\Listing;
use Tastaturberuf\ContaoEntityAttributesBundle\Event\ParseAttributesEvent;


class AttributeListingListener extends AbstractAttributeListener
{

    public function __invoke(ParseAttributesEvent $event): void
    {
        foreach ($event->getReflection()->getAttributes(Listing::class, \ReflectionAttribute::IS_INSTANCEOF) as $attribute)
        {
            $GLOBALS['TL_DCA'][$event->getTable()]['list'] = \array_replace_recursive(
                $GLOBALS['TL_DCA'][$event->getTable()]['list'] ?? [],
                get_object_vars($attribute->newInstance())
            );
        }
    }

}
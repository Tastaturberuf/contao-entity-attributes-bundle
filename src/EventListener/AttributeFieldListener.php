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


use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\Field;
use Tastaturberuf\ContaoEntityAttributesBundle\Event\ParseAttributesEvent;


class AttributeFieldListener extends AbstractAttributeListener
{

    public function __invoke(ParseAttributesEvent $event): void
    {
        foreach ($event->getProperties() as $property)
        {
            foreach ($property->getAttributes(Field::class, \ReflectionAttribute::IS_INSTANCEOF) as $attribute )
            {
                $GLOBALS['TL_DCA'][$event->getTable()]['fields'][$this->getName($property)] =
                    \array_replace_recursive(
                        $GLOBALS['TL_DCA'][$event->getTable()]['fields'][$this->getName($property)] ?? [],
                        get_object_vars($attribute->newInstance())
                    );
            }
        }
    }

}
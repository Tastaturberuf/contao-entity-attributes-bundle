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


use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\Evaluation;
use Tastaturberuf\ContaoEntityAttributesBundle\Event\ParseAttributesEvent;

class AttributeEvaluationListener extends AbstractAttributeListener
{

    public function __invoke(ParseAttributesEvent $event): void
    {
        foreach ($event->getReflection()->getProperties() as $property)
        {
            foreach ($property->getAttributes(Evaluation::class, \ReflectionAttribute::IS_INSTANCEOF) as $attribute)
            {
                $GLOBALS['TL_DCA'][$event->getTable()]['fields'][$this->getName($property)]['eval'] =
                    \array_merge_recursive(
                        $GLOBALS['TL_DCA'][$event->getTable()]['fields'][$this->getName($property)]['eval'] ?? [],
                        (array) $attribute->newInstance()
                    )
                ;
            }
        }
    }

}
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


use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\Operation;
use Tastaturberuf\ContaoEntityAttributesBundle\Event\ParseAttributesEvent;

class AttributeOperationListener extends AbstractAttributeListener
{

    public function __invoke(ParseAttributesEvent $event): void
    {
        foreach ($event->getReflection()->getAttributes(Operation::class, \ReflectionAttribute::IS_INSTANCEOF) as $attribute)
        {
            /** @var Operation $operation */
            $operation = $attribute->newInstance();

            $GLOBALS['TL_DCA'][$event->getTable()]['list']['operations'][$operation->getName()] = get_object_vars($operation);
        }
    }

}

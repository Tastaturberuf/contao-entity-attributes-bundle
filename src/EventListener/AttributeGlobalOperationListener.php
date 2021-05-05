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


use ReflectionAttribute;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\GlobalOperation;
use Tastaturberuf\ContaoEntityAttributesBundle\Event\ParseAttributesEvent;

class AttributeGlobalOperationListener extends AbstractAttributeListener
{

    public function __invoke(ParseAttributesEvent $event): void
    {
        foreach ($event->getReflection()->getAttributes(GlobalOperation::class, ReflectionAttribute::IS_INSTANCEOF) as $attribute)
        {
            /** @var GlobalOperation $operation */
            $operation = $attribute->newInstance();

            $GLOBALS['TL_DCA'][$event->getTable()]['list']['global_operations'][$operation->getName()] = get_object_vars($operation);
        }
    }

}

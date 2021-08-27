<?php

namespace Tastaturberuf\ContaoEntityAttributesBundle\Tests\EventListener;

use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\ORM\Mapping\Table;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Tastaturberuf\ContaoEntityAttributesBundle\Event\ParseAttributesEvent;
use Tastaturberuf\ContaoEntityAttributesBundle\EventListener\AbstractAttributeListener;
use Tastaturberuf\ContaoEntityAttributesBundle\Tests\Entity\Entity;

class ListenerTestCase extends TestCase
{

    protected ParseAttributesEvent $event;


    protected function mockListener(string $listenerClass): AbstractAttributeListener
    {
        $classMetaData = $this->createMock(ClassMetadataInfo::class);
        $classMetaData->method('getReflectionClass')
            ->willReturn(new \ReflectionClass(Entity::class))
        ;

        $table = $classMetaData->getReflectionClass()->getAttributes(Table::class)[0]->newInstance()->name;

        $this->event = new ParseAttributesEvent($classMetaData, $table);

        return new $listenerClass($this->createMock(ParameterBagInterface::class));
    }

}

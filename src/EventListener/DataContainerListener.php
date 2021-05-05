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


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Tastaturberuf\ContaoEntityAttributesBundle\Event\ParseAttributesEvent;


class DataContainerListener
{

    private array $entities;


    public function __construct
    (
        iterable $entities,
        private EntityManagerInterface $entityManager,
        private EventDispatcherInterface $eventDispatcher
    )
    {
        $this->setEntities($entities);
    }


    public function __invoke(string $table): void
    {
        if ( !array_key_exists($table, $this->entities) )
        {
            return;
        }

        $entity = $this->entities[$table];

        try
        {
            $reflection = new \ReflectionClass($entity);
        } catch (\ReflectionException $e)
        {
            return;
        }

        $this->eventDispatcher->dispatch(new ParseAttributesEvent($reflection, $table));
    }


    private function setEntities(iterable $entities): void
    {
        foreach ($entities as $entity)
        {
            if ($table = $this->entityManager->getClassMetadata($entity::class)->getTableName() )
            {
                $this->entities[$table] = $entity;
            }
        }
    }

}

<?php

/**
 * Contao Entity Attributes Bundle for Contao Open Source CMS
 *
 * @copyright   2020 - 2021 Tastaturberuf <https://tastaturberuf.de>
 * @author      Daniel Jahnsmüller <https://tastaturberuf.de>
 * @licence     LGPL-3.0-or-later
 */


declare(strict_types=1);


namespace Tastaturberuf\ContaoEntityAttributesBundle\Event;


use Doctrine\ORM\Mapping\ClassMetadataInfo;
use JetBrains\PhpStorm\Pure;
use Symfony\Contracts\EventDispatcher\Event;


class ParseAttributesEvent extends Event
{

    public function __construct(
        private ClassMetadataInfo $classMetadata,
        private string $table
    )
    {
    }


    public function getClassMetaData(): ClassMetadataInfo
    {
        return $this->classMetadata;
    }


    public function getReflection(): \ReflectionClass
    {
        return $this->classMetadata->getReflectionClass();
    }


    /**
     * @return \ReflectionProperty[]
     */
    #[Pure]
    public function getProperties(): array
    {
        return $this->classMetadata->getReflectionClass()->getProperties();
    }


    public function getTable(): string
    {
        return $this->table;
    }

}

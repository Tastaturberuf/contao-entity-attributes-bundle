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


use Doctrine\Common\Annotations\Reader;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\OneToMany;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Tastaturberuf\ContaoEntityAttributesBundle\Event\ParseAttributesEvent;

abstract class AbstractAttributeListener
{

    public function __construct(private Reader $annotationReader, private ParameterBagInterface $parameterBag)
    {
    }


    abstract public function __invoke(ParseAttributesEvent $event): void;


    protected function getName(\ReflectionProperty $property): string
    {

        foreach ( $property->getAttributes(OneToMany::class) as $attribute )
        {
            $oneToMany = $attribute->newInstance();

            //@todo get fieldnames from Doctrine ORM
        }

        foreach ($property->getAttributes(Column::class) as $attribute)
        {
            /** @var Column $column */
            $column = $attribute->newInstance();

            if ( is_string($column->name) )
            {
                return $column->name;
            }
        }

        // fallback to Doctrine Annotations

        /** @var OneToMany $annotation */
        if ( null !== ($annotation = $this->annotationReader->getPropertyAnnotation($property, OneToMany::class)) )
        {
            trigger_deprecation('PACKAGE NAME', 'Version NUMBERS', 'Use PHP 8 Attributes!');

            //@todo get fieldnames from Doctrine ORM
        }


        /** @var Column $annotation */
        if ( null !== ($annotation = $this->annotationReader->getPropertyAnnotation($property, Column::class)) )
        {
            trigger_deprecation('PACKAGE NAME', 'Version NUMBERS', 'Use PHP 8 Attributes!');

            if ( is_string($annotation->name) )
            {
                return $annotation->name;
            }
        }

        return $property->name;
    }


    /**
     * Parse container parameters in arrays. So you can use configuration values in your annotations
     * like #[Evaluation(path="%app.my.custom.path%", extensions="%contao.image.valid_types%")].
     */
    private function parseParams(array $values): array
    {
        foreach ( $values as &$value )
        {
            if ( is_string($value) && str_starts_with($value, '%') && str_ends_with($value, '%') )
            {
                // remove first % and last %
                $key = substr($value, 1, -1);

                if ( $this->parameterBag->has($key) )
                {
                    $value = $this->parameterBag->get($key);
                }
            }
            elseif ( is_array($value) )
            {
                $value = $this->parseParams($value);
            }
        }

        return $values;
    }

}

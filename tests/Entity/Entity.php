<?php

namespace Tastaturberuf\ContaoEntityAttributesBundle\Tests\Entity;

use Doctrine\ORM\Mapping as ORM;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute as DCA;

#[ORM\Entity]
#[ORM\Table(name: 'test_table_name')]
#[DCA\DataContainer]
#[DCA\Config(my_custom_key: 'custom_value')]
#[DCA\Label]
#[DCA\GlobalOperationAll]
#[DCA\GlobalOperation(name: 'name', label: 'label', href: 'href')]
#[DCA\OperationCopy]
#[DCA\OperationCopyPaste]
#[DCA\OperationCut]
#[DCA\OperationDelete]
#[DCA\OperationEdit]
#[DCA\OperationShow]
#[DCA\OperationToggle('toggle')]
class Entity
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column]
    #[DCA\Evaluation]
    private string $test_default_eval;

    #[ORM\Column(nullable: true)]
    #[DCA\Field]
    private string $test_default_field;

}

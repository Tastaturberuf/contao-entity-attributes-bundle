<?php

declare(strict_types=1);

namespace Tastaturberuf\ContaoEntityAttributesBundle\Tests\EventListener;

use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\AbstractAttribute;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\Config;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\DataContainer;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\Evaluation;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\Field;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\GlobalOperation;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\GlobalOperationAll;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\Label;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\OperationCopy;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\OperationCopyPaste;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\OperationCut;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\OperationDelete;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\OperationEdit;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\OperationShow;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute\OperationToggle;
use Tastaturberuf\ContaoEntityAttributesBundle\EventListener\AbstractAttributeListener;
use Tastaturberuf\ContaoEntityAttributesBundle\EventListener\AttributeConfigListener;
use Tastaturberuf\ContaoEntityAttributesBundle\EventListener\AttributeDataContainerListener;
use Tastaturberuf\ContaoEntityAttributesBundle\EventListener\AttributeEvaluationListener;
use Tastaturberuf\ContaoEntityAttributesBundle\EventListener\AttributeFieldListener;
use Tastaturberuf\ContaoEntityAttributesBundle\EventListener\AttributeGlobalOperationListener;
use Tastaturberuf\ContaoEntityAttributesBundle\EventListener\AttributeLabelListener;
use Tastaturberuf\ContaoEntityAttributesBundle\EventListener\AttributeOperationListener;

class AttributeConfigListenerTest extends ListenerTestCase
{

    /**
     * @depends testDataContainer
     */
    public function testConfig(): void
    {
        $listener = $this->mockListener(AttributeConfigListener::class);
        $listener->__invoke($this->event);

        $this->assertArrayHasKey('config', $GLOBALS['TL_DCA'][$this->event->getTable()]);
        $this->assertEquals(
            get_object_vars(new Config(my_custom_key: 'custom_value')),
            $GLOBALS['TL_DCA'][$this->event->getTable()]['config']
        );
    }


    public function testDataContainer(): void
    {
        $listener = $this->mockListener(AttributeDataContainerListener::class);
        $listener->__invoke($this->event);

        $this->assertEquals(
            get_object_vars(new DataContainer()),
            $GLOBALS['TL_DCA'][$this->event->getTable()]
        );
    }


    public function testEvaluation(): void
    {
        $listener = $this->mockListener(AttributeEvaluationListener::class);
        $listener->__invoke($this->event);

        $this->assertEquals(
            get_object_vars(new Evaluation()),
            $GLOBALS['TL_DCA'][$this->event->getTable()]['fields']['test_default_eval']['eval']
        );
    }


    public function testField(): void
    {
        $listener = $this->mockListener(AttributeFieldListener::class);

        $this->assertInstanceOf(AbstractAttributeListener::class, $listener);

        $listener->__invoke($this->event);

        $this->assertEquals(
            get_object_vars(new Field()),
            $GLOBALS['TL_DCA'][$this->event->getTable()]['fields']['test_default_field']
        );
    }


    public function testGlobalOperationAll(): void
    {
        $listener = $this->mockListener(AttributeGlobalOperationListener::class);

        $this->assertInstanceOf(AbstractAttributeListener::class, $listener);

        $listener->__invoke($this->event);

        $this->assertEquals(
            get_object_vars(new GlobalOperationAll()),
            $GLOBALS['TL_DCA'][$this->event->getTable()]['list']['global_operations']['all']
        );

        // custom global operation
        $this->assertEquals(
            get_object_vars(new GlobalOperation('name', label: 'label', href: 'href')),
            $GLOBALS['TL_DCA'][$this->event->getTable()]['list']['global_operations']['name']
        );
    }


    public function testLabel(): void
    {
        $listener = $this->mockListener(AttributeLabelListener::class);

        $this->assertInstanceOf(AbstractAttributeListener::class, $listener);

        $listener->__invoke($this->event);

        $this->assertEquals(
            get_object_vars(new Label()),
            $GLOBALS['TL_DCA'][$this->event->getTable()]['list']['label']
        );
    }

    public function testOperation(): void
    {
        $listener = $this->mockListener(AttributeOperationListener::class);

        $this->assertInstanceOf(AbstractAttributeListener::class, $listener);

        $listener->__invoke($this->event);

        $this->assertEquals(
            get_object_vars(new OperationCopy()),
            $GLOBALS['TL_DCA'][$this->event->getTable()]['list']['operations'][(new OperationCopy())->getName()]
        );

        $this->assertEquals(
            get_object_vars(new OperationCopyPaste()),
            $GLOBALS['TL_DCA'][$this->event->getTable()]['list']['operations'][(new OperationCopyPaste())->getName()]
        );

        $this->assertEquals(
            get_object_vars(new OperationCut()),
            $GLOBALS['TL_DCA'][$this->event->getTable()]['list']['operations'][(new OperationCut())->getName()]
        );

        $this->assertEquals(
            get_object_vars(new OperationDelete()),
            $GLOBALS['TL_DCA'][$this->event->getTable()]['list']['operations'][(new OperationDelete())->getName()]
        );

        $this->assertEquals(
            get_object_vars(new OperationEdit()),
            $GLOBALS['TL_DCA'][$this->event->getTable()]['list']['operations'][(new OperationEdit())->getName()]
        );

        $this->assertEquals(
            get_object_vars(new OperationShow()),
            $GLOBALS['TL_DCA'][$this->event->getTable()]['list']['operations'][(new OperationShow())->getName()]
        );

        $this->assertEquals(
            get_object_vars(new OperationToggle('toggle')),
            $GLOBALS['TL_DCA'][$this->event->getTable()]['list']['operations'][(new OperationToggle('toggle'))->getName()]
        );
    }



}

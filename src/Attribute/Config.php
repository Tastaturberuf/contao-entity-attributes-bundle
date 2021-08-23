<?php

/**
 * Contao Entity Attributes Bundle for Contao Open Source CMS
 *
 * @copyright   2020 - 2021 Tastaturberuf <https://tastaturberuf.de>
 * @author      Daniel Jahnsmüller <https://tastaturberuf.de>
 * @licence     LGPL-3.0-or-later
 */

declare(strict_types=1);


namespace Tastaturberuf\ContaoEntityAttributesBundle\Attribute;


#[\Attribute(\Attribute::TARGET_CLASS)]
class Config extends AbstractAttribute
{

    /**
     * Config constructor.
     * @param string|null $label
     * @param string|null $ptable
     * @param bool $dynamicPTable
     * @param array $ctable
     * @param string $dataContainer
     * @param string|null $markAsCopy
     * @param bool $closed
     * @param bool $notEditable
     * @param bool $notDeletable
     * @param bool $notSortable
     * @param bool $notCopyable
     * @param bool $notCreatable
     * @param bool $switchToEdit
     * @param bool $enableVersioning
     * @param bool $doNotCopyRecords
     * @param bool $doNotDeleteRecords
     * @param bool $testi
     * @param mixed ...$__custom_properties
     */
    public function __construct(
        public ?string $label = null,
        public ?string $ptable = null,
        public bool    $dynamicPTable = false,
        public array   $ctable = [],
        public string  $dataContainer = 'Table',
        public ?string $markAsCopy = null,
        public bool    $closed = false,
        public bool    $notEditable = false,
        public bool    $notDeletable = false,
        public bool    $notSortable = false,
        public bool    $notCopyable = false,
        public bool    $notCreatable = false,
        public bool    $switchToEdit = false,
        public bool    $enableVersioning = false,
        public bool    $doNotCopyRecords = false,
        public bool    $doNotDeleteRecords = false,
               mixed   ...$__custom_properties
    )
    {
        $this->parseCustomProperties($__custom_properties);
    }

}

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
class Sorting extends AbstractAttribute
{

    /**
     * Records are not sorted
     */
    public const MODE_NONE = 0;

    /**
     * Records are sorted by a fixed field
     */
    public const MODE_FIXED_FIELD = 1;

    /**
     * Records are sorted by a switchable field
     */
    public const MODE_SWITCHABLE_FIELD = 2;

    /**
     * Records are sorted by the parent table
     */
    public const MODE_PARENT_TABLE = 3;

    /**
     * Displays the child records of a parent record (see style sheets module)
     */
    public const MODE_CHILD_VIEW = 4;

    /**
     * Records are displayed as tree (see site structure)
     */
    public const MODE_TREE_VIEW = 5;

    /**
     * Displays the child records within a tree structure (see articles module)
     */
    public const MODE_CHILD_TREE_VIEW = 6;

    /**
     * Sort by initial letter ascending
     */
    public const FLAG_INITIAL_LETTER_ASC = 1;

    /**
     * Sort by initial letter descending
     */
    public const FLAG_INITIAL_LETTER_DESC = 2;

    /**
     * Sort by initial two letters ascending
     */
    public const FLAG_INITIAL_TWO_LETTERS_ASC = 3;

    /**
     * Sort by initial two letters descending
     */
    public const FLAG_INITIAL_TWO_LETTERS_DESC = 4;

    /**
     * Sort by day ascending
     */
    public const FLAG_DAY_ASC = 5;

    /**
     * Sort by day descending
     */
    public const FLAG_DAY_DESC = 6;

    /**
     * Sort by month ascending
     */
    public const FLAG_MONTH_ASC = 7;

    /**
     * Sort by month descending
     */
    public const FLAG_MONTH_DESC = 8;

    /**
     * Sort by year ascending
     */
    public const FLAG_YEAR_ASC = 9;

    /**
     * Sort by year descending
     */
    public const FLAG_YEAR_DESC = 10;

    /**
     * Sort ascending
     */
    public const FLAG_ASC = 11;

    /**
     * Sort descending
     */
    public const FLAG_DESC = 12;


    /**
     * The listing array defines how records are listed. The Contao core engine supports three different “list view”,
     * “parent view” and “tree view”. You can configure various sorting options like filters or the default sorting
     * order and you can add custom labels.
     *
     * @param int         $mode
     * @param int         $flag
     * @param string|null $panelLayout
     * @param array       $fields
     * @param array       $headerFields
     * @param string|null $icon
     * @param array       $root
     * @param bool        $rootPaste
     * @param array       $filter
     * @param bool        $disableGrouping
     * @param string|null $child_record_class
     * @param mixed       ...$__custom_properties
     *
     * @link https://docs.contao.org/dev/reference/dca/list/#sorting
     */
    public function __construct(
        public int     $mode               = self::MODE_NONE,
        public int     $flag               = self::FLAG_ASC,
        public ?string $panelLayout        = 'sort,filter;search,limit',
        public array   $fields             = [],
        public array   $headerFields       = [],
        public ?string $icon               = null,
        public array   $root               = [],
        public bool    $rootPaste          = false,
        public array   $filter             = [],
        public bool    $disableGrouping    = false,
        public ?string $child_record_class = null,
               mixed   ...$__custom_properties
    )
    {
        $this->parseCustomProperties($__custom_properties);
    }

}

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


#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Evaluation extends AbstractAttribute
{

    public function __construct
    (
        public bool   $helpwizard = false,
        public bool   $mandatory = false,
        public int    $maxlenth = 0,
        public int    $minlegth = 0,
        public int    $maxval = 0,
        public int    $minval = 0,
        public bool   $fallback = false,
        public string $rgxp = '',
        public int    $cols = 0,
        public int    $rows = 0,
        public bool   $multiple = false,
        public int    $size = 0,
        public string $style = '',
        public string $rte = '',
        public bool   $submitOnChange = false,
        public bool   $nospace = false,
        public bool   $allowHtml = false,
        public bool   $preserveTags = false,
        public bool   $decodeEntities = false,
        public bool   $useRawRequestData = false,
        public bool   $doNotSaveEmpty = false,
        public bool   $alwaysSave = false,
        public bool   $spaceToUnderscore = false,
        public bool   $unique = false,
        public bool   $trailingSlash = false,
        public bool   $files = false,
        public bool   $filesOnly = false,
        public string $extensions = '',
        public string $path = '',
        public string $fieldType = '',
        public bool   $isSortable = false,
        public string $orderField = '',
        public bool   $includeBlankOption = false,
        public string $blankOptionLabel = '',
        public bool   $chosen = false,
        public bool   $findInSet = false,
        public bool   $datepicker = false,
        public bool   $colorpicker = false,
        public bool   $feEditable = false,
        public string $feGroup = '',
        public bool   $feViewable = false,
        public bool   $doNotCopy = false,
        public bool   $hideInput = false,
        public bool   $doNotShow = false,
        public bool   $isBoolean = false,
        public bool   $isAssociative = false,
        public bool   $disabled = false,
        public bool   $readonly = false,
        public string $csv = '',
        public string $tl_class = '',
        public bool   $dcaPicker = false,
        public string $placeholder = '',
        public bool   $isHexColor = false,
        public array  $metaFields = [],

        protected bool  $w50 = true,
                  array ...$__custom_properties
    )
    {
        if ( $this->w50 )
        {
            $this->tl_class .= ' w50';
        }

        $this->parseCustomProperties($__custom_properties);
    }

}

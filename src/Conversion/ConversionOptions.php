<?php

namespace EXACTSports\FedEx\Conversion;

/**
 * Contains the parameters that specify the properties for the PDF.
 */
class ConversionOptions
{
    public string $marginWidthInInches = '';                // N - Width of the margin for pages in the PDF
    public string $targetWidthInInches = '8.5';             // N - Sets the desired width of the pages for the PDF
    public string $targetHeightInInches = '11';             // N - Sets the desired height of the pages in the PDF
    public string $minDPI = '150.0';                        // N - Sets the minimun DPI for the PDF
    public string $nUpType = '';                            // N - TWOLATERAL, TWOTRANSVERSE, FOUR, UNKNOWN
    public string $powerPointPrintOutputType = '';          // N - Setting for power point presentations SLIDES, ONESLIDEHANDOUTS, TWOSLIDEHANDOUTS, THREESLIDEHANDOUTS, FOURSLIDEHANDOUTS, SIXSLIDEHANDOUTS,
                                                            //  NINESLIDEHANDOUTS, NOTESPAGES, OUTLINE, UNKNOWN
    public bool | null $isPrintHiddenSlides = null;           // N - Applicable for power point presentations
    public bool | null $isFramingSlides = null;               // N - Applicable for power point presentations
    public bool | null $isHandoutHorizontalFirst = null;      // N - Applicable for power point presentations
    public bool | null $isCustomDocument = null;              // N - Expresses whether or not the PDF is a custom document
    public string $orientation = 'PORTRAIT';                // N - Orientation of the pages in the PDF
    public bool $lockContentOrientation = true;             // N - Locks orientation of content
    public string $defaultImageWidthInInches = '';          // N - Width of an image in inches
    public string $defaultImageHeightInInches = '';         // N - Height of an image in inches
}

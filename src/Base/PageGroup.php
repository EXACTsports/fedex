<?php

namespace EXACTSports\FedEx\Base;

class PageGroup
{
    public int $start;                          // N - Start
    public int $end;                            // N - End
    public float $width = 8.5;                  // N - Width
    public float $height = 11;                  // N - Height
    public string $orientation = 'PORTRAIT';    // N - Orientation
}

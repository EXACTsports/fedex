<?php

namespace EXACTSports\FedEx\Http\Services;

class PrintOptionService
{
    public static array $options = [
        [
            'id' => '1448981549109',
            'name' => 'Size',
            'options' => [
                '1448986650332' => '8.5" x 11"',
                '1448986650652' => '8.5" x 14"',
                '1448986651164' => '11" x 17"',
            ],
            'default' => '1448986650332'
        ],
        [
            'id' => '1448981549741',
            'name' => 'Paper',
            'options' => [
                'withMenu' => [
                    [
                        'head' => 'Standar White Papers',
                        'description' => 'Everyday paper, 20-32 lb',
                        'options' => [
                            '1448988661630' => 'Laser (24 lb.)',
                            '1448988664295' => 'Laser (32 lb.)',
                            '1448988665655' => 'Laser Recycled (24lb.)',
                            '1448988666102' => '30 % Recycled (20 lb.)',
                            '1448988666494' => '100% Recycled (20 lb.)'
                        ],
                        "defaultText" => "Laser (32 lb.)"
                    ],
                    [
                        'head' => 'Professional White Papers',
                        'description' => 'Thicker, higher-quality paper, 32lb+',
                        'options' => [
                            '1448988665015' => 'Laser (60 lb.)',
                            '1448988895624' => 'Gloss Cover (100 lb.)',
                            '1448988677979' => 'Laser (80lb.)',
                            '1448988675190' => '110lb. Index',
                            '1448988908744' => 'Pure White (100 % Cotton)',
                            '1448988666879' => 'Gloss Text (32 lb.)',
                            '1448988908007' => 'Ultra Bright White (32 lb.)'
                        ]
                    ],
                ],
            ],
            "default" => "1448988664295"
        ],
        [
            'id' => '1448981549581',
            'name' => 'Color/Black & White',
            'options' => [
                '1448988600611' => 'Full Color',
                '1448988600931' => 'Black & White',
                '1448988601203' => 'First page color, remaining pages \n Black & White'
            ],
            "default" => "1448988600611"
        ],
        [
            'id' => '1448981549269',
            'name' => 'Sides',
            'options' => [
                '1448988124560' => 'Single-Sided',
                '1448988124807' => 'Double-Sided'
            ],
            "default" => "1448988124560"
        ],
        [
            'id' => '1448984679218',
            'name' => 'Orientation',
            'options' => [
                '1449000016192' => 'Portrait',
                '1449000016327' => 'Landscape',
            ],
            "default" => "1449000016192"
        ]
    ];
}
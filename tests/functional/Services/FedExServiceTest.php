<?php

namespace Tests\functional\Services;

use Tests\TestCase;
use EXACTSports\FedEx\Services\FedExService;

class FedExServiceTest extends TestCase
{
    /**
        * A basic test example.
        *
        * @return void
    */
    public function testGetProductsRate()
    {
        $fedexService = new FedExService();
        $request = array(
            "rateRequest" => array(
                "products" => array(
                    array(
                        "id" => "1456773326927", 
                        "name" => "Multi Sheet", 
                        "version" => 2, 
                        "instanceId" => "1636671062", 
                        "userProductName" => "21-08-01-Los-Angeles-Volleyball-1075-coach_packet.pdf", 
                        "qty" => 17, 
                        "properties" => [
                                    [
                                        "id" => "1453242488328", 
                                        "name" => "ZOOM_PERCENTAGE", 
                                        "value" => "60" 
                                    ], 
                                    [
                                        "id" => "1453895478444", 
                                        "name" => "MIN_DPI", 
                                        "value" => "150" 
                                    ], 
                                    [
                                        "id" => "1453894861756", 
                                        "name" => "LOCK_CONTENT_ORIENTATION", 
                                        "value" => false 
                                    ], 
                                    [
                                        "id" => "1453243262198", 
                                        "name" => "ENCODE_QUALITY", 
                                        "value" => "100" 
                                    ], 
                                    [
                                        "id" => "1454950109636", 
                                        "name" => "USER_SPECIAL_INSTRUCTIONS", 
                                        "value" => null 
                                    ], 
                                    [
                                        "id" => "1455050109636", 
                                        "name" => "DEFAULT_IMAGE_WIDTH", 
                                        "value" => "8.5" 
                                    ], 
                                    [
                                        "id" => "1455050109631", 
                                        "name" => "DEFAULT_IMAGE_HEIGHT", 
                                        "value" => "11" 
                                    ], 
                                    [
                                        "id" => "1494365340946", 
                                        "name" => "PREVIEW_TYPE", 
                                        "value" => "DYNAMIC" 
                                    ], 
                                    [
                                        "id" => "1470151626854", 
                                        "name" => "SYSTEM_SI", 
                                        "value" => null 
                                    ], 
                                    [
                                        "id" => "1470151737965", 
                                        "name" => "TEMPLATE_AVAILABLE", 
                                        "value" => "NO" 
                                    ], 
                                    [
                                        "id" => "1490292304798", 
                                        "name" => "MIGRATED_PRODUCT", 
                                        "value" => "true" 
                                    ] 
                        ], 
                        "features" => [
                                    [
                                        "id" => "1448981549109", 
                                        "name" => "Paper Size", 
                                        "choice" => [
                                            "id" => "1448986650332", 
                                            "name" => "8.5x11", 
                                            "properties" => [
                                                [
                                                    "id" => "1449069906033", 
                                                    "name" => "MEDIA_HEIGHT", 
                                                    "value" => "11" 
                                                ], 
                                                [
                                                    "id" => "1449069908929", 
                                                    "name" => "MEDIA_WIDTH", 
                                                    "value" => "8.5" 
                                                ] 
                                            ] 
                                        ]    
                                    ], 
                                    [
                                        "id" => "1448981549741", 
                                        "name" => "Paper Type", 
                                        "choice" => [
                                            "id" => "1448988664295", 
                                            "name" => "Laser (32 lb.)", 
                                            "properties" => [
                                                [
                                                    "id" => "1450324098012", 
                                                    "name" => "MEDIA_TYPE",     
                                                    "value" => "E32" 
                                                ], 
                                                [
                                                    "id" => "1453234015081", 
                                                    "name" => "PAPER_COLOR", 
                                                    "value" => "#FFFFFF" 
                                                ], 
                                                [
                                                    "id" => "1471275182312", 
                                                    "name" => "MEDIA_CATEGORY", 
                                                    "value" => "RESUME" 
                                                ] 
                                            ] 
                                        ] 
                                    ], 
                                    [
                                        "id" => "1448981549581", 
                                        "name" => "Print Color", 
                                        "choice" => [
                                            "id" => "1448988600611", 
                                            "name" => "Full Color", 
                                            "properties" => [
                                                [
                                                "id" => "1453242778807", 
                                                "name" => "PRINT_COLOR", 
                                                "value" => "COLOR" 
                                                ] 
                                            ] 
                                        ] 
                                    ], 
                                    [
                                        "id" => "1448981549269", 
                                        "name" => "Sides", 
                                        "choice" => [
                                            "id" => "1448988124560", 
                                            "name" => "Single-Sided", 
                                            "properties" => [
                                                [
                                                    "id" => "1461774376168", 
                                                    "name" => "SIDE", 
                                                    "value" => "SINGLE" 
                                                ], 
                                                [
                                                    "id" => "1471294217799", 
                                                    "name" => "SIDE_VALUE", 
                                                    "value" => "1" 
                                                ] 
                                            ] 
                                        ]        
                                    ], 
                                    [
                                        "id" => "1448984679218", 
                                        "name" => "Orientation", 
                                        "choice" => [
                                            "id" => "1449000016192", 
                                            "name" => "Vertical", 
                                            "properties" => [
                                                [
                                                    "id" => "1453260266287", 
                                                    "name" => "PAGE_ORIENTATION", 
                                                    "value" => "PORTRAIT" 
                                                ] 
                                            ] 
                                        ] 
                                    ], 
                                    [
                                        "id" => "1448981554101", 
                                        "name" => "Prints Per Page", 
                                        "choice" => [
                                            "id" => "1448990257151", 
                                            "name" => "One", 
                                            "properties" => [
                                                [
                                                "id" => "1455387404922", 
                                                "name" => "PRINTS_PER_PAGE", 
                                                "value" => "ONE" 
                                                ] 
                                            ] 
                                        ] 
                                    ], 
                                    [
                                        "id" => "1448984877869", 
                                        "name" => "Cutting", 
                                            "choice" => [
                                            "id" => "1448999392195", 
                                            "name" => "None", 
                                            "properties" => [] 
                                        ] 
                                    ],  
                                    [
                                        "id" => "1448981555573", 
                                        "name" => "Hole Punching", 
                                        "choice" => [
                                            "id" => "1448999902070", 
                                            "name" => "None", 
                                            "properties" => [] 
                                        ] 
                                    ], 
                                    [
                                        "id" => "1448981532145", 
                                        "name" => "Collation", 
                                        "choice" => [
                                            "id" => "1448986654687", 
                                            "name" => "Collated", 
                                            "properties" => [
                                                [
                                                    "id" => "1449069945785", 
                                                    "name" => "COLLATION_TYPE", 
                                                    "value" => "MACHINE" 
                                                ] 
                                            ] 
                                        ] 
                                    ], 
                                    [
                                        "id" => "1448984679442", 
                                        "name" => "Lamination", 
                                        "choice" => [
                                            "id" => "1448999458409", 
                                            "name" => "None", 
                                            "properties" => [] 
                                        ] 
                                    ] 
                        ], 
                        "contentAssociations" => [
                            [
                                "parentContentReference" => "12742959633065283519616696809770541953321", 
                                "contentReference" => "12742954914040976625419627059360196884682", 
                                "contentType" => "PDF", 
                                "fileName" => "21-08-01-Los-Angeles-Volleyball-1075-coach_packet.pdf", 
                                "contentReqId" => "1483999952979", 
                                "name" => "Multi Sheet", 
                                "purpose" => "MAIN_CONTENT", 
                                "printReady" => true, 
                                "pageGroups" => [
                                    [
                                        "start" => 1, 
                                        "end" => 5, 
                                        "width" => 8.5, 
                                        "height" => 11, 
                                        "orientation" => "PORTRAIT" 
                                    ] 
                                ] 
                            ] 
                        ]
                    )
                )
            )
        );

        $response = $fedexService->getRate($request);

        $this->assertTrue(true);
    }
}

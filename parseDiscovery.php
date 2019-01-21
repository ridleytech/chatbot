<?php //sample data from webservice

$data = "{
    \"matching_results\": 2,
    \"results\": [
        {
            \"id\": \"1127ed24228404aaf4bcec23db742cc6\",
            \"result_metadata\": {
                \"score\": 2.7525012
            },
            \"enriched_text\": {
                \"sentiment\": {
                    \"document\": {
                        \"score\": 0.147293,
                        \"label\": \"positive\"
                    }
                },
                \"concepts\": [
                    {
                        \"text\": \"Seat belt\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Seat_belt\",
                        \"relevance\": 0.972164
                    },
                    {
                        \"text\": \"Automobile\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Automobile\",
                        \"relevance\": 0.898672
                    },
                    {
                        \"text\": \"Automobile safety\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Automobile_safety\",
                        \"relevance\": 0.751968
                    },
                    {
                        \"text\": \"Airbag\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Airbag\",
                        \"relevance\": 0.710635
                    },
                    {
                        \"text\": \"Automotive safety technologies\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Automotive_safety_technologies\",
                        \"relevance\": 0.678291
                    },
                    {
                        \"text\": \"Brake\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Brake\",
                        \"relevance\": 0.65273
                    },
                    {
                        \"text\": \"Vehicle\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Vehicle\",
                        \"relevance\": 0.634714
                    },
                    {
                        \"text\": \"Lifeguard\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Lifeguard_(Automobile_safety)\",
                        \"relevance\": 0.504565
                    }
                ],
                \"entities\": [
                    {
                        \"count\": 1,
                        \"sentiment\": {
                            \"score\": 0,
                            \"label\": \"neutral\"
                        },
                        \"text\": \"ETDs\",
                        \"relevance\": 0.739057,
                        \"type\": \"Company\"
                    },
                    {
                        \"count\": 1,
                        \"sentiment\": {
                            \"score\": 0,
                            \"label\": \"neutral\"
                        },
                        \"text\": \"180-degree\",
                        \"relevance\": 0.739057,
                        \"type\": \"Quantity\"
                    },
                    {
                        \"count\": 1,
                        \"sentiment\": {
                            \"score\": 0,
                            \"label\": \"neutral\"
                        },
                        \"text\": \"65 mph\",
                        \"relevance\": 0.739057,
                        \"type\": \"Quantity\"
                    }
                ],
                \"categories\": [
                    {
                        \"score\": 0.642777,
                        \"label\": \"/technology and computing\"
                    },
                    {
                        \"score\": 0.388471,
                        \"label\": \"/automotive and vehicles/cars\"
                    },
                    {
                        \"score\": 0.353937,
                        \"label\": \"/technology and computing/consumer electronics/camera and photo equipment/cameras and camcorders/cameras\"
                    }
                ]
            },
            \"extracted_metadata\": {
                \"publicationdate\": \"2017-12-15\",
                \"sha1\": \"09cd206093fdfc60e732937a24d25067a7046ac8\",
                \"author\": \"Ridley, Randall (525-Extern)\",
                \"filename\": \"CLA Safety.docx\",
                \"file_type\": \"word\",
                \"title\": \"no title\"
            },
            \"text\": \"no title\\n\\nActive Brake Assist\\n\\nStandard\\n\\n \\n\\nRadar-based technology alerts you if you're approaching a vehicle ahead, or even some\\n\\nstationary objects, at a speed and distance that suggest a collision is likely. As soon as\\n\\nthe driver starts to brake, Active Brake Assist can automatically provide an appropriate\\n\\nlevel of braking to help prevent a collision or reduce its severity. If you fail to\\n\\nrespond, the system can also initiate braking automatically from speeds up to 65 mph.\\n\\n \\n\\nATTENTION ASSIST\\n\\nStandard\\n\\n \\n\\nThe first system of its kind, ATTENTION ASSIST® continuously monitors different parameters\\n\\nof driving behavior, and can automatically alert the driver with both visual and audible\\n\\nwarnings if it detects signs of drowsiness on long trips.\\n\\n \\n\\nRearview camera\\n\\nStandard\\n\\n \\n\\nThis driver-assistance feature helps you to see directly behind your vehicle when backing\\n\\nup. Shift into Reverse, and a rear-mounted camera displays a live 180-degree view of\\n\\nwhat's behind the vehicle on the screen atop the dashboard. Active on-screen guidelines\\n\\nindicate the car's projected path as you turn the steering wheel\\n\\n \\n\\nSeat belt technology\\n\\nStandard\\n\\n \\n\\nArguably our most important passive safety feature, all four outboard 3-point seat belts\\n\\nare equipped with Emergency Tensioning Devices (ETDs) and belt force limiters. If a\\n\\ncollision exceeds a preset threshold, ETDs instantly remove slack from the seat belts.\\n\\nBelt force limiters allow a slight amount of give in the seat belts, to reduce the peak\\n\\nseat-belt forces on the occupant.\\n\\n \"
        },
        {
            \"id\": \"9ed4c6e375399fddd91bd783ff7871c4\",
            \"result_metadata\": {
                \"score\": 1.4316691
            },
            \"enriched_text\": {
                \"sentiment\": {
                    \"document\": {
                        \"score\": 0.26443,
                        \"label\": \"positive\"
                    }
                },
                \"concepts\": [
                    {
                        \"text\": \"Seat belt\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Seat_belt\",
                        \"relevance\": 0.958449
                    },
                    {
                        \"text\": \"Automobile safety\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Automobile_safety\",
                        \"relevance\": 0.778527
                    },
                    {
                        \"text\": \"Automatic transmission\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Automatic_transmission\",
                        \"relevance\": 0.770707
                    },
                    {
                        \"text\": \"Manual transmission\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Manual_transmission\",
                        \"relevance\": 0.767438
                    },
                    {
                        \"text\": \"Airbag\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Airbag\",
                        \"relevance\": 0.734736
                    },
                    {
                        \"text\": \"Automotive safety technologies\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Automotive_safety_technologies\",
                        \"relevance\": 0.623816
                    },
                    {
                        \"text\": \"Steering\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Steering\",
                        \"relevance\": 0.606165
                    },
                    {
                        \"text\": \"Auto parts\",
                        \"dbpedia_resource\": \"http://dbpedia.org/resource/Auto_parts\",
                        \"relevance\": 0.57343
                    }
                ],
                \"entities\": [
                    {
                        \"count\": 1,
                        \"sentiment\": {
                            \"score\": 0,
                            \"label\": \"neutral\"
                        },
                        \"text\": \"ETDs\",
                        \"relevance\": 0.718089,
                        \"type\": \"Company\"
                    },
                    {
                        \"count\": 1,
                        \"sentiment\": {
                            \"score\": 0,
                            \"label\": \"neutral\"
                        },
                        \"text\": \"CLA\",
                        \"relevance\": 0.657391,
                        \"type\": \"Organization\"
                    },
                    {
                        \"count\": 1,
                        \"sentiment\": {
                            \"score\": 0,
                            \"label\": \"neutral\"
                        },
                        \"text\": \"AMG\",
                        \"relevance\": 0.611231,
                        \"type\": \"Company\"
                    },
                    {
                        \"count\": 2,
                        \"sentiment\": {
                            \"score\": 0,
                            \"label\": \"neutral\"
                        },
                        \"text\": \"2.0L\",
                        \"relevance\": 0.611231,
                        \"type\": \"Quantity\"
                    },
                    {
                        \"count\": 1,
                        \"sentiment\": {
                            \"score\": 0,
                            \"label\": \"neutral\"
                        },
                        \"text\": \"180-degree\",
                        \"relevance\": 0.611231,
                        \"type\": \"Quantity\"
                    },
                    {
                        \"count\": 1,
                        \"sentiment\": {
                            \"score\": 0,
                            \"label\": \"neutral\"
                        },
                        \"text\": \"208-hp\",
                        \"relevance\": 0.611231,
                        \"type\": \"Quantity\"
                    },
                    {
                        \"count\": 1,
                        \"sentiment\": {
                            \"score\": 0,
                            \"label\": \"neutral\"
                        },
                        \"text\": \"258 lb\",
                        \"relevance\": 0.611231,
                        \"type\": \"Quantity\"
                    },
                    {
                        \"count\": 1,
                        \"sentiment\": {
                            \"score\": 0,
                            \"label\": \"neutral\"
                        },
                        \"text\": \"65 mph\",
                        \"relevance\": 0.611231,
                        \"type\": \"Quantity\"
                    },
                    {
                        \"count\": 1,
                        \"sentiment\": {
                            \"score\": 0,
                            \"label\": \"neutral\"
                        },
                        \"text\": \"$850\",
                        \"relevance\": 0.611231,
                        \"type\": \"Quantity\"
                    }
                ],
                \"categories\": [
                    {
                        \"score\": 0.475822,
                        \"label\": \"/technology and computing\"
                    },
                    {
                        \"score\": 0.440775,
                        \"label\": \"/automotive and vehicles/cars\"
                    },
                    {
                        \"score\": 0.310868,
                        \"label\": \"/business and industrial/energy/oil/oil company\"
                    }
                ]
            },
            \"extracted_metadata\": {
                \"publicationdate\": \"2017-12-15\",
                \"sha1\": \"6081ba61eea60ac15a74e3955324d2b79ba8c704\",
                \"author\": \"Ridley, Randall (525-Extern)\",
                \"filename\": \"CLA Features.docx\",
                \"file_type\": \"word\",
                \"title\": \"no title\"
            },
            \"text\": \"no title\\n\\n2.0L inline-4 turbo engine\\n\\nStandard\\n\\n \\n\\nThe 208-hp 2.0L inline-4 engine combines turbocharging with numerous advances to deliver\\n\\nmore power from less fuel. Its rapid-multispark ignition and high-pressure Direct\\n\\nInjection can fine-tune themselves in milliseconds. Its twin-scroll turbo quickly spins up\\n\\nto 230,000 rpm to boost response, with all 258 lb-ft of torque on tap at just 1,250 rpm.\\n\\nWidely variable timing of all 16 valves and innovative 3-phase cooling team up to reduce\\n\\nemissions while raising your emotions.\\n\\n \\n\\n7-speed DCT dual-clutch automatic transmission\\n\\nStandard\\n\\n \\n\\nThe racing-inspired 7-speed transmission combines the sporty response of a manual, the\\n\\nsmooth refinement of an automatic, and better efficiency than either. Dual clutches offer\\n\\nquicker gear changes than a human can shift a traditional manual gearbox, while three\\n\\noverdrive ratios boost highway mpg. Selectable ECO, Sport and Manual modes let you favor\\n\\nfully automatic efficiency and comfort, intensified response, or shift-for-yourself\\n\\nexcitement via the steering wheel-mounted shift paddles.\\n\\n \\n\\nAdjustable suspension\\n\\nOptional / $850\\n\\n \\n\\nAn adjustable suspension lets you select between Comfort and Sport settings to match the\\n\\ncar's handling and ride characteristics to your mood. Electronically controlled shock\\n\\nabsorbers adapt to maximize sporty response or relaxing comfort at the touch of a button.\\n\\n \\n\\nElectromechanical power steering\\n\\nStandard\\n\\n \\n\\nAdvanced electromechanical power steering delivers quicker response in corners, easier\\n\\nmaneuvering at low speeds, along with precise on-center feel and straight-line stability.\\n\\n \\n\\nPerformance suspension, steering and exhaust\\n\\nOptional\\n\\n \\n\\nDeveloped for the CLA by the masters at AMG, a track-tuned suspension features beefier,\\n\\nmore rigid components and exclusive geometry. In addition, the chassis is upgraded with a\\n\\nlinear-ratio sport steering setup. A performance-tuned exhaust emits a subtle growl, while\\n\\nenhanced tuning of the transmission's Sport mode yields quicker shift response and\\n\\nincludes downshift rev-matching.\\n\\n \\n\\nConstant-ratio electromechanical power steering\\n\\nOptional\\n\\n \\n\\nAdvanced speed-dependent electromechanical power steering delivers quicker response in\\n\\ncorners, easier maneuvering at low speeds, along with precise on-center feel and\\n\\nstraight-line stability. The AMG-calibrated constant-ratio design puts the crisp control\\n\\nof the chassis in your hands, for direct feedback and inspiring handling precision.\\n\\n \\n\\n8 air bags\\n\\nStandard\\n\\n \\n\\nAn advanced system of 8 air bags includes dual two-stage front air bags, front side-impact\\n\\nhead/torso air bags, dual front knee air bags, and side curtain air bags for both seating\\n\\nrows\\n\\n \\n\\nActive Brake Assist\\n\\nStandard\\n\\n \\n\\nRadar-based technology alerts you if you're approaching a vehicle ahead, or even some\\n\\nstationary objects, at a speed and distance that suggest a collision is likely. As soon as\\n\\nthe driver starts to brake, Active Brake Assist can automatically provide an appropriate\\n\\nlevel of braking to help prevent a collision or reduce its severity. If you fail to\\n\\nrespond, the system can also initiate braking automatically from speeds up to 65 mph.\\n\\n \\n\\nATTENTION ASSIST\\n\\nStandard\\n\\n \\n\\nThe first system of its kind, ATTENTION ASSIST® continuously monitors different parameters\\n\\nof driving behavior, and can automatically alert the driver with both visual and audible\\n\\nwarnings if it detects signs of drowsiness on long trips.\\n\\n \\n\\nRearview camera\\n\\nStandard\\n\\n \\n\\nThis driver-assistance feature helps you to see directly behind your vehicle when backing\\n\\nup. Shift into Reverse, and a rear-mounted camera displays a live 180-degree view of\\n\\nwhat's behind the vehicle on the screen atop the dashboard. Active on-screen guidelines\\n\\nindicate the car's projected path as you turn the steering wheel\\n\\n \\n\\nSeat belt technology\\n\\nStandard\\n\\n \\n\\nArguably our most important passive safety feature, all four outboard 3-point seat belts\\n\\nare equipped with Emergency Tensioning Devices (ETDs) and belt force limiters. If a\\n\\ncollision exceeds a preset threshold, ETDs instantly remove slack from the seat belts.\\n\\nBelt force limiters allow a slight amount of give in the seat belts, to reduce the peak\\n\\nseat-belt forces on the occupant.\"
        }
    ]
}";

//echo $data . "<br><br>";

$decodedData = json_decode($data);

//var_dump($decodedData);

//echo "<br><br>";

echo var_dump($decodedData->results[1]->text);

?>
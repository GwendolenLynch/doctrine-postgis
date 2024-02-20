<?php

declare(strict_types=1);

/**
 * PostgreSQL PostGIS Geometry/Geography/Box Types
 * http://postgis.net/docs/reference.html#PostGIS_Types.
 */
return [
    /*'box2d' => array(
    ),
    'box3d' => array(
    ),*/
    'Geometry' => [
        'required_arguments' => 1,
        'total_arguments' => 1,
        'tests' => [
            'queries' => [
                [
                    'sql' => "SELECT {function}(ST_GeographyFromText('SRID=4326;LINESTRING(-71.160281 42.258729,-71.160837 42.259113,-71.161144 42.25932)')) AS value",
                    'result' => [
                        'value' => '0102000020E610000003000000E44A3D0B42CA51C06EC328081E21454027BF45274BCA51C0F67B629D2A214540957CEC2E50CA51C07099D36531214540',
                    ],
                ],
            ],
        ],
    ],
    /*'geometry_dump' => array(
    ),*/
    'Geography' => [
        'required_arguments' => 1,
        'total_arguments' => 1,
        'tests' => [
            'queries' => [
                [
                    'sql' => "SELECT {function}(ST_GeographyFromText('SRID=4326;LINESTRING(-71.160281 42.258729,-71.160837 42.259113,-71.161144 42.25932)')) AS value",
                    'result' => [
                        'value' => '0102000020E610000003000000E44A3D0B42CA51C06EC328081E21454027BF45274BCA51C0F67B629D2A214540957CEC2E50CA51C07099D36531214540',
                    ],
                ],
            ],
        ],
    ],
];

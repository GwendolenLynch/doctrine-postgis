<?php

declare(strict_types=1);

/**
 * Geometry Outputs
 * http://postgis.net/docs/reference.html#Geometry_Outputs.
 */
return [
    'ST_AsBinary' => [
        'required_arguments' => 1,
        'total_arguments' => 2,
        'tests' => [
            'queries' => [
                [
                    'sql' => "SELECT ST_AsEWKT(ST_GeomFromWKB({function}(ST_GeomFromText('POLYGON((0 0,0 1,1 1,1 0,0 0))')))) AS value",
                    'result' => [
                        'value' => 'POLYGON((0 0,0 1,1 1,1 0,0 0))',
                    ],
                ],
                [
                    'sql' => "SELECT ST_AsEWKT(ST_GeomFromWKB({function}(ST_GeomFromText('POLYGON((0 0,0 1,1 1,1 0,0 0))'), 'XDR'))) AS value",
                    'result' => [
                        'value' => 'POLYGON((0 0,0 1,1 1,1 0,0 0))',
                    ],
                ],
            ],
        ],
    ],
    'ST_AsEWKB' => [
        'required_arguments' => 1,
        'total_arguments' => 2,
        'tests' => [
            'queries' => [
                [
                    'sql' => "SELECT ST_AsEWKT(ST_GeomFromWKB({function}(ST_GeomFromText('POLYGON((0 0,0 1,1 1,1 0,0 0))',4326)))) AS value",
                    'result' => [
                        'value' => 'SRID=4326;POLYGON((0 0,0 1,1 1,1 0,0 0))',
                    ],
                ],
                [
                    'sql' => "SELECT ST_AsEWKT(ST_GeomFromWKB({function}(ST_GeomFromText('POLYGON((0 0,0 1,1 1,1 0,0 0))',4326), 'XDR'))) AS value",
                    'result' => [
                        'value' => 'SRID=4326;POLYGON((0 0,0 1,1 1,1 0,0 0))',
                    ],
                ],
            ],
        ],
    ],
    'ST_AsEWKT' => [
        'required_arguments' => 1,
        'total_arguments' => 1,
        'tests' => [
            'queries' => [
                [
                    'sql' => "SELECT {function}('0103000020E61000000100000005000000000000000000000000000000000000000000000000000000000000000000F03F000000000000F03F000000000000F03F000000000000F03F000000000000000000000000000000000000000000000000') AS value",
                    'result' => [
                        'value' => 'SRID=4326;POLYGON((0 0,0 1,1 1,1 0,0 0))',
                    ],
                ],
                [
                    'sql' => "SELECT {function}('0108000080030000000000000060E30A4100000000785C0241000000000000F03F0000000018E20A4100000000485F024100000000000000400000000018E20A4100000000305C02410000000000000840') AS value",
                    'result' => [
                        'value' => 'CIRCULARSTRING(220268 150415 1,220227 150505 2,220227 150406 3)',
                    ],
                ],
            ],
        ],
    ],
    'ST_AsGeoJSON' => [
        'required_arguments' => 1,
        'total_arguments' => 4,
        'tests' => [
            'queries' => [
                [
                    'sql' => "SELECT {function}('LINESTRING(1 2 3, 4 5 6)') AS value",
                    'result' => [
                        'value' => '{"type":"LineString","coordinates":[[1,2,3],[4,5,6]]}',
                    ],
                ],
                [
                    'sql' => "SELECT {function}(ST_GeomFromText('LINESTRING(1 2 3, 4 5 6)', 4326), 14, 2) AS value",
                    'result' => [
                        'value' => '{"type":"LineString","crs":{"type":"name","properties":{"name":"EPSG:4326"}},"coordinates":[[1,2,3],[4,5,6]]}',
                    ],
                ],
            ],
        ],
    ],
    'ST_AsGML' => [
        'required_arguments' => 1,
        'total_arguments' => 6,
        'tests' => [
            'queries' => [
                [
                    'sql' => "SELECT {function}(ST_GeomFromText('POLYGON((0 0,0 1,1 1,1 0,0 0))',4326)) AS value",
                    'result' => [
                        'value' => '<gml:Polygon srsName="EPSG:4326"><gml:outerBoundaryIs><gml:LinearRing><gml:coordinates>0,0 0,1 1,1 1,0 0,0</gml:coordinates></gml:LinearRing></gml:outerBoundaryIs></gml:Polygon>',
                    ],
                ],
                [
                    'sql' => "SELECT {function}(3, ST_GeomFromText('POINT(5.234234233242 6.34534534534)',4326), 5, 17, '') AS value",
                    'result' => [
                        'value' => '<Point srsName="urn:ogc:def:crs:EPSG::4326"><pos srsDimension="2">6.34535 5.23423</pos></Point>',
                    ],
                ],
            ],
        ],
    ],
    'ST_AsHEXEWKB' => [
        'required_arguments' => 1,
        'total_arguments' => 2,
        'tests' => [
            'queries' => [
                [
                    'sql' => "SELECT {function}(ST_GeomFromText('POLYGON((0 0,0 1,1 1,1 0,0 0))',4326)) AS value",
                    'result' => [
                        'value' => '0103000020E61000000100000005000000000000000000000000000000000000000000000000000000000000000000F03F000000000000F03F000000000000F03F000000000000F03F000000000000000000000000000000000000000000000000',
                    ],
                ],
                [
                    'sql' => "SELECT {function}(ST_GeomFromText('POLYGON((0 0,0 1,1 1,1 0,0 0))',4326), 'XDR') AS value",
                    'result' => [
                        'value' => '0020000003000010E600000001000000050000000000000000000000000000000000000000000000003FF00000000000003FF00000000000003FF00000000000003FF0000000000000000000000000000000000000000000000000000000000000',
                    ],
                ],
            ],
        ],
    ],
    'ST_AsSVG' => [
        'required_arguments' => 1,
        'total_arguments' => 3,
        'tests' => [
            'queries' => [
                [
                    'sql' => "SELECT {function}(ST_GeomFromText('POLYGON((0 0,0 1,1 1,1 0,0 0))',4326)) AS value",
                    'result' => [
                        'value' => 'M 0 0 L 0 -1 1 -1 1 0 Z',
                    ],
                ],
                [
                    'sql' => "SELECT {function}(ST_GeomFromText('SRID=4326;POINT(5.234234233242 6.34534534534)'), 1, 5) AS value",
                    'result' => [
                        'value' => 'x="5.23423" y="-6.34535"',
                    ],
                ],
            ],
        ],
    ],
    'ST_GeoHash' => [
        'required_arguments' => 1,
        'total_arguments' => 2,
        'tests' => [
            'queries' => [
                [
                    'sql' => "SELECT {function}(ST_GeomFromText('SRID=4326;POINT(-126 48)')) AS value",
                    'result' => [
                        'value' => 'c0w3hf1s70w3hf1s70w3',
                    ],
                ],
                [
                    'sql' => "SELECT {function}(ST_GeomFromText('SRID=4326;POINT(-126 48)'), 5) AS value",
                    'result' => [
                        'value' => 'c0w3h',
                    ],
                ],
            ],
        ],
    ],
    'ST_AsLatLonText' => [
        'required_arguments' => 1,
        'total_arguments' => 2,
        'tests' => [
            'queries' => [
                [
                    'sql' => "SELECT {function}('POINT (-3.2342342 -2.32498)') AS value",
                    'result' => [
                        'value' => '2°19\'29.928"S 3°14\'3.243"W',
                    ],
                ],
                [
                    'sql' => "SELECT {function}('POINT (-3.2342342 -2.32498)', 'D°M''S.SSS\"C') AS value",
                    'result' => [
                        'value' => '2°19\'29.928"S 3°14\'3.243"W',
                    ],
                ],
            ],
        ],
    ],
    'ST_AsText' => [
        'required_arguments' => 1,
        'total_arguments' => 1,
        'tests' => [
            'queries' => [
                [
                    'sql' => "SELECT {function}('01030000000100000005000000000000000000000000000000000000000000000000000000000000000000F03F000000000000F03F000000000000F03F000000000000F03F000000000000000000000000000000000000000000000000') AS value",
                    'result' => [
                        'value' => 'POLYGON((0 0,0 1,1 1,1 0,0 0))',
                    ],
                ],
            ],
        ],
    ],
];

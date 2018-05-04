<?php
return [
    'zf-versioning' => [
        'default_version' => 1,
        'uri' => [
            0 => 'son-basic.rest.categories',
        ],
    ],
    'router' => [
        'routes' => [
            'son-basic.rest.categories' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/categories[/:categories_id]',
                    'defaults' => [
                        'controller' => 'SONBasic\\V1\\Rest\\Categories\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-rest' => [
        'SONBasic\\V1\\Rest\\Categories\\Controller' => [
            'listener' => 'SONBasic\\V1\\Rest\\Categories\\CategoriesResource',
            'route_name' => 'son-basic.rest.categories',
            'route_identifier_name' => 'categories_id',
            'collection_name' => 'categories',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => '15',
            'entity_class' => \SONBasic\V1\Rest\Categories\CategoriesEntity::class,
            'collection_class' => \SONBasic\V1\Rest\Categories\CategoriesCollection::class,
            'service_name' => 'categories',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'SONBasic\\V1\\Rest\\Categories\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'SONBasic\\V1\\Rest\\Categories\\Controller' => [
                0 => 'application/vnd.son-basic.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'SONBasic\\V1\\Rest\\Categories\\Controller' => [
                0 => 'application/vnd.son-basic.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \SONBasic\V1\Rest\Categories\CategoriesEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'son-basic.rest.categories',
                'route_identifier_name' => 'categories_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \SONBasic\V1\Rest\Categories\CategoriesCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'son-basic.rest.categories',
                'route_identifier_name' => 'categories_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'db-connected' => [
            'SONBasic\\V1\\Rest\\Categories\\CategoriesResource' => [
                'adapter_name' => 'son_basic_adapter',
                'table_name' => 'categories',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'SONBasic\\V1\\Rest\\Categories\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'SONBasic\\V1\\Rest\\Categories\\CategoriesResource\\Table',
            ],
        ],
    ],
    'zf-content-validation' => [
        'SONBasic\\V1\\Rest\\Categories\\Controller' => [
            'input_filter' => 'SONBasic\\V1\\Rest\\Categories\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'SONBasic\\V1\\Rest\\Categories\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '255',
                        ],
                    ],
                    1 => [
                        'name' => \Zend\Validator\NotEmpty::class,
                        'options' => [],
                    ],
                ],
            ],
            1 => [
                'name' => 'description',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '255',
                            'min' => '5',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

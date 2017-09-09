<?php
use \App\GraphQL\Type\CategorieType;
use \App\GraphQL\Type\CommandeType;
use \App\GraphQL\Type\DetailsCommandeType;
use \App\GraphQL\Type\DetailsListeType;
use \App\GraphQL\Type\SurfaceType;
use \App\GraphQL\Type\ProduitType;
use \App\GraphQL\Type\UserType;
use \App\GraphQL\Type\ListeType;

use App\GraphQL\Query\ProduitQuery;
use App\GraphQL\Query\CategorieQuery;
use App\GraphQL\Query\SurfaceQuery;
use App\GraphQL\Query\CommandeQuery;
use App\GraphQL\Query\ListeQuery;
use App\GraphQL\Query\UserQuery;


return [

    'prefix' => 'graphql',

    'routes' => '{graphql_schema?}',

    'controllers' => \Folklore\GraphQL\GraphQLController::class.'@query',

    'variables_input_name' => 'variables',

    'middleware' => [],

    'headers' => [],

    'json_encoding_options' => 0,

    'graphiql' => [
        'routes' => '/graphiql/{graphql_schema?}',
        'controller' => \Folklore\GraphQL\GraphQLController::class.'@graphiql',
        'middleware' => [],
        'view' => 'graphql::graphiql'
    ],

    'schema' => 'default',

    'schemas' => [
        'default' => [
            'query' => [
                'produits' => ProduitQuery::class,
                'categories' => CategorieQuery::class,
                'surfaces' => SurfaceQuery::class,
                'listes' => ListeQuery::class,
                'commandes' => CommandeQuery::class,
                'users' => UserQuery::class,
            ],
            'mutation' => [

            ]
        ]
    ],

    'types' => [
        'categories' => CategorieType::class,
        'commandes' => CommandeType::class,
        'detailscommandes' => DetailsCommandeType::class,
        'detailslistes' => DetailsListeType::class,
        'produits' => ProduitType::class,
        'listes' => ListeType::class,
        'surfaces' => SurfaceType::class,
        'users' => UserType::class,
    ],

    'error_formatter' => [\Folklore\GraphQL\GraphQL::class, 'formatError'],

    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false
    ]
];

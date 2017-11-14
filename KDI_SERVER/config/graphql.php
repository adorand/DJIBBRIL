<?php

use \App\GraphQL\Type\ProduitType;
use \App\GraphQL\Type\SouscategorieType;
use \App\GraphQL\Type\CategorieType;
use \App\GraphQL\Type\SurfaceType;
use \App\GraphQL\Type\ClientType;
use \App\GraphQL\Type\DetailsCommandeType;
use \App\GraphQL\Type\CommandeType;
use \App\GraphQL\Type\DetailsListeType;
use \App\GraphQL\Type\ListeType;
use \App\GraphQL\Type\UserType;
use \App\GraphQL\Type\RoleType;

use App\GraphQL\Query\ProduitQuery;
use App\GraphQL\Query\SouscategorieQuery;
use App\GraphQL\Query\CategorieQuery;
use App\GraphQL\Query\SurfaceQuery;
use App\GraphQL\Query\ClientQuery;
use App\GraphQL\Query\DetailsCommandeQuery;
use App\GraphQL\Query\CommandeQuery;
use App\GraphQL\Query\DetailsListeQuery;
use App\GraphQL\Query\ListeQuery;
use App\GraphQL\Query\UserQuery;
use App\GraphQL\Query\RoleQuery;


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
        'middleware' => [ ],
        'view' => 'graphql::graphiql'
    ],

    'schema' => 'default',

    'schemas' => [
        'default' => [
            'query' => [
                'souscategories' => SouscategorieQuery::class,
                'categories' => CategorieQuery::class,
                'surfaces' => SurfaceQuery::class,
                'produits' => ProduitQuery::class,
                'clients' => ClientQuery::class,
                'detailscommandes' => DetailsCommandeQuery::class,
                'commandes' => CommandeQuery::class,
                'detailslistes' => DetailsListeQuery::class,
                'listes' => ListeQuery::class,
                'users' => UserQuery::class,
                'roles' => RoleQuery::class,
            ],
            'mutation' => [

            ]
        ]
    ],

    'types' => [
        'souscategories' => SouscategorieType::class,
        'categories' => CategorieType::class,
        'produits' => ProduitType::class,
        'surfaces' => SurfaceType::class,
        'clients' => ClientType::class,
        'detailscommandes' => DetailsCommandeType::class,
        'commandes' => CommandeType::class,
        'detailslistes' => DetailsListeType::class,
        'listes' => ListeType::class,
        'users' => UserType::class,
        'roles' => RoleType::class,
    ],

    'error_formatter' => [\Folklore\GraphQL\GraphQL::class, 'formatError'],

    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false
    ]
];

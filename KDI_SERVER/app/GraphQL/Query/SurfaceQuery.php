<?php

namespace App\GraphQL\Query;
use App\Surface;
use App\Outils;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class SurfaceQuery extends Query
{
    protected $attributes = [
        'name' => 'Surface query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('surfaces'));
    }

    public function args()
    {
        return [
            'code' => ['name' => 'code', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        $query=Surface::all();
        if (isset($args['code'])) {
            $query = Surface::where('code', $args['code'])->get();
        }

        return $query->map(function (Surface $surface)
        {
            return [
                'code'   => $surface->code,
                'nom'    => $surface->nom,
                'nom'    => $surface->nom,
                'image'  => $surface->image,
                'created_at'  => $surface->created_at->format(Outils::formatdate()),
                'updated_at'  => $surface->updated_at->format(Outils::formatdate()),
                'user'  => $surface->user
            ];
        });
    }
}
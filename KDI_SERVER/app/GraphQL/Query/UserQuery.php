<?php
/**
 * Created by PhpStorm.
 * User: cedric
 * Date: 06/09/17
 * Time: 05:47
 */

namespace App\GraphQL\Query;

use App\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'User query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('users'));
    }

    public function args()
    {
        return [
            'code' => ['name' => 'code', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        $query=User::with('commandes')->with('listes');
        if (isset($args['code'])) {
            $query = $query->where('code', $args['code']);
        }
        return $query->get()->map(function (User $user){
            return [
                'code' => $user->code,
                'username' => $user->username,
                'telephone' => $user->telephone,
                'email' => $user->email,
                'commandes' => $user->commandes,
                'listes' => $user->listes,
            ];
        });
    }
}
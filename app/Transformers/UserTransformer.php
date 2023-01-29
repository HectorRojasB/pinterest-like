<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            "id" => $user->id,
            "email" => $user->email,
            "role" => $user->getRolenames()->first(),
        ];
    }
}

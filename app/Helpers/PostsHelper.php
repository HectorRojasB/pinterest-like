<?php

namespace App\Helpers;

use League\Fractal\Scope;
use League\Fractal\Manager;
use App\Transformers\PostTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class PostsHelper
{
    private $fractal;

    function __construct(Manager $fractal)
    {
        $this->fractal = $fractal;
    }

    public function paginator($postResults): Scope
    {
        $posts = new Collection($postResults, new PostTransformer());
        $posts->setPaginator(new IlluminatePaginatorAdapter($postResults));

        return $this->fractal->createData($posts);
    }
}

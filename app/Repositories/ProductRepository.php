<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepository extends AbstractRepository
{

    /**
     * ProductRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getProducts(Request $request)
    {
        if ($request->get('conditions')) {
            $this->selectConditions($request->get('conditions'));
        }

        if ($request->get('fields')) {
            $this->selectFilter($request->get('fields'));
        }

        $products = $this->getResult()->paginate($request->get('per_page') ?? 10);
        return $products->withQueryString();
    }

}

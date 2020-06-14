<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductsCollection;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductsController constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Exibe a lista de produtos completa ou personalizada
     *
     * @param Request $request
     * @return ProductsCollection|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $products = $this->productRepository->getProducts($request);
            return new ProductsCollection($products);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Mostra os detalhes de um produto específico
     *
     * @param Product $product
     * @return ProductResource|\Illuminate\Http\JsonResponse
     */
    public function show(Product $product)
    {
        try {
            return new ProductResource($product);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}

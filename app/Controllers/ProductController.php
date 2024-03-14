<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        try {
            $productModel = new ProductModel();
            $products = $productModel->findAll();

            if (!$products) {
                return $this->respond(['message' => 'Products list is empty yet'], 404);
            }

            return $this->respond($products, 200);
        } catch (\Exception $e) {
            return $this->failServerError(500, $e->getMessage());
        }
    }

    public function show($id = null)
    {
        try {
            $productModel = new ProductModel();
            $product = $productModel->find($id);

            if (!$product) {
                return $this->respond(['message' => 'Product not found'], 404);
            }

            return $this->respond($product, 200);
        } catch (\Exception $e) {
            return $this->failServerError(500, $e->getMessage());
        }
    }

    public function create()
    {
        try {
            $productModel = new ProductModel();
            $data = $this->request->getJSON(true);
            $productModel->insert($data);

            return $this->respondCreated(['message' => 'Product created successfully']);
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }



    public function update($id = null)
    {
        try {
            $productModel = new ProductModel();
            if (!$productModel->find($id)) {
                return $this->respond(['message' => 'Product not found'], 404);
            }
            $data = $this->request->getJSON(true);
            $productModel->update($id, $data);

            return $this->respondUpdated(['message' => 'Product updated successfully']);
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }

    public function delete($id = null)
    {
        try {
            $productModel = new ProductModel();
            if (!$productModel->find($id)) {
                return $this->respond(['message' => 'Product not found'], 404);
            }
            $productModel->delete($id);

            return $this->respondDeleted(['message' => 'Product deleted successfully']);
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }
}

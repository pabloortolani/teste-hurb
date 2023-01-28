<?php

namespace App\Http\Controllers;

use App\Helpers\StatusReturn;
use App\Http\Requests\{CurrencyCreateRequest, CurrencyUpdateRequest};
use App\Services\CurrencyService;
use Exception;

class CurrencyController extends Controller
{
    public function __construct(private CurrencyService $service) {}

    public function create(CurrencyCreateRequest $request)
    {
        try {
            return response(
                array_merge(
                    ['data' => $this->service->create($request->all())],
                    ['status' => StatusReturn::CREATED]
                ),
                StatusReturn::CREATED
            );
        } catch (Exception $e) {
            return response($e->getMessage(), $e->getCode());
        }
    }

    public function update(CurrencyUpdateRequest $request, $id)
    {
        try {
            return response(
                array_merge(
                    ['data' => $this->service->update($request->all(), $id)],
                    ['status' => StatusReturn::SUCCESS]
                ),
                StatusReturn::SUCCESS
            );
        } catch (Exception $e) {
            return response($e->getMessage(), $e->getCode());
        }
    }

    public function delete($id)
    {
        try {
            return response(
                array_merge(
                    ['data' => $this->service->delete($id)],
                    ['status' => StatusReturn::SUCCESS]
                ),
                StatusReturn::SUCCESS
            );
        } catch (Exception $e) {
            return response($e->getMessage(), $e->getCode());
        }
    }
}

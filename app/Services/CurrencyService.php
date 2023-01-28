<?php

namespace App\Services;

use App\Helpers\StatusReturn;
use App\Interfaces\CurrencyRepositoryInterface;
use Exception;

class CurrencyService
{
    public function __construct(private CurrencyRepositoryInterface $currencyRepository) {}

    /**
     * @throws Exception
     */
    public function create(array $data): array
    {
        try {
            $data['automatic_currency_exchange'] = true;

            $currency = $this->currencyRepository->create($data);

            return [
                'id' => $currency->id,
                'name' => $currency->name,
                'symbol' => $currency->symbol,
                'value' => $currency->value
            ];
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), StatusReturn::ERROR);
        }
    }

    /**
     * @throws Exception
     */
    public function update(array $data, int $id): array
    {
        $currency = $this->currencyRepository->find($id);

        if (empty($currency)) {
            throw new Exception("Moeda não encontrada!", StatusReturn::NOT_FOUND);
        }

        $this->currencyRepository->update($currency, $data);

        $currency = $currency->refresh();

        return [
            'id' => $currency->id,
            'name' => $currency->name,
            'symbol' => $currency->symbol,
            'value' => $currency->value
        ];
    }

    /**
     * @throws Exception
     */
    public function delete(int $id): bool
    {
        $currency = $this->currencyRepository->find($id);

        if (empty($currency)) {
            throw new Exception("Moeda não encontrada!", StatusReturn::NOT_FOUND);
        }

        return $this->currencyRepository->delete($currency);
    }
}

<?php

namespace App\Repository;

use App\Interfaces\CurrencyRepositoryInterface;
use App\Models\Currency;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    public function __construct(private Currency $model) {}

    public function create(array $data): Currency
    {
        return $this->model->create([
            'name' => $data['name'],
            'symbol' => $data['symbol'],
            'value' => $data['value'],
            'automatic_currency_exchange' => (int)$data['automatic_currency_exchange']
        ]);
    }

    public function update(Currency $currency, array $data): bool
    {
        return $currency->update([
            'value' => $data['value']
        ]);
    }

    public function find(int $id): ?Currency
    {
        return $this->model->find($id);
    }

    public function delete(Currency $currency): bool
    {
        return $currency->delete();
    }
}

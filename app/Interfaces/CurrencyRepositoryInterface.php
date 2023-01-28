<?php

namespace App\Interfaces;

use App\Models\Currency;

interface CurrencyRepositoryInterface
{
    public function create(array $data): Currency;
    public function find(int $id): ?Currency;
    public function update(Currency $currency, array $data): bool;
    public function delete(Currency $currency): bool;
}

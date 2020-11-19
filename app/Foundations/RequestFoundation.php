<?php declare(strict_types=1);

namespace App\Foundations;

use Illuminate\Foundation\Http\FormRequest;

abstract class RequestFoundation extends FormRequest
{
    abstract public function rules(): array;

    protected final function getInt(string $key): ?int
    {
        return $this->input($key) ? (int)$this->input($key) : null;
    }

    protected final function getString(string $key): ?string
    {
        return $this->input($key) ? (string)$this->input($key) : null;
    }

    protected final function getArray(string $key): ?array
    {
        return $this->input($key) ? (array)$this->input($key) : null;
    }

    protected final function getBool(string $key): ?bool
    {
        return $this->input($key) ? (bool)$this->input($key) : null;
    }
}

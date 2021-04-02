<?php

namespace FileProcessor\Models;

class Product
{
    private string $city;
    private string $name;
    private int $units;
    private float $price;

    public function __construct(string $city, string $name, int $units, float $price)
    {
        $this->city = $city;
        $this->name = $name;
        $this->units = $units;
        $this->price = $price * 100;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUnits(): int
    {
        return $this->units;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
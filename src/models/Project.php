<?php

class Project
{
    private $title;
    private $model;
    private $description;
    private $millage;
    private $productionYear;
    private $fuel;
    private $price;
    private $image;

    public function __construct($title, $description,$model, $millage, $productionYear, $fuel, $price, $image)
    {
        $this->title = $title;
        $this->description = $description;
        $this->model = $model;
        $this->millage = $millage;
        $this->productionYear = $productionYear;
        $this->fuel = $fuel;
        $this->price = $price;
        $this->image = $image;
    }

    public function getModel():string
    {
        return $this->model;
    }

    public function setModel(string $model)
    {
        $this->model = $model;
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    public function setTitle(string $title)
    {
        $this->title = $title;
    }


    public function getDescription(): string
    {
        return $this->description;
    }


    public function setDescription(string $description)
    {
        $this->description = $description;
    }


    public function getMillage(): int
    {
        return $this->millage;
    }


    public function setMillage(int $millage)
    {
        $this->millage = $millage;
    }


    public function getProductionYear(): int
    {
        return $this->productionYear;
    }


    public function setProductionYear(int $productionYear)
    {
        $this->productionYear = $productionYear;
    }


    public function getFuel(): string
    {
        return $this->fuel;
    }


    public function setFuel(string $fuel)
    {
        $this->fuel = $fuel;
    }


    public function getPrice():float
    {
        return $this->price;
    }


    public function setPrice(float $price)
    {
        $this->price = $price;
    }


    public function getImage(): string
    {
        return $this->image;
    }


    public function setImage(string $image)
    {
        $this->image = $image;
    }



}
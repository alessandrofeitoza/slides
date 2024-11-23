<?php


abstract class Discount 
{
    abstract public function calculate(float $price): float;
}

class FixedDiscount extends Discount 
{
    public function __construct(
      private float $amount
    ) {
    }

    public function calculate(float $price): float 
    {
        return $price - $this->amount;
    }
}

class PercentageDiscount extends Discount 
{
    public function __construct(
        private float $percentage
    ) {
    }

    public function calculate(float $price): float
    {
        return $price - ($price * $this->percentage / 100);
    }
}




class DiscountCalculator
{
    public function applyDiscount(float $price, Discount $discount): float 
    {
        return $discount->calculate(price: $price);
    }
}

$calculator = new DiscountCalculator();

$fixedDiscount = new FixedDiscount(amount: 50);
echo $calculator->applyDiscount(price: 200, discount: $fixedDiscount).PHP_EOL; 
// Saída: 150

$percentageDiscount = new PercentageDiscount(percentage: 25);
echo $calculator->applyDiscount(price: 200, discount: $percentageDiscount).PHP_EOL; 
// Saída: 150


class StudentDiscount extends Discount 
{
    public function calculate(float $price): float
    {
        return $price - ($price * 0.5);
    }
}

$discount = new StudentDiscount();
echo (new DiscountCalculator())->applyDiscount(price: 200, discount: $discount).PHP_EOL; 
// Saída: 100

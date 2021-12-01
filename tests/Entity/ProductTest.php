<?php

namespace Tests\Entity;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

/**
 * @ORM\Entity(repositoryClass=ProductTestRepository::class)
 */
class ProductTest extends TestCase
{
    public function pricesForFoodProduct() {
        return [
            [0, 0.0],
            [20, 1.1],
            [100, 5.5]
        ];
    }
    
    /**
     * @dataProvider pricesForFoodProduct
     */
    public function testcomputeTVAFoodProduct($price, $expectedTva) {
        $product = new Product("Un produit", Product::FOOD_PRODUCT, $price);
        $this->assertSame($expectedTva, $product->computeTVA());
    }

    public function testComputeTVAOtherProduct() {
        $product = new Product("Un autre produit", "Un autre type de produit", 20);
        $this->assertSame(3.92, $product->computeTVA());
    }

    public function testNegativePriceComputeTVA() {
        $product = new Product("Un produit", Product::FOOD_PRODUCT, -20);
        $this->expectException("Exception");
        $this->expectExceptionMessage("The TVA cannot be negative.");
        $product->computeTVA();
    }
}

<?php
namespace Emipro\Customapi\Model;
use Emipro\Customapi\Api\Highlight;
use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Model\ProductRepository;
use Magento\Catalog\Api\Data\ProductInterfaceFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;
class Highlightadd implements Highlight
{
    protected $productFactory;
    protected $productIFactory;
    protected $productRepository;
    protected $productIRepository;
    protected $productName;
    public function __construct(
        ProductFactory $productFactory,
        ProductRepository $productRepository,
        ProductInterfaceFactory $productIFactory,
        ProductRepositoryInterface $productIRepository
    ) {
        $this->productFactory = $productFactory;
        $this->productRepository = $productRepository;
        $this->productIRepository = $productIRepository;
        $this->productIFactory = $productIFactory;
    }
    public function update($highlightData)
    {
        $ary_response = [];
        foreach ($highlightData as $value) {
            $productSku = $value->getSku();
            $productName = $value->getName();
            //for getting product details by sku
            $product = $this->productFactory->create();
            $productId = $product->getIdBySku($productSku);

            // $productI = $this->resolveProductId($productSku);
            if (!$productId) {
                $valid = [
                    "code" => "301",
                    "name" => $productName,
                    // "id" => $productId,
                    "sku" => $productSku,
                    "message" => "Product Saved.",
                    // "title" => $value->getTitle(),
                ];
                $this->DataSaved($valid);
                $ary_response[] = $valid;
            } else {
                $_product = $this->getProductById($productId);
                $productNamee = $_product->getName();
                $valid=[
                    "code" => "200",
                    "name" => $productNamee,
                    "id" => $productId,
                    "sku" => $productSku,
                    "message" => "Product Already Present."
                    // "title" => $value->getTitle(),
                ];
                $ary_response[] = $valid;
            }
        }
        return $ary_response;
    }

    public function getProductById($productId)
	{
		return $this->productRepository->getById($productId);
	}
    /**
     * @param string $productSku
     * @return int
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    // protected function resolveProductId($productSku)
    // {
    //     $product = $this->productFactory->create();
    //     $productId = $product->getIdBySku($productSku);
    //     if (!$productId) {
    //         $invalid = ["code" => '301', "message" => "SKU " . $productSku . " Not Found On Magento"];
    //         return $invalid;
    //     }
    //     return $productId;
    // }

    public function DataSaved($valid)
    {
        $productI = $this->productIFactory->create();
        $productI->setSku($valid['sku']);
        $productI->setName($valid['name']);
        $productI->setTypeId(\Magento\Catalog\Model\Product\Type::TYPE_SIMPLE);
        $productI->setVisibility(4);
        $productI->setPrice(1);
        $productI->setAttributeSetId(4); // Default attribute set for products
        $productI->setStatus(\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED);
// If desired, you can set a tax class like so:
        // $product->setCustomAttribute('tax_class_id', $taxClassId);

        $productI = $this->productIRepository->save($productI); 
    }
}
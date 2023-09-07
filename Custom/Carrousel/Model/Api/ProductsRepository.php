<?php

namespace Custom\Carrousel\Model\Api;

use Custom\Carrousel\Api\RequestItemInterface;
use Custom\Carrousel\Api\ResponseItemInterface;
use Custom\Carrousel\Api\ProductsRepositoryInterface;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\ResourceModel\Product\Action;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;

class ProductsRepository implements ProductsRepositoryInterface
{
    /**
     * [Description for __construct]
     *
     * @param Action $productAction
     * @param CollectionFactory $pcFactory
     * @param RequestItemInterfaceFactory $requestItemFactory
     * @param ResponseItemInterfaceFactory $responseItemFactory
     * @param StoreManagerInterface $storeManager
     * 
     */
    public function __construct(
        private Action $productAction,
        private CollectionFactory  $pcFactory,
        private RequestItemInterface $requestItemFactory,
        private ResponseItemInterface $responseItemFactory,
        private StoreManagerInterface $storeManager
    )
    {}
    
    /**
     * @inheritDoc
     *
     * @param int $id
     * 
     * @return ResponseInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getItem(int $id): mixed
    {
        $collection = $this->getProductCollection()
            ->addAttributeToFilter('entity_id', ['eq' => $id]);

        /** @var ProductInterface $product */
        $product = $collection->getFirstItem();

        if ( !$product->getId() ){
            throw new NoSuchEntityException(__('Product not found'));
        }

        return $this->getResponseItemFromProduct($product);
    }


    /**
     * @inheritdoc
     *
     * @param RequestItemInterface[] $products
     * 
     * @return void
     * 
     */
    public function setDescription(array $products):void
    {
        foreach ( $products as $product ){
            $this->setDescriptionForProduct(
                $product->getId(),
                $product->getDescription()
            );
        }
    }

    /**
     * [Description for getProductCollection]
     *
     * @return Collection
     * 
     */
    private function getProductCollection() : mixed
    {
        /** @var Collection $collection */
        $collection = $this->pcFactory->create();
        $collection->addAttributeToSelect(
            [
                'entity_id',
                ProductInterface::SKU,
                ProductInterface::NAME,
                'description'
            ],
            'left'
        );
        return $collection;
    }

    /**
     * [Description for getResponseItemFromProduct]
     *
     * @param ProductInterface $product
     * 
     * @return mixed
     * 
     */
    private function getResponseItemFromProduct(ProductInterface $product):mixed
    {
        /** @var ResponseItemInterface $responseItem */
        $responseItem = $this->responseItemFactory->create();

        $responseItem->setId($product->getId())
            ->setSku($product->getSku())
            ->setName($product->getName())
            ->setDescription("Some description");

        return $responseItem;
    }

    private function setDescriptionForProduct(int $id, string $description):void
    {
        $this->productAction
            ->updateAttributes(
                [$id],
                ['description' => $description],
                $this->storeManager->getStore()->getId()
            );
    }

}
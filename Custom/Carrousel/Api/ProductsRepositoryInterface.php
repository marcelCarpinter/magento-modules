<?php

namespace Custom\Carrousel\Api;

interface ProductsRepositoryInterface
{
    /**
     * [Description for getItem]
     *
     * @param int $id
     * 
     * @return ResponseInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getItem(int $id);


    /**
     * [Description for setDescription]
     *
     * @param RequestItemInterface[] $products
     * 
     * @return void
     * 
     */
    public function setDescription(array $products);
}
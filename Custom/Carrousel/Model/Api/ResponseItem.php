<?php

namespace Custom\Carrousel\Model\Api;

use Custom\Carrousel\Api\ResponseItemInterface;
use Magento\Framework\DataObject;

class ResponseItem extends DataObject implements ResponseItemInterface
{
    public function getId():int
    {
        return $this->_getData(self::DATA_ID);
    }

    public function getSku():string
    {
        return $this->_getData(self::DATA_SKU);
    }

    public function getName():string
    {
        return $this->_getData(self::DATA_NAME);
    }

    public function getDescription(): string
    {
        return $this->_getData(self::DATA_DESCRIPTION);
    }

    /**
     * [Description for setId]
     *
     * @param int $id
     * 
     * @return mixed
     * 
     */
    public function setId(int $id): mixed
    {
        return $this->setData(self::DATA_ID, $id);
    }

    /**
     * [Description for setSku]
     *
     * @param string $sku
     * 
     * @return mixed
     * 
     */
    public function setSku(string $sku): mixed
    {
        return $this->setData(self::DATA_SKU, $sku);
    }

    /**
     * [Description for setName]
     *
     * @param string $name
     * 
     * @return mixed
     * 
     */
    public function setName(string $name): mixed
    {
        return $this->setData(self::DATA_NAME, $name);
    }

    /**
     * [Description for setDescription]
     *
     * @param string $description
     * 
     * @return mixed
     * 
     */
    public function setDescription(string $description): mixed
    {
        return $this->setData(self::DATA_DESCRIPTION, $description);
    }
}
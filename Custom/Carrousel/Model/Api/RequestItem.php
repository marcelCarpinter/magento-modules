<?php

namespace Custom\Carrousel\Model\Api;

use Custom\Carrousel\Api\RequestItemInterface;
use Magento\Framework\DataObject;

class RequestItem extends DataObject implements RequestItemInterface
{
    public function getId():int
    {
        return $this->_getData(self::DATA_ID);
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
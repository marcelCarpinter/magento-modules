<?php

namespace Custom\Carrousel\Api;

interface ResponseItemInterface
{
    const DATA_ID = 'id';
    const DATA_SKU = 'sku';
    const DATA_NAME = 'name';
    const DATA_DESCRIPTION = 'description';

    /**
     * [Description for getId]
     *
     * @return int
     * 
     */
    public function getId(): int;

    /**
     * [Description for getSku]
     *
     * @return string
     * 
     */
    public function getSku(): string;

    /**
     * [Description for getName]
     *
     * @return string
     * 
     */
    public function getName(): string;

    /**
     * [Description for getDescription]
     *
     * @return string
     * 
     */
    public function getDescription():string;

    /**
     * [Description for setId]
     *
     * @param int $id
     * 
     * @return $this
     * 
     */
    public function setId(int $id);

    /**
     * [Description for setSku]
     *
     * @param string $sku
     * 
     * @return [type]
     * 
     */
    public function setSku(string $sku);

    /**
     * [Description for setName]
     *
     * @param string $name
     * 
     * @return [type]
     * 
     */
    public function setName(string $name);

    /**
     * [Description for setDescription]
     *
     * @param string $description
     * 
     * @return $this
     * 
     */
    public function setDescription(string $description);
}
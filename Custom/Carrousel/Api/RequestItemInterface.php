<?php

namespace Custom\Carrousel\Api;

interface RequestItemInterface
{
    const DATA_ID = 'id';
    const DATA_DESCRIPTION = 'description';

    /**
     * [Description for getId]
     *
     * @return int
     * 
     */
    public function getId(): int;

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
     * [Description for setDescription]
     *
     * @param string $description
     * 
     * @return $this
     * 
     */
    public function setDescription(string $description);
}
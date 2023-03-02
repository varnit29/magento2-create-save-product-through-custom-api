<?php
namespace Emipro\Customapi\Api\Data;
interface Highlight
{
    const SKU = 'sku';
    const TITLE = 'title';
    const NAME = 'name';
    /**
     * Gets the sku.
     *
     * @api
     * @return string
     */
    public function setSku($sku);
    /**
     * Gets the sku.
     *
     * @api
     * @return string
     */
    public function getSku();
    /**
     * Gets the title.
     *
     * @api
     * @return string
     */
    public function setTitle($title);
    /**
     * Gets the title.
     *
     * @api
     * @return string
     */
    public function getTitle();
    /**
     * Gets the sku.
     *
     * @api
     * @return string
     */
    public function setName($name);
    /**
     * Gets the sku.
     *
     * @api
     * @return string
     */
    public function getName();
}
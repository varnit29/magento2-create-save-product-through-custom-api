<?php
namespace Emipro\Customapi\Model;
class Highlightdata implements \Emipro\Customapi\Api\Data\Highlight
{
    protected $sku;
    protected $title;
    protected $name;

    /**
     * Gets the sku.
     *
     * @api
     * @return string
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }
    /**
     * Gets the sku.
     *
     * @api
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }
    /**
     * Gets the title.
     *
     * @api
     * @return string
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    /**
     * Gets the title.
     *
     * @api
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Gets the name.
     *
     * @api
     * @return string
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * Gets the name.
     *
     * @api
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
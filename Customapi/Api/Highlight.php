<?php
namespace Emipro\Customapi\Api;
interface Highlight
{
    /**
     * @api
     * @param \Emipro\Customapi\Api\Data\Highlight[] $highlightData
     * @return array
     */
    public function update($highlightData);
}
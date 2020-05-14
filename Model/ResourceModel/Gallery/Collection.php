<?php

namespace Magestar\HomePageGallery\Model\ResourceModel\Gallery;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'image_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init(
            'Magestar\HomePageGallery\Model\Gallery',
            'Magestar\HomePageGallery\Model\ResourceModel\Gallery'
        );
    }
}

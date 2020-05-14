<?php

namespace Magestar\HomePageGallery\Block;

class Gallery extends \Magento\Framework\View\Element\Template
{


    /**
     * @var \Magestar\Banner\Model\ResourceModel\Slide\CollectionFactory
     */
    private $galleryCollectionFactory;

    /**
     * @var \Magestar\Banner\Helper\Data
     */
    protected $_helperData;

    /**
     * Bannerslider constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magestar\Banner\Model\ResourceModel\Slide\CollectionFactory $galleryCollectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magestar\HomePageGallery\Model\ResourceModel\Gallery\CollectionFactory $galleryCollectionFactory,
        \Magestar\HomePageGallery\Helper\Data $helperData,
        array $data = []
    )
    {
        parent::__construct($context, $data);

        $this->_helperData = $helperData;
        $this->galleryCollectionFactory = $galleryCollectionFactory;
    }

    protected function _construct()
    {
        parent::_construct();

        $this->_coreHelper = $this->_helperData;

    }

    public function getHelperData()
    {
        return $this->_helperData;
    }

    /**
     * @param $image Image media URl
     * @return string Full image URL
     */
    public function getMediaUrl($image)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $mediaUrl = $objectManager->get('Magento\Store\Model\StoreManagerInterface')
            ->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $mediaUrl . $image;
    }

    /**
     * @return \Magestar\Banner\Model\ResourceModel\Slide\Collection
     */
    public function getGalleryImages($row = 1)
    {
        /* @var $galleryCollection \Magestar\HomePageGallery\Model\ResourceModel\Gallery\Collection */
        $galleryCollection = $this->galleryCollectionFactory->create();
        $galleryCollection->addFieldToFilter('is_active', \Magestar\HomePageGallery\Model\Source\Status::STATUS_ENABLED)
            ->addFieldToFilter('row_number', $row);
        $galleryCollection->addOrder('sort_order', 'ASC');
        return $galleryCollection;
    }

}

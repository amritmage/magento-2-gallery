<?php

namespace Magestar\HomePageGallery\Model;

use Magestar\HomePageGallery\Api\Data\GalleryInterface;

class Gallery extends \Magento\Framework\Model\AbstractModel implements GalleryInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'magestar_homepagegallery';

    /**
     * @var string
     */
    protected $_cacheTag = 'magestar_homepagegallery';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'magestar_homepagegallery';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Magestar\HomePageGallery\Model\ResourceModel\Gallery');
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getImageId()
    {
        return $this->getData(self::IMAGE_ID);
    }

    /**
     * Set EntityId.
     */
    public function setImageId($imageId)
    {
        return $this->setData(self::IMAGE_ID, $imageId);
    }

    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Set Title.
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Get getSlideImageDesktop.
     *
     * @return varchar
     */
    public function getImageDesktop()
    {
        return $this->getData(self::IMAGE_DESKTOP);
    }

    /**
     * Set setSlideImageDesktop.
     */
    public function setImageDesktop($image_desktop)
    {
        return $this->setData(self::IMAGE_DESKTOP, $image_desktop);
    }

    /**
     * Get slide_image_tablet.
     *
     * @return varchar
     */
    public function getImageTablet()
    {
        return $this->getData(self::IMAGE_TABLET);
    }

    /**
     * Set slide_image_tablet.
     */
    public function setImageTablet($image_tablet)
    {
        return $this->setData(self::IMAGE_TABLET, $image_tablet);
    }

    /**
     * Get slide_image_tablet.
     *
     * @return varchar
     */
    public function getImageMobile()
    {
        return $this->getData(self::IMAGE_MOBILE);
    }

    /**
     * Set slide_image_tablet.
     */
    public function setImageMobile($image_mobile)
    {
        return $this->setData(self::IMAGE_MOBILE, $image_mobile);
    }

    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * Set IsActive.
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}

<?php

namespace Magestar\HomePageGallery\Api\Data;

interface GalleryInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const IMAGE_ID      = 'image_id';
    const TITLE         = 'title';
    const IMAGE_DESKTOP = 'image_desktop';
    const IMAGE_TABLET  = 'image_tablet';
    const IMAGE_MOBILE  = 'image_mobile';
    const IMAGE_RETINA  = 'image_retina';
    const IS_ACTIVE     = 'is_active';
    const UPDATE_TIME   = 'update_time';
    const CREATED_AT    = 'created_at';

   /**
    * Get EntityId.
    *
    * @return int
    */
    public function getImageId();

   /**
    * Set EntityId.
    */
    public function setImageId($imageId);

   /**
    * Get Title.
    *
    * @return varchar
    */
    public function getTitle();

   /**
    * Set Title.
    */
    public function setTitle($title);

    /**
     * Get image_desktop.
     *
     * @return varchar
     */
    public function getImageDesktop();

    /**
     * Set image_desktop.
     */
    public function setImageDesktop($image_desktop);

    /**
     * Get image_tablet.
     *
     * @return varchar
     */
    public function getImageTablet();

    /**
     * Set image_tablet.
     */
    public function setImageTablet($image_tablet);

    /**
     * Get image_mobile.
     *
     * @return varchar
     */
    public function getImageMobile();

    /**
     * Set slide_image_mobile.
     */
    public function setImageMobile($image_mobile);

   /**
    * Get IsActive.
    *
    * @return varchar
    */
    public function getIsActive();

   /**
    * Set StartingPrice.
    */
    public function setIsActive($isActive);

   /**
    * Get UpdateTime.
    *
    * @return varchar
    */
    public function getUpdateTime();

   /**
    * Set UpdateTime.
    */
    public function setUpdateTime($updateTime);

   /**
    * Get CreatedAt.
    *
    * @return varchar
    */
    public function getCreatedAt();

   /**
    * Set CreatedAt.
    */
    public function setCreatedAt($createdAt);
}

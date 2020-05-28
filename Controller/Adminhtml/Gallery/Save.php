<?php

namespace Magestar\HomePageGallery\Controller\Adminhtml\Gallery;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Magestar\Banner\Model\GridFactory
     */
    var $galleryFactory;

    /**
    * @var \Magento\Framework\Image\AdapterFactory
    */
    protected $adapterFactory;
    /**
    * @var \Magento\MediaStorage\Model\File\UploaderFactory
    */
    protected $uploader;
    /**
    * @var \Magento\Framework\Filesystem
    */
    protected $filesystem;
    /**
    * @var \Magento\Framework\Stdlib\DateTime\TimezoneInterface
    */
    protected $timezoneInterface;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magestar\Banner\Model\GridFactory $slideFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magestar\HomePageGallery\Model\GalleryFactory $galleryFactory,
        \Magento\Framework\Image\AdapterFactory $adapterFactory,
        \Magento\MediaStorage\Model\File\UploaderFactory $uploader,
        \Magento\Framework\Filesystem $filesystem
    ) {
        parent::__construct($context);
        $this->galleryFactory = $galleryFactory;
        $this->adapterFactory = $adapterFactory;
        $this->uploader = $uploader;
        $this->filesystem = $filesystem;
    }


    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('magestar_homepagegallery/gallery/addimage');
            return;
        }
        try {

            //start block upload slide_image_desktop
            if (isset($_FILES['image_desktop'])
            && isset($_FILES['image_desktop']['name'])
            && strlen($_FILES['image_desktop']['name'])) {
                /*
                 * Save slide_image_desktop upload
                 */
                try {
                    $base_media_path = 'magestar/gallery';
                    $uploader = $this->uploader->create(['fileId' => 'image_desktop']);
                    $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                    $imageAdapter = $this->adapterFactory->create();
                    $uploader->addValidateCallback('image_desktop', $imageAdapter, 'validateUploadFile');
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(true);
                    $mediaDirectory = $this->filesystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
                    $result = $uploader->save($mediaDirectory->getAbsolutePath($base_media_path));
                    $data['image_desktop'] = $base_media_path.$result['file'];
                } catch (\Exception $e) {
                    if ($e->getCode() == 0) {
                        $this->messageManager->addError($e->getMessage());
                    }
                }
			} else {
                if (isset($data['image_desktop']) && isset($data['image_desktop']['value'])) {
                    if (isset($data['image_desktop']['delete'])) {
                        $data['image_desktop'] = null;
                        $data['delete_image'] = true;
                    } elseif (isset($data['image_desktop']['value'])) {
                        $data['image_desktop'] = $data['image_desktop']['value'];
                    } else {
                        $data['image_desktop'] = null;
                    }
                }
            }

            //start block upload image
            if (isset($_FILES['image_tablet']) && isset($_FILES['image_tablet']['name']) && strlen($_FILES['image_tablet']['name'])) {
                /*
                 * Save image upload
                 */
                try {
                    $base_media_path = 'magestar/gallery';
                    $uploader = $this->uploader->create(['fileId' => 'image_tablet']);
                    $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                    $imageAdapter = $this->adapterFactory->create();
                    $uploader->addValidateCallback('image_tablet', $imageAdapter, 'validateUploadFile');
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(true);
                    $mediaDirectory = $this->filesystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
                    $result = $uploader->save($mediaDirectory->getAbsolutePath($base_media_path));
                    $data['image_tablet'] = $base_media_path . $result['file'];
                } catch (\Exception $e) {
                    if ($e->getCode() == 0) {
                        $this->messageManager->addError($e->getMessage());
                    }
                }
            } else {
                if (isset($data['image_tablet']) && isset($data['image_tablet']['value'])) {
                    if (isset($data['image_tablet']['delete'])) {
                        $data['image_tablet'] = null;
                        $data['delete_image'] = true;
                    } elseif (isset($data['image_tablet']['value'])) {
                        $data['image_tablet'] = $data['image_tablet']['value'];
                    } else {
                        $data['image_tablet'] = null;
                    }
                }
            }

            //start block upload image
            if (isset($_FILES['image_mobile']) && isset($_FILES['image_mobile']['name']) && strlen($_FILES['image_mobile']['name'])) {
                /*
                 * Save image upload
                 */
                try {
                    $base_media_path = 'magestar/gallery';
                    $uploader = $this->uploader->create(['fileId' => 'image_mobile']);
                    $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                    $imageAdapter = $this->adapterFactory->create();
                    $uploader->addValidateCallback('image_mobile', $imageAdapter, 'validateUploadFile');
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(true);
                    $mediaDirectory = $this->filesystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
                    $result = $uploader->save($mediaDirectory->getAbsolutePath($base_media_path));
                    $data['image_mobile'] = $base_media_path . $result['file'];
                } catch (\Exception $e) {
                    if ($e->getCode() == 0) {
                        $this->messageManager->addError($e->getMessage());
                    }
                }
            } else {
                if (isset($data['image_mobile']) && isset($data['image_mobile']['value'])) {
                    if (isset($data['image_mobile']['delete'])) {
                        $data['image_mobile'] = null;
                        $data['delete_image'] = true;
                    } elseif (isset($data['image_mobile']['value'])) {
                        $data['image_mobile'] = $data['image_mobile']['value'];
                    } else {
                        $data['image_mobile'] = null;
                    }
                }
            }


            $rowData = $this->galleryFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setImageId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Gallery data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('magestar_homepagegallery/gallery/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magestar_HomePageGallery::save');
    }
}

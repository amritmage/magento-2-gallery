<?php

namespace Magestar\HomePageGallery\Controller\Adminhtml\Gallery;

use Magento\Framework\Controller\ResultFactory;

class AddImage extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;

    /**
     * @var \Magestar\HomePageGallery\Model\GridFactory
     */
    private $slideFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry,
     * @param \Magestar\HomePageGallery\Model\GridFactory $gridFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magestar\HomePageGallery\Model\GalleryFactory $galleryFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->galleryFactory = $galleryFactory;
    }

    /**
     * Mapped Grid List page.
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $rowId = (int) $this->getRequest()->getParam('id');
        $rowData = $this->galleryFactory->create();
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        if ($rowId) {
            $rowData = $rowData->load($rowId);
            $rowTitle = $rowData->getTitle();
            if (!$rowData->getImageId()) {
                $this->messageManager->addError(__('gallery data no longer exist.'));
                $this->_redirect('Magestar_homepagegallery/gallery/index');
                return;
            }
        }

        $this->coreRegistry->register('row_data', $rowData);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit Image: ').$rowTitle : __('Add Image');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magestar_HomePageGallery::add_slide');
    }
}

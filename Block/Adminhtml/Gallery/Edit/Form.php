<?php

namespace Magestar\HomePageGallery\Block\Adminhtml\Gallery\Edit;

/**
 * Adminhtml Add New Row Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context,
     * @param \Magento\Framework\Registry $registry,
     * @param \Magento\Framework\Data\FormFactory $formFactory,
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
     * @param \Magestar\Banner\Model\Status $options,
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Magestar\HomePageGallery\Model\Source\Status $options,
        \Magestar\HomePageGallery\Model\Source\Effects $effectOptions,
        \Magestar\HomePageGallery\Model\Source\RowNumbers $rowOptions,
        array $data = []
    ) {
        $this->_options = $options;
        $this->_effectOptions = $effectOptions;
        $this->_rowOptions = $rowOptions;
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form',
                            'enctype' => 'multipart/form-data',
                            'action' => $this->getData('action'),
                            'method' => 'post'
                        ]
            ]
        );

        $form->setHtmlIdPrefix('Magestar_');
        if ($model->getImageId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Image'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('image_id', 'hidden', ['name' => 'image_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Gallery Data'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'is_active',
            'select',
            [
                'name' => 'is_active',
                'label' => __('Status'),
                'id' => 'is_active',
                'title' => __('Status'),
                'values' => $this->_options->getOptionArray(),
                'class' => 'status',
                'required' => false,
            ]
        );

        $fieldset->addField(
            'title',
            'text',
            [
                'name' => 'title',
                'label' => __('Title'),
                'id' => 'title',
                'title' => __('Title'),
                'class' => 'required-entry',
                'required' => true
            ]
        );

        $fieldset->addField(
            'link',
            'text',
            [
                'name' => 'link',
                'label' => __('Link'),
                'id' => 'link',
                'title' => __('Link'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'row_number',
            'select',
            [
                'name' => 'row_number',
                'label' => __('Row Number'),
                'id' => 'row_number',
                'title' => __('Row Number'),
                'values' => $this->_rowOptions->getOptionArray(),
                'required' => false,
            ]
        );


        $fieldset->addField(
            'class',
            'text',
            [
                'name' => 'class',
                'label' => __('Class'),
                'id' => __('class'),
                'title' => __('Class'),
                'required' => false
            ]
        );

        $fieldset->addField(
            'sort_order',
            'text',
            [
                'name' => 'sort_order',
                'label' => __('Sort Order'),
                'id' => __('sort_order'),
                'title' => __('Sort Order'),
                'required' => false
            ]
        );

        $fieldset->addField(
            'effect',
            'select',
            [
                'name' => 'effect',
                'label' => __('Choose Effect'),
                'id' => 'effect',
                'title' => __('Choose Effect'),
                'values' => $this->_effectOptions->getOptionArray(),
                'required' => false
            ]
        );

        $fieldset->addField(
            'image_desktop',
            'image',
            [
                'name' => 'image_desktop',
                'label' => __('Upload Desktop Image'),
                'id' => __('image_desktop'),
                'title' => __('Upload Desktop Image'),
                'required' => true,
                'class' => 'admin__control-image',
                'note' => __('Size: 164px x 24px, Allowed File Types : (JPG,JPEG,PNG),
                Preferred Image Type : Use Progressive JPEG Image.
                Note: Upload Optimised Image (Use online tool - https://tinyjpg.com/)')
            ]
        );

        $fieldset->addField(
            'image_tablet',
            'image',
            [
                'name' => 'image_tablet',
                'label' => __('Upload Tablet Image'),
                'id' => __('image_tablet'),
                'title' => __('Upload Tablet Image'),
                'required' => false,
                'class' => 'admin__control-image',
                'note' => __('Size: 164px x 24px, Allowed File Types : (JPG,JPEG,PNG),
                Preferred Image Type : Use Progressive JPEG Image.
                Note: Upload Optimised Image (Use online tool - https://tinyjpg.com/)')
            ]
        );

        $fieldset->addField(
            'image_mobile',
            'image',
            [
                'name' => 'image_mobile',
                'label' => __('Upload Mobile Image'),
                'id' => __('image_mobile'),
                'title' => __('Upload Mobile Image'),
                'required' => false,
                'class' => 'admin__control-image',
                'note' => __('Size: 164px x 24px, Allowed File Types : (JPG,JPEG,PNG),
                Preferred Image Type : Use Progressive JPEG Image.
                Note: Upload Optimised Image (Use online tool - https://tinyjpg.com/)')
            ]
        );


        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}

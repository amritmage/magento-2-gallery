<?php

namespace Magestar\HomePageGallery\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Effects implements OptionSourceInterface
{
    /**
     * Get Grid row status type labels array.
     * @return array
     */
    public function getOptionArray()
    {
        $options = [
            '' => __('No Effect'),
            'ban-effect-1' => __('Zoom in'),
            'ban-effect-2' => __('Zoom out'),
            'ban-effect-3' => __('Rotate'),
            'ban-effect-fade-out' => __('Fade out'),
            'ban-effect-blur-in' => __('Blur in'),
            'ban-effect-blur-out' => __('Blur out'),
            'ban-effect-grayscale-in' => __('Grayscale in'),
            'ban-effect-grayscale-out' => __('Grayscale out')
        ];
        return $options;
    }

    /**
     * Get Grid row status labels array with empty value for option element.
     *
     * @return array
     */
    public function getAllOptions()
    {
        $res = $this->getOptions();
        array_unshift($res, ['value' => '', 'label' => '']);
        return $res;
    }

    /**
     * Get Grid row type array for option element.
     * @return array
     */
    public function getOptions()
    {
        $res = [];
        foreach ($this->getOptionArray() as $index => $value) {
            $res[] = ['value' => $index, 'label' => $value];
        }
        return $res;
    }

    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        return $this->getOptions();
    }
}

<?php
/**
 * Ds Instagram Feed plugin for Craft CMS 3.x
 *
 * Ds Instagram Feed
 *
 * @link      https://www.dotsquares.com/
 * @copyright Copyright (c) 2021 Dotsquares
 */

namespace ds\instagramfeed\resources;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * Ds Instagram Feed AssetBundle
 *
 * AssetBundle represents a collection of asset files, such as CSS, JS, images.
 *

 */

class InstagramAsset extends AssetBundle
{
    
    // Public Methods
    // =========================================================================

    /**
     * Initializes the bundle.
     */

    public function init()
    {
        // define the path that your publishable resources live
        $this->sourcePath = '@ds/instagramfeed/resources/css';

        // define the dependencies
        $this->depends = [
            CpAsset::class,
        ];

        // define the relative path to CSS files that should be registered with the page

        $this->css = [
            'custom.css',
        ];

        parent::init();
    }
}
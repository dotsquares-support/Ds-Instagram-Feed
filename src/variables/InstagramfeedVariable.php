<?php

/**
 * Ds Instagram Feed plugin for Craft CMS 3.x
 *
 * Ds Instagram Feed
 *
 * @link      https://www.dotsquares.com/
 * @copyright Copyright (c) 2021 Dotsquares
 */

namespace ds\instagramfeed\variables;

use ds\instagramfeed\Feedplugin;


use Craft;

class InstagramfeedVariable

{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.instagramfeed.getFeed() }}
     *  */

    public function getFeed()
    {
        return Feedplugin::getInstance()->FeedService->instafeed();
    }

}

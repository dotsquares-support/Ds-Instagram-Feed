<?php

/**
 * Ds Instagram Feed plugin for Craft CMS 3.x
 *
 * Ds Instagram Feed
 *
 * @link      https://www.dotsquares.com/
 * @copyright Copyright (c) 2021 Dotsquares
 */

namespace ds\instagramfeed;

use craft\base\Plugin;
use craft\services\Plugins;

use ds\instagramfeed\models\Settings;
use ds\instagramfeed\services\Feedservice;
use craft\web\twig\variables\CraftVariable;
use ds\instagramfeed\variables\instagramfeed;
use yii\base\Event;


class Feedplugin extends Plugin {
    public $hasCpSettings = true;
	public static $plugin;

    // Public Methods
    // =========================================================================
	public function init()
    {
        parent::init();
        self::$plugin = $this;
        $this->setComponents([
            'FeedService' =>  services\FeedService::class,
        ]);
        
        // Register our variables
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('dsinstagramfeed', variables\InstagramfeedVariable::class);
            }
        );
    }    
    // Protected Methods
    // =========================================================================
    
    protected function createSettingsModel()
    {
        return new Settings();
    }

   
        // Get the settings that are being defined by template

    protected function settingsHtml()
    {
        return \Craft::$app->getView()->renderTemplate(
            'dsinstagramfeed/settings',
            [ 'settings' => $this->getSettings() ]
        );
    } 
    
}    
	


<?php

/**
 * Ds Instagram Feed plugin for Craft CMS 3.x
 *
 * Ds Instagram Feed
 *
 * @link      https://www.dotsquares.com/
 * @copyright Copyright (c) 2021 Dotsquares
 */


namespace ds\instagramfeed\models;
use ds\instagramfeed\Feedplugin;


use Craft;
use craft\base\Model;

/**
 * Ds Instagram Feedl Model
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 
 */

class Settings extends Model
{
   // Public Properties
    // =========================================================================

    public $instagramUser = '';
    public $instagramfeedtitle= '';

    // Returns the validation rules for attributes.

    public function rules()
    {
        return [
            [['instagramUser'], 'required'],
           
        ];
    }

    public function getAccount()
    {
        return Craft::parseEnv(trim(Feedplugin::getInstance()->getSettings()->instagramUser));
    }
    public function gettitle()
    {
        return Craft::parseEnv(trim(Feedplugin::getInstance()->getSettings()->instagramfeedtitle));
    }
}
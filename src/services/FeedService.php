<?php

/**
 * Ds Instagram Feed plugin for Craft CMS 3.x
 *
 * Ds Instagram Feed
 *
 * @link      https://www.dotsquares.com/
 * @copyright Copyright (c) 2021 Dotsquares
 */

namespace ds\instagramfeed\services;
use Craft;
use craft\base\Component;
use ds\instagramfeed\Feedplugin;
use ds\instagramfeed\resources\InstagramAsset;

/**
 * Ds Instagram Feed Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Dotsquares
 */

class FeedService extends  Component

{
    // Public Methods
    // =========================================================================
   
    public function instafeed($accountOrTag= null, $gettitle= null){
    
        // Fetch the Access token 
        $settings = Feedplugin::getInstance()->getSettings();

        //Register Asset Bundle
      $view = Craft::$app->getView();
      $view->registerAssetBundle(InstagramAsset::class);
        

        if ($accountOrTag === null) {
            $accountOrTag = $settings->getAccount();
            if (empty($accountOrTag)) {
                Craft::warning('No Access Token configured.', __METHOD__);

                return [];
            }
        }
Craft::debug('Get feed for "' . $accountOrTag . '"', __METHOD__);

/**
     * Fetches the feed from the public Instagram Accountthrough Access token
     *
 */

$fields = "id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,username";
$limit = 10;
$counter = 1;

$json_feed_url="https://graph.instagram.com/me/media?fields={$fields}&access_token={$accountOrTag}&limit={$limit}";
$json_feed = @file_get_contents($json_feed_url);
$contents = json_decode($json_feed, true, 512, JSON_BIGINT_AS_STRING);
if (!empty($contents)){
echo "<div class='ig_feed_container'>";

// Fetch Instagram Feed Title

if ($gettitle === null) {
    $gettitle = $settings->gettitle();
    if (empty($gettitle)) {
       echo "<h4> Instagram Feed </h4>";

        return [];
    }
}
echo "<h4>
 $gettitle  
</h4>";
    foreach($contents as $post){
         

foreach($post as $posts){
  
        $username = isset($posts["username"]) ? $posts["username"] : "";
        $caption = isset($posts["caption"]) ? $posts["caption"] : "";
        $media_url = isset($posts["media_url"]) ? $posts["media_url"] : "";
        $permalink = isset($posts["permalink"]) ? $posts["permalink"] : "";
        $media_type = isset($posts["media_type"]) ? $posts["media_type"] : "";
        if ($counter <=10){

         
        echo "
            <div class='ig_post_container'>
                <div>";
 
                    if($media_type=="VIDEO"){
                        echo "<video controls style='width:100%; display: block !important;'>
                            <source src='{$media_url}' type='video/mp4'>
                            Your browser does not support the video tag.
                        </video>";
                    }
 
                    else{
                        echo "  <a href='{$permalink}' target='_blank'><img src='{$media_url}' /></a>";
                    }
                 
                echo "</div>
                <div class='ig_post_details'>
                  
                    <div class='ig_view_link'>
                        <a href='{$permalink}' target='_blank'>View on Instagram</a>
                    </div>
                </div>
            </div>
        ";
$counter++;
    }
}
echo "</div>";

}
}
else{ echo "<h4> Inavlid Access Token </h4>" ;}
 

    }
}
  
     


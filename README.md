<img src="src/icon.svg" alt="icon" width="100" height="100">

# InstaFeed plugin for Craft CMS 3

Easily add your Instagram feed on your website with the help of advanced  InstaFeed Plugin. Showcase your Instagram posts and make yourself visible to your website visitors. Easy to install and activate. 

## Installation

#### Requirements

This plugin requires Craft CMS 3.0.0, or later.

#### Plugin Store

Log into your control panel and click on 'Plugin Store'. Search for 'InstaFeed'.

#### Composer

1. Open your terminal and go to your Craft project:

```bash
cd /path/to/project
```

2. Then tell Composer to load the plugin:

```bash
composer require ds/craft-instagramfeed
```

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for InstaFeed.

#### Examples

```twig
 {{ craft.instagramfeed.getFeed() }}
```

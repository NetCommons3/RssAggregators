<?php

/**
 * 新着表示view
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @author Wataru Nishimoto <watura@willbooster.com>
 * @author Kazunori Sakamoto <exkazuu@willbooster.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */



$base = <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
</rss>
EOT;

$xml = new SimpleXMLElement($base);
$xml->addChild('channel');
$xml->channel->addChild('title', '新着情報');
$xml->channel->addChild('description', '新着情報をお知らせします。');
$xml->channel->addChild('link', $this->NetCommonsHtml->url(['action' => 'index'], true));

foreach ($rssAggregatorItems as $topic) {
	$item = $xml->channel->addChild('item');
	$item->addChild('title', $topic["RssAggregatorsItem"]["title"]);
	$item->addChild('link', $topic["RssAggregatorsItem"]["url"]);
	$item->addChild('author', $topic["RssAggregatorsFeed"]["school"]);
	$item->addChild('description', $topic["RssAggregatorsItem"]["summary"]);
	$item->addChild('pubDate', $topic["RssAggregatorsItem"]["publish_start"]);
	$item->addChild('content', $topic["RssAggregatorsItem"]["display_summary"]);
}

echo $xml->asXML();

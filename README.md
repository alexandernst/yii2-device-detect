# yii2-device-detect

Yii2 extension for [Mobile-Detect](https://github.com/serbanghita/Mobile-Detect) library.

To use it just require this extension in your `composer.json` file:

~~~
"alexandernst/yii2-device-detect": "0.0.12",
~~~

And then add it to your components configuration in Yii2:

~~~php
'bootstrap' => ['devicedetect'],
'components' => [
	'devicedetect' => [
		'class' => 'alexandernst\devicedetect\DeviceDetect'
	],
]
~~~

Some basic detections are available in Yii's `params`:

~~~php
var_dump(Yii::$app->params['devicedetect']);

array (size=3)
  'isMobile' => boolean false
  'isTablet' => boolean false
  'isDesktop' => boolean true
~~~

You can also use it from anywhere in your code, calling Mobile-Detect's API:

~~~php
/*Detect a mobile device*/
\Yii::$app->devicedetect->isMobile();

/*Detect a tablet device*/
\Yii::$app->devicedetect->isTablet();

/*Check all available methods here: http://demo.mobiledetect.net/ */
~~~

Or using the an alias:

~~~php
\Yii::getAlias('@device'); //return 'mobile', 'tablet' or 'desktop'.
~~~

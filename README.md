# yii2-device-detect

Yii2 extension for [Mobile-Detect](https://github.com/serbanghita/Mobile-Detect) library.

To use it just require this library in your `composer.json` file:

~~~
"alexandernst/yii2-device-detect": "0.0.5",
~~~

And then add it to your components configuration in Yii2:

~~~php
'components' => [
	'devicedetect' => [
		'class' => 'alexandernst\devicedetect\DeviceDetect'
	],
]
~~~

You can use it from anywhere in your code, calling Mobile-Detect's API:

~~~php
/*Detect a mobile device*/
\Yii::$app->devicedetect->isMobile();

/*Detect a tablet device*/
\Yii::$app->devicedetect->isTablet();
~~~

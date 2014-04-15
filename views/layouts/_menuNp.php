<?php
/**
 * Return a list of menu item suitable for display in the main Nav
 */
return [
	['label' => \Yii::t('np', 'Numbering Plans'), 'url' => '#', 'items' => [
			['label' => \Yii::t('np', 'Country'), 'url' => ['/np/country/index']],
			['label' => \Yii::t('np', '-- Country Code'), 'url' => ['/np/country-code/index']],
			['label' => \Yii::t('np', '-- MCC'), 'url' => ['/np/mobile-country-code/index']],
			['label' => \Yii::t('np', 'Operators'), 'url' => ['/np/network-operator/index']],
			['label' => \Yii::t('np', '-- MNC'), 'url' => ['/np/network-code/index']],
			['label' => \Yii::t('np', '-- MDC'), 'url' => ['/np/network-destination-code/index']],
		]
	],
];
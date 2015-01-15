<?php

namespace istt\np;

class NpModule extends \yii\base\Module
{
	/**
	 * @var string The prefix for user module URL.
	 * @See [[GroupUrlRule::prefix]]
	 */
	public $urlPrefix = 'np';
	/** @var array The rules to be used in URL management. */
	public $urlRules = [];
	public $defaultRoute = 'network-operator';
}

<?php

/**
 * BootWysiwyg class file.
 * @author Sam Stenvall <sam.stenvall@arcada.fi>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 * @since 1.0.0
 */

/**
 * Bootstrap wysiwyg widget.
 */
class BootWysiwyg extends CInputWidget
{
	/**
	 * @var array which buttons to show above the editor. Defaults to null 
	 * meaning all buttons are shown.
	 */
	public $buttons;
	
	/**
	 * @var array list of events that should be passed to the editor.
	 */
	public $events;
	
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();
	
	/**
	 * @var array the default list of buttons to be shown.
	 */
	private $_defaultButtons = array(
		'font-styles',
		'emphasis',
		'lists',
		'html',
		'link',
		'image'
	);
	
	/**
	 * Initializes the widget
	 */
	public function init()
	{
		if (!isset($this->htmlOptions['id']))
			$this->htmlOptions['id'] = $this->getId();
		
		// Publish and register necessary files
		$libPath = Yii::getPathOfAlias('bootstrap').'/lib/bootstrap-wysihtml5';
		
		$assetManager = Yii::app()->getAssetManager();
		$cssPath = $assetManager->publish($libPath.'/css');
		$jsPath = $assetManager->publish($libPath.'/js');
		
		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerCssFile($cssPath.'/bootstrap-wysihtml5-0.0.2.css');
		$cs->registerScriptFile($jsPath.'/wysihtml5-0.3.0_rc2.min.js', CClientScript::POS_END);
		$cs->registerScriptFile($jsPath.'/bootstrap-wysihtml5-0.0.2.min.js', CClientScript::POS_END);
	}

	/**
	 * Runs the widget 
	 */
	public function run()
	{
		$id = $this->id;
        list($name,$id)=$this->resolveNameID();
		// Determine what options should be passed
		$options = array();
		foreach ($this->_defaultButtons as $button)
			$options[$button] = $this->buttons === null || array_search($button, $this->buttons) !== false;
		
		if (isset($this->events))
			$options['events'] = $this->events;
			
        if($this->hasModel())
			echo CHtml::activeTextArea($this->model,$this->attribute,$this->htmlOptions);
		else
			echo CHtml::textArea($name,$this->value,$this->htmlOptions);
		
		$options = CJavaScript::encode($options);
		
		//echo CHtml::openTag('textarea', $this->htmlOptions);
		Yii::app()->getClientScript()->registerScript(
				__CLASS__.'#'.$id, "jQuery('#{$id}').wysihtml5({$options});");
	}

}
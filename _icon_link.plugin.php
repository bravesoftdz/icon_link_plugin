<?php

class icon_link_plugin extends Plugin
{
	public $code = 'b2_icon_link';
	public $version = '0.1';
	public $author = 'https://github.com/keithbowes/link_icon_plugin';

	function PluginInit ( & $params )
	{
		$this->name = $this->T_('Icon Link Plugin');
		$this->short_desc = $this->T_('Puts &lt;link rel="icon" &8230;8230;8230;&gt; in the &lt;head&gt;');
	}

	function SkinBeginHtmlHead ( & $params )
	{
		$iconurl = $this->Settings->get('iconurl');
		if (isset($iconurl))
		{
			$icontype = $this->Settings->get('icontype');
			if (isset($icontype))
				$type='type="' . $icontype . '" ';
			else
				$type = '';
			add_headline('<link rel="icon" ' . $type . 'href="' . $iconurl . '" />');
		}
	}

	function GetDefaultSettings ( & $params )
	{
		return array
			(
				'iconurl' => array
				(
					'label' => $this->T_('Icon URL'),
					'type' => 'text',
				),
				'icontype' => array
				(
					'label' => $this->T_('Icon type'),
					'type' => 'text',
					'note' => $this->T_('(e.g. image/png)'),
				),
			);
	}
}

?>
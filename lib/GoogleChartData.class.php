<?php

/**
 * This file is part of GoogleChart PHP library.
 * 
 */
 
/**
 * A data serie.
 */
class GoogleChartData
{
	private $values = null;
	private $color = null;
	private $style = null;
	private $fill = null;

	public function __construct(array $values)
	{
		$this->values = $values;
		
		$this->setColor('336699');
		$this->setStyle(2);
	}

	public function setColor($color)
	{
		$this->color = $color;
		return $this;
	}

	public function getColor()
	{
		return $this->color;
	}

	public function setFill($color)
	{
		$this->fill = array(
			'color' => $color
		);
	}

	public function getFill($raw_value = false)
	{
		if ( $raw_value )
			return $this->fill;
		
		if ( $this->fill === null )
			return null;

		$fill = 'B,'.$this->fill['color'].',%d,0,0';

		return $fill;
	}
	
	public function setStyle($thickness, $dash_length = null, $space_length = null)
	{
		$this->style = array(
			'thickness' => $thickness,
			'dash_length' => $dash_length,
			'space_length' => $space_length
		);

		return $this;
	}

	public function getStyle($raw_value = false)
	{
		if ( $raw_value )
			return $this->style;

		$style = $this->style['thickness'];
		if ( $this->style['dash_length'] ) {
			$style .= ','.$this->style['dash_length'];
			if  ( $this->style['space_length'] ) {
				$style .= ','.$this->style['space_length'];
			}
		}
		return $style;
	}

	public function getValues()
	{
		return $this->values;
	}
}
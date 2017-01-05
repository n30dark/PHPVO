<?php

namespace PVO;

class UrlTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider validUrlProvider
	 */
	public function testValidUrl($url){
		$this->assertInstanceOf('PVO\\Url', new Url($url));
	}

	/**
	 * @dataProvider invalidUrlProvider
	 */
	public function testInvalidUrl($url){
		$this->expectException(Exceptions\InvalidValueException::class);
		new Url($url);
	}

	public function testValueMethod(){
		$url = 'www.url.com';
		$pvo = new Url($url);
		$this->assertEquals($url, $pvo->value());
	}

	public function testToStringMethod(){
		$url = 'www.url.com';
		$pvo = new Url($url);
		$this->assertEquals($url, (string)$pvo);
	}

	public function validUrlProvider(){
		return [
			['www.url.com'],
			['http://www.google.com'],
			['alexfinney.co.uk'],
			['https://thefirstclub.com']
		];
	}

	public function invalidUrlProvider(){
		return [
			['https//thefirstclub.com'],
			['Just a string'],
			['www.thisérl'],
			['whatabouthis@']
		];
	}

}
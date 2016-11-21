<?php

namespace PVO;

class EmailAddressTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider validEmailAddressProvider
	 */
	public function testValidEmailAddress($email){
		$this->assertInstanceOf('PVO\\EmailAddress', new EmailAddress($email));
	}

	/**
	 * @dataProvider invalidEmailAddressProvider
	 */
	public function testInvalidEmailAddress($email){
		$this->expectException(Exceptions\InvalidValueException::class);
		new EmailAddress($email);
	}

	public function testValueMethod(){
		$email = 'abc@123.com';
		$pvo = new EmailAddress($email);
		$this->assertEquals($email, $pvo->value());
	}

	public function testToStringMethod(){
		$email = 'abc@123.com';
		$pvo = new EmailAddress($email);
		$this->assertEquals($email, (string)$pvo);
	}

	public function validEmailAddressProvider(){
		return [
			['finney.alex@gmail.com'],
			['alex.finney@thefirstclub.com'],
			['fake@alexfinney.co.uk'],
			['abc@123.com']
		];
	}

	public function invalidEmailAddressProvider(){
		return [
			['email@fail'],
			['Just a string'],
			['@something.com'],
			['whatabouthis@']
		];
	}

}
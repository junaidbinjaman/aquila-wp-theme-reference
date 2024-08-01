<?php
//phpcs:disabled

trait Singleton {
	public static function get_instance() {
		static $instance = [];

		$called_class = get_called_class();

		if ( ! isset($instance[ $called_class ]) ) {
			echo 'Hello';
			$instance[$called_class] = new $called_class;
		}

		return $instance[$called_class];
	}
}

class User {
	use Singleton;

	public function __construct()
	{
		// echo 'Hello, User';
	}
}

$user1 = User::get_instance();
$user2 = User::get_instance();
$user3 = User::get_instance();

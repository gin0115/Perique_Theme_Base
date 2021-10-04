<?php

declare(strict_types=1);

/**
 * Handles the initial installation.
 */

require_once __DIR__ . '/Installation.php';
require_once __DIR__ . '/Console.php';

class Installer {

	/**
	 * Holds the installation steps
	 * @var array{question:string,sub_title:string,optional:bool,setter:string}[]
	 */
	protected const INSTALLATION_STEPS = array(
		array(
			'question'  => 'What is the themes name?',
			'sub_title' => 'Used in composer and webpack configs.',
			'optional'  => true,
			'setter'    => 'set_theme_name',
		),
		array(
			'question'  => 'Please enter a short description of the theme',
			'sub_title' => 'Used in composer and webpack configs.',
			'optional'  => true,
			'setter'    => 'set_description',
		),
		array(
			'question'  => 'Please enter a url for the theme',
			'sub_title' => 'Used in composer and webpack configs.',
			'optional'  => true,
			'setter'    => 'set_description',
		),
		array(
			'question'  => 'Please enter the themes namespace',
			'sub_title' => 'Will be scoped with the prefix',
			'optional'  => false,
			'setter'    => 'set_namespace',
		),
		array(
			'question'  => 'What is themes namespace prefix?',
			'sub_title' => 'Defines the prefix used by PHPScoper to prevent namespace collisions. Must be a value which can be used in a valid php namespace.',
			'optional'  => false,
			'setter'    => 'set_build_prefix',
		),
		array(
			'question'  => 'What is the autoloader suffix for phpscoper',
			'sub_title' => 'Please enter a unique suffix, must conform to php naming conventions, defaults to pc_theme',
			'optional'  => true,
			'setter'    => 'set_autoloader_suffix',
		),
		array(
			'question'  => 'What is the starting version for the theme',
			'sub_title' => 'Used in all docblocks, defaults to 0.0.1',
			'optional'  => true,
			'setter'    => 'set_autoloader_suffix',
		),
	);

	/**
	 * @var Installation
	 */
	protected $installation;

	public function __construct() {
		$this->installation = new Installation();
	}

	public static function run(): void {
		$instance = new self();
		$instance->get_values();
	}

	public function get_values() {
		try {
			foreach ( self::INSTALLATION_STEPS as $step ) {
				$answer = $this->ask_question( $step );
				if ( ! is_null( $answer ) ) {
					call_user_func( array( $this->installation, $step['setter'] ), $answer );
				}
			}
		} catch ( \Throwable $th ) {
			$this->render_error( $th );
		}

		$this->show_config();
	}

	/**
	 * Asks a question based on the steps array.
	 *
	 * @param array{question:string,sub_title:string,optional:bool,setter:string} $question
	 * @return string|null
	 */
	private function ask_question( array $question ): ?string {
		Console::log( $question['question'], 'white', false, 'blue' );
		$subtitle = sprintf(
			'(%s)[%s]',
			$question['sub_title'],
			$question['optional'] ? 'OPTIONAL' : 'REQUIRED'
		);

		Console::log( $subtitle, 'yellow', false, 'blue' );
		Console::log();
		$answer = readline( '? ' );

		if ( ! $question['optional'] && $answer === '' ) {
			throw new Exception( 'Required questions, need answers. Please start again!' );
		}

		return mb_strlen( $answer ) === 0 ? null : $answer;
	}

	/**
	 * Renders the supplied config details.
	 */
	private function show_config() {
		Console::log( '', 'white', true, 'green' );
		Console::log( '', 'white', true, 'green' );
		Console::log( '               Theme Details', 'white', true, 'green' );
		Console::log( '', 'white', true, 'green' );
		Console::log( 'Theme Name: ' . $this->installation->get_theme_name(), 'white', true, 'green' );
		Console::log( 'Theme Description: ' . $this->installation->get_description(), 'white', true, 'green' );
		Console::log( 'Theme URL: ' . $this->installation->get_theme_url(), 'white', true, 'green' );
		Console::log( 'Theme Version: ' . $this->installation->get_starting_version(), 'white', true, 'green' );
		Console::log( 'Theme Namespace: ' . $this->installation->get_namespace(), 'white', true, 'green' );
		Console::log( 'Auto Loader Suffix: ' . $this->installation->get_autoloader_suffix(), 'white', true, 'green' );
		Console::log( 'Build Prefix: ' . $this->installation->get_build_prefix(), 'white', true, 'green' );
		Console::log( '', 'white', true, 'green' );
		Console::log( '', 'white', true, 'green' );
	}

	/**
	 * Parse an exception to console.
	 *
	 * @param \Throwable $th
	 * @return void
	 */
	private function render_error( \Throwable $th ): void {
		Console::log( '', 'white', true, 'red' );
			Console::log( '                       ', 'white', true, 'red' );
			Console::log( '                       ', 'white', true, 'red' );
			Console::log( '     *************************************************************', 'white', true, 'red' );
			Console::log( '     **                          ERROR                          **', 'white', true, 'red' );
			Console::log( '     *************************************************************', 'white', true, 'red' );
			Console::log( '     **                                                         **', 'white', true, 'red' );
			Console::log( '     **                                                         **', 'white', true, 'red' );
			Console::log( '     **  ' . $th->getMessage() . '  **', 'white', true, 'red' );
			Console::log( '     **                                                         **', 'white', true, 'red' );
			Console::log( '     **                                                         **', 'white', true, 'red' );
			Console::log( '     *************************************************************', 'white', true, 'red' );
			Console::log( '     **                          ERROR                          **', 'white', true, 'red' );
			Console::log( '     *************************************************************', 'white', true, 'red' );
			Console::log( '                       ', 'white', true, 'red' );
			Console::log();
			exit;
	}
}

Installer::run();

<?php

declare(strict_types=1);

/**
 * Installation instance.
 */

class Installation {

	/**
	 * @var string
	 */
	protected $theme_name = 'Perique';

	/**
	 * @var string
	 */
	protected $description = 'Theme created using the PinkCrab Perique Framework.';

	/**
	 * @var string
	 */
	protected $theme_url = 'https://github.com/gin0115/Perique_Theme_Base';

	/**
	 * @var string
	 */
	protected $namespace;

	/**
	 * @var string
	 */
	protected $autoloader_suffix = 'pc_theme';

	/**
	 * @var string
	 */
	protected $starting_version = '0.0.1';

	/**
	 * @var string
	 */
	protected $build_prefix;

	/**
	 * Get theme_name
	 *
	 * @return string
	 */
	public function get_theme_name(): string {
		return $this->theme_name;
	}

	/**
	 * Set theme_name
	 *
	 * @param string $theme_name
	 *
	 * @return self
	 */
	public function set_theme_name( string $theme_name ): self {
		$this->theme_name = $theme_name;
		return $this;
	}

	/**
	 * Get description
	 *
	 * @return string
	 */
	public function get_description(): string {
		return $this->description;
	}

	/**
	 * Set description
	 *
	 * @param string $description
	 *
	 * @return self
	 */
	public function set_description( string $description ): self {
		$this->description = $description;
		return $this;
	}

	/**
	 * Get theme_url
	 *
	 * @return string
	 */
	public function get_theme_url(): string {
		return $this->theme_url;
	}

	/**
	 * Set theme_url
	 *
	 * @param string $theme_url
	 *
	 * @return self
	 */
	public function set_theme_url( string $theme_url ): self {
		$this->theme_url = $theme_url;
		return $this;
	}

	/**
	 * Get namespace
	 *
	 * @return string
	 */
	public function get_namespace(): string {
		return $this->namespace;
	}

	/**
	 * Set namespace
	 *
	 * @param string $namespace
	 *
	 * @return self
	 */
	public function set_namespace( string $namespace ): self {
		$this->namespace = $namespace;
		return $this;
	}

	/**
	 * Get autoloader_suffix
	 *
	 * @return string
	 */
	public function get_autoloader_suffix(): string {
		return $this->autoloader_suffix;
	}

	/**
	 * Set autoloader_suffix
	 *
	 * @param string $autoloader_suffix
	 *
	 * @return self
	 */
	public function set_autoloader_suffix( string $autoloader_suffix ): self {
		$this->autoloader_suffix = $autoloader_suffix;
		return $this;
	}

	/**
	 * Get starting_version
	 *
	 * @return string
	 */
	public function get_starting_version(): string {
		return $this->starting_version;
	}

	/**
	 * Set starting_version
	 *
	 * @param string $starting_version
	 *
	 * @return self
	 */
	public function set_starting_version( string $starting_version ): self {
		$this->starting_version = $starting_version;
		return $this;
	}

	/**
	 * Get build_prefix
	 *
	 * @return string
	 */
	public function get_build_prefix(): string {
		return $this->build_prefix;
	}

	/**
	 * Set build_prefix
	 *
	 * @param string $build_prefix
	 *
	 * @return self
	 */
	public function set_build_prefix( string $build_prefix ): self {
		$this->build_prefix = $build_prefix;
		return $this;
	}
}

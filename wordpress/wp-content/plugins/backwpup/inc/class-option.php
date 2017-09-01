<?php

/**
 * Class for options
 */
final class BackWPup_Option {

	/**
	 *
	 * add filter for Site option defaults
	 *
	 */
	public static function default_site_options() {

		//global
		add_site_option( 'backwpup_version', '0.0.0' );
		//job default
		add_site_option( 'backwpup_jobs', array() );
		//general
		add_site_option( 'backwpup_cfg_showadminbar', false );
		add_site_option( 'backwpup_cfg_showfoldersize', false );
		add_site_option( 'backwpup_cfg_protectfolders', true );
		//job
		add_site_option( 'backwpup_cfg_jobmaxexecutiontime', 30 );
		add_site_option( 'backwpup_cfg_jobstepretry', 3 );
		add_site_option( 'backwpup_cfg_jobrunauthkey', substr( md5( BackWPup::get_plugin_data( 'hash' ) ), 11, 8 ) );
		add_site_option( 'backwpup_cfg_loglevel', 'normal_translated' );
		add_site_option( 'backwpup_cfg_jobwaittimems', 0 );
		add_site_option( 'backwpup_cfg_jobdooutput', 0 );
		add_site_option( 'backwpup_cfg_windows', 0 );
		//Logs
		add_site_option( 'backwpup_cfg_maxlogs', 30 );
		add_site_option( 'backwpup_cfg_gzlogs', 0 );
		$upload_dir   = wp_upload_dir( null, false, true );
		$logs_dir     = trailingslashit( str_replace( '\\', '/', $upload_dir['basedir'] ) ) . 'backwpup-' . BackWPup::get_plugin_data( 'hash' ) . '-logs/';
		$content_path = trailingslashit( str_replace( '\\', '/', WP_CONTENT_DIR ) );
		$logs_dir     = str_replace( $content_path, '', $logs_dir );
		add_site_option( 'backwpup_cfg_logfolder', $logs_dir );
		//Network Auth
		add_site_option( 'backwpup_cfg_httpauthuser', '' );
		add_site_option( 'backwpup_cfg_httpauthpassword', '' );

	}

	/**
	 *
	 * Update a BackWPup option
	 *
	 * @param int $jobid the job id
	 * @param string $option Option key
	 * @param mixed $value the value to store
	 *
	 * @return bool if option save or not
	 */
	public static function update( $jobid, $option, $value ) {

		$jobid  = (int) $jobid;
		$option = sanitize_key( trim( $option ) );

		if ( empty( $jobid ) || empty( $option ) ) {
			return false;
		}

		//Update option
		$jobs_options                      = self::jobs_options( false );
		$jobs_options[ $jobid ][ $option ] = $value;

		return self::update_jobs_options( $jobs_options );
	}

	/**
	 *
	 * Load BackWPup Options
	 *
	 * @param bool $use_cache
	 *
	 * @return array of options
	 */
	private static function jobs_options( $use_cache = true ) {
		global $current_site;

		//remove from cache
		if ( ! $use_cache ) {
			if ( is_multisite() ) {
				$network_id = $current_site->id;
				$cache_key  = "$network_id:backwpup_jobs";
				wp_cache_delete( $cache_key, 'site-options' );
			} else {
				wp_cache_delete( 'backwpup_jobs', 'options' );
				$alloptions = wp_cache_get( 'alloptions', 'options' );
				if ( isset( $alloptions['backwpup_jobs'] ) ) {
					unset( $alloptions['backwpup_jobs'] );
					wp_cache_set( 'alloptions', $alloptions, 'options' );
				}
			}
		}

		return get_site_option( 'backwpup_jobs', array() );
	}

	/**
	 *
	 * Update BackWPup Options
	 *
	 * @param array $options The options array to save
	 *
	 * @return bool updated or not
	 */
	private static function update_jobs_options( $options ) {

		return update_site_option( 'backwpup_jobs', $options );
	}

	/**
	 *
	 * Get a BackWPup Option
	 *
	 * @param int $jobid Option the job id
	 * @param string $option Option key
	 * @param mixed $default returned if no value, if null the the default BackWPup option will get
	 * @param bool $use_cache USe the cache
	 *
	 * @return bool|mixed        false if nothing can get else the option value
	 */
	public static function get( $jobid, $option, $default = null, $use_cache = true ) {

		$jobid  = (int) $jobid;
		$option = sanitize_key( trim( $option ) );

		if ( empty( $jobid ) || empty( $option ) ) {
			return false;
		}

		$jobs_options = self::jobs_options( $use_cache );
		if ( ! isset( $jobs_options[ $jobid ][ $option ] ) && isset( $default ) ) {
			return $default;
		} elseif ( ! isset( $jobs_options[ $jobid ][ $option ] ) ) {
			return self::defaults_job( $option );
		} else {
			// Ensure archive name formatted properly
			if ( $option == 'archivename' ) {
				return self::normalize_archive_name( $jobs_options[ $jobid ][ $option ], $jobid );
			}
			else {
				return $jobs_options[ $jobid ][ $option ];
			}
		}
	}

	/**
	 *
	 * Get default option for BackWPup option
	 *
	 * @param string $key Option key
	 *
	 * @internal param int $id The job id
	 *
	 * @return bool|mixed
	 */
	public static function defaults_job( $key = '' ) {

		$key = sanitize_key( trim( $key ) );

		//set defaults
		$default['type']                  = array( 'DBDUMP', 'FILE', 'WPPLUGIN' );
		$default['destinations']          = array();
		$default['name']                  = __( 'New Job', 'backwpup' );
		$default['activetype']            = '';
		$default['logfile']               = '';
		$default['lastbackupdownloadurl'] = '';
		$default['cronselect']            = 'basic';
		$default['cron']                  = '0 3 * * *';
		$default['mailaddresslog']        = sanitize_email( get_bloginfo( 'admin_email' ) );
		$default['mailaddresssenderlog']  = 'BackWPup ' . get_bloginfo( 'name' ) . ' <' . sanitize_email( get_bloginfo( 'admin_email' ) ) . '>';
		$default['mailerroronly']         = true;
		$default['backuptype']            = 'archive';
		$default['archiveformat']         = '.zip';
		$default['archivename']           = self::get_archive_name_prefix( self::next_job_id() ) . '%Y-%m-%d_%H-%i-%s';
		//defaults vor destinations
		foreach ( BackWPup::get_registered_destinations() as $dest_key => $dest ) {
			if ( ! empty( $dest['class'] ) ) {
				$dest_object = BackWPup::get_destination( $dest_key );
				$default     = array_merge( $default, $dest_object->option_defaults() );
			}
		}
		//defaults vor job types
		foreach ( BackWPup::get_job_types() as $job_type ) {
			$default = array_merge( $default, $job_type->option_defaults() );
		}

		//return all
		if ( empty( $key ) ) {
			return $default;
		}
		//return one default setting
		if ( isset( $default[ $key ] ) ) {
			return $default[ $key ];
		} else {
			return false;
		}
	}

	/**
	 *
	 * BackWPup Job Options
	 *
	 * @param int $id The job id
	 * @param bool $use_cache
	 *
	 * @return array  of all job options
	 */
	public static function get_job( $id, $use_cache = true ) {

		if ( ! is_numeric( $id ) ) {
			return false;
		}

		$id           = intval( $id );
		$jobs_options = self::jobs_options( $use_cache );

		return wp_parse_args( $jobs_options[ $id ], self::defaults_job() );
	}


	/**
	 *
	 * Delete a BackWPup Option
	 *
	 * @param int $jobid the job id
	 * @param string $option Option key
	 *
	 * @return bool deleted or not
	 */
	public static function delete( $jobid, $option ) {

		$jobid  = (int) $jobid;
		$option = sanitize_key( trim( $option ) );

		if ( empty( $jobid ) || empty( $option ) ) {
			return false;
		}

		//delete option
		$jobs_options = self::jobs_options( false );
		unset( $jobs_options[ $jobid ][ $option ] );

		return self::update_jobs_options( $jobs_options );
	}

	/**
	 *
	 * Delete a BackWPup Job
	 *
	 * @param int $id The job id
	 *
	 * @return bool   deleted or not
	 */
	public static function delete_job( $id ) {

		if ( ! is_numeric( $id ) ) {
			return false;
		}

		$id           = intval( $id );
		$jobs_options = self::jobs_options( false );
		unset( $jobs_options[ $id ] );

		return self::update_jobs_options( $jobs_options );
	}

	/**
	 *
	 * get the id's of jobs
	 *
	 * @param string|null $key Option key or null for getting all id's
	 * @param bool $value Value that the option must have to get the id
	 *
	 * @return array job id's
	 */
	public static function get_job_ids( $key = null, $value = false ) {

		$key          = sanitize_key( trim( $key ) );
		$jobs_options = self::jobs_options( false );

		if ( empty( $jobs_options ) ) {
			return array();
		}

		//get option job ids
		if ( empty( $key ) ) {
			return array_keys( $jobs_options );
		}

		//get option ids for option with the defined value
		$new_option_job_ids = array();
		foreach ( $jobs_options as $id => $option ) {
			if ( isset( $option[ $key ] ) && $value == $option[ $key ] ) {
				$new_option_job_ids[] = (int) $id;
			}
		}
		sort( $new_option_job_ids );

		return $new_option_job_ids;
	}

	/**
	 * Gets the next available job id.
	 *
	 * @return int
	 */
	public static function next_job_id() {
		$ids = self::get_job_ids();
		sort( $ids );
		return end( $ids ) + 1;
	}

	/**
	 * Normalizes the archive name.
	 *
	 * The archive name should include the hash to identify this site, and the job id to identify this job.
	 *
	 * This allows backup files belonging to this job to be tracked.
	 *
	 * @param string $archive_name
	 * @param int    $jobid
	 *
	 * @return string The normalized archive name
	 */
	public static function normalize_archive_name( $archive_name, $jobid ) {
		$hash = BackWPup::get_plugin_data( 'hash' );

		// If name starts with 'backwpup', then we can try to parse
		if ( substr( $archive_name, 0, 8 ) == 'backwpup' ) {
			$parts = explode( '_', $archive_name );

			// Format = [hash][jobid]
			if ( preg_match( '/^' . preg_quote( $hash ) . '(\d{2,})?$/', $parts[1], $matches ) ) {
				// Was job id included?
				if ( ! isset( $matches[1] ) ) {
					// Append the job id
					$parts[1] .= sprintf( '%02d', $jobid );
				}
				elseif ( $matches[1] != $jobid ) {
					// This isn't the job ID you're looking for
					// So fix, append the correct one
					$parts[1] = $hash . sprintf( '%02d', $jobid );
				}
			}
			else {
				// Hash not included, so insert
				array_splice( $parts, 1, 0, $hash . sprintf( '%02d', $jobid ) );
			}
			return implode( '_', $parts );
		}
		else {
			// But otherwise, just prepend required format
			return "backwpup_$hash" . sprintf( '%02d', $jobid ) . '_' . $archive_name;
		}
	}

	/**
	 * Get the prefix for an archive name.
	 *
	 * Format should be backwpup_[hash][jobid]_
	 *
	 * @return string
	 */
	public static function get_archive_name_prefix( $jobid ) {
		return 'backwpup_' . BackWPup::get_plugin_data( 'hash' ) . sprintf( '%02d', $jobid ) . '_';
	}

}

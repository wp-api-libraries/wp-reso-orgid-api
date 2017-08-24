<?php
/**
 * WP-RESO-OUID-API (https://www.reso.org/ouid-api/)
 *
 * @package WP-RESO-OUID-API
 */

/*
* Plugin Name: WP RESO OUID API
* Plugin URI: https://github.com/wp-api-libraries/wp-reso-orgid-api
* Description: Perform API requests to RESO OUID in WordPress.
* Author: WP API Libraries
* Version: 1.0.0
* Author URI: https://wp-api-libraries.com
* GitHub Plugin URI: https://github.com/wp-api-libraries/wp-reso-orgid-api
* GitHub Branch: master
*/

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Check if class exists. */
if ( ! class_exists( 'ResoOuidAPI' ) ) {

	/**
	 * ResoOuidAPI Class.
	 */
	class ResoOuidAPI {

		/**
		 * Return format. XML or JSON.
		 *
		 * @var [string
		 */
	 	static private $output;

		/**
		 * Zillow BaseAPI Endpoint
		 *
		 * @var string
		 * @access protected
		 */
		protected $base_uri = 'https://www.reso.org/ouid/';

		/**
		 * Construct.
		 *
		 * @access public
		 * @param mixed $output Output.
		 * @return void
		 */
		public function __construct( $output = 'json' ) {

			static::$output = $output;

		}

		/**
		 * Fetch the request from the API.
		 *
		 * @access private
		 * @param mixed $request Request URL.
		 * @return $body Body.
		 */
		private function fetch( $request ) {

			$response = wp_remote_get( $request );
			$code = wp_remote_retrieve_response_code( $response );

			if ( 200 !== $code ) {
				return new WP_Error( 'response-error', sprintf( __( 'Server response code: %d', 'text-domain' ), $code ) );
			}

			$body = wp_remote_retrieve_body( $response );

			return json_decode( $body );

		}

		/**
		 * get_all_orgs function.
		 *
		 * @access public
		 * @return void
		 */
		function get_all_orgs() {

			$request = $this->base_uri;

			$xml = simplexml_load_file( $request );

			$json = wp_json_encode( $xml );

			$orgs = json_decode( $json, true );

			return $orgs;

		}

		/**
		 * get_org_by_id function.
		 *
		 * @access public
		 * @param mixed $ouid
		 * @return void
		 */
		function get_org_by_id( $ouid ) {

			$request = $this->base_uri . '?ouid=' . $ouid;

			$xml = simplexml_load_file( $request );

			$json = wp_json_encode( $xml );

			$orgs = json_decode( $json, true );

			return $orgs;

		}

		/**
		 * get_org_by_mls_assocation function.
		 *
		 * @access public
		 * @param mixed $mls_id
		 * @return void
		 */
		function get_org_by_mls_assocation( $mls_id ) {

			$request = $this->base_uri . '/?assoc2mls=' . $mls_id;

			$xml = simplexml_load_file( $request );

			$json = wp_json_encode( $xml );

			$orgs = json_decode( $json, true );

			return $orgs;

		}

		/**
		 * get_org_by_status function.
		 *
		 * @access public
		 * @param string $active (default: '1')
		 * @return void
		 */
		function get_org_by_status( $active = '1' ) {

			$request = $this->base_uri . '?active=' . $active;

			$xml = simplexml_load_file( $request );

			$json = wp_json_encode( $xml );

			$orgs = json_decode( $json, true );

			return $orgs;


		}

		/**
		 * get_org_by_city function.
		 *
		 * @access public
		 * @param mixed $city
		 * @return void
		 */
		function get_org_by_city( $city ) {

			$request = $this->base_uri . '?city=' . $city;

			$xml = simplexml_load_file( $request );

			$json = wp_json_encode( $xml );

			$orgs = json_decode( $json, true );

			return $orgs;
		}

		/**
		 * get_org_by_state function.
		 *
		 * @access public
		 * @param mixed $state
		 * @return void
		 */
		function get_org_by_state( $state ) {

			$request = $this->base_uri . '?state=' . $state;

			$xml = simplexml_load_file( $request );

			$json = wp_json_encode( $xml );

			$orgs = json_decode( $json, true );

			return $orgs;
		}

		/**
		 * get_org_by_zip function.
		 *
		 * @access public
		 * @param mixed $zip
		 * @return void
		 */
		function get_org_by_zip( $zip ) {

			$request = $this->base_uri . '?zip=' . $zip;

			$xml = simplexml_load_file( $request );

			$json = wp_json_encode( $xml );

			$orgs = json_decode( $json, true );

			return $orgs;

		}

	}
}

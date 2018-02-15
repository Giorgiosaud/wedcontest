<?php
/**
 * Created by PhpStorm.
 * User: jorgelsaud
 * Date: 02-02-18
 * Time: 17:14
 */

namespace Zonapro\WedContest;


class Query
{
    public $query_vars = array();
    private static $_chosen_attributes;

    public function __construct() {
//        add_action( 'init', array( $this, 'add_endpoints' ) );
        if ( ! is_admin() ) {
            add_filter( 'query_vars', array( $this, 'add_query_vars' ), 0 );
        }
        $this->init_query_vars();
    }
    public function init_query_vars(){
        // Query vars to add to WP.
        $this->query_vars = array(
            'wedaction'          => '',
        );
    }
    /**
     * Add query vars.
     *
     * @access public
     * @param array $vars
     * @return array
     */
    public function add_query_vars( $vars ) {
        foreach ( $this->get_query_vars() as $key => $var ) {
            $vars[] = $key;
        }
        return $vars;
    }

    private function get_query_vars()
    {
        return $this->query_vars;
    }

}
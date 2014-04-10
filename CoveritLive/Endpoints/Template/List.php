<?php

/**
 * ZF-CoveritLive
 * 
 * This method provides a list of templates that are available to the user. 
 * Templates allow control over the size, settings and appearance of the viewer window. 
 * The template ids returned by this method can then be used in the 
 * event/create API method to set the template for the event viewer window.
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=285
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Template_List implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{
    
    /**
     * return GET-Parameter
     * 
     * (non-PHPdoc)
     * @see ZendX_CoveritLive_Interfaces_Endpoint::getData()
     * @return array
     */
    public function getData ()
    {
        return array();
    }

    /**
     * return url params
     * 
     * (non-PHPdoc)
     * @see ZendX_CoveritLive_Interfaces_Endpoint::getUrl()
     * @return array
     */
    public function getUrl ()
    {
        return array(
                'endpointurl' => '/template/list',
                'method' => 'get'
        );
    }
} 
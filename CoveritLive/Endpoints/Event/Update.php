<?php

/**
 * ZF-CoveritLive
 * 
 * The Event Update method allows you to update event data once an event has been created. 
 * This version supports only preroll ad updates. Once set up you will be able to add preroll 
 * videos to your events (ads that run prior to a viewer gaining access to the content of the event). 
 * These updates are specific to an event, but can be called numerous times if you wish to 
 * change ad configuration during an event.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=331
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Event_Update implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_adtype = 'preroll';
    
    private $_adcode = NULL;
    
    private $_closebutton = NULL;
    
    /**
     * Determines if the ad will have a close button allowing the viewer 
     * to close the ad. The default is no closebutton. 
     * Valid values are 'y' and 'n'.
     * 
     * @param string $value
     */
    public function setCloseButton(string $value)
    {
        $this->_closebutton = $value;
        return $this;
    }
    
    
    /**
     * A snippet of html code that displays the ad. 
     * Must be an iframe which calls a page on your own domain which contains 
     * the necessary code to run the ad. If left blank, it has the effect 
     * of removing custom ads from the event.
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Event_Update
     */
    public function setAdCode(string $value)
    {
        $this->_adcode = $value;
        return $this;
    }
    
    
    /**
     * Type of ad to be displayed. Currently only supports the value: preroll
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Event_Update
     */
    public function setAdType(string $value)
    {
        $this->_adtype = $value;
        return $this;
    }
    

    /**
     * The event code for the event which is to be ended. Each CiL event that is created is 
     * assigned a unique event code that identifies it in the database - The event owner can 
     * find this value after creating a new event, by selecting the "altcast_code" which 
     * is found in their Viewer Window embed code 
     * (e.g. the event code is "46e6cd22b5" in "altcast_code=46e6cd22b5"). 
     * This value is also returned by the event/list and event/create API methods.
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Event_Update
     */
    public function setEventCode(string $code)
    {
        $this->_eventcode = $code;
        return $this;
    }

    /**
     * return POST-Parameter
     * 
     * (non-PHPdoc)
     * @see ZendX_CoveritLive_Interfaces_Endpoint::getData()
     * @return array
     */
    public function getData ()
    {
        return array(
                'event_code' => $this->_eventcode
        );
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
                'endpointurl' => '/event/update',
                'method' => 'post'
        );
    }
} 
<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows you to delete any pin item. Any item deletion made will immediately propagate to all 
 * readers of the live event in real time. Pin items are identified by a pin item id, which is 
 * returned by the pin/create and pin/list API methods.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=398
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Pin_Delete implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_pinid = NULL;

    /**
     * The event code for the event which is to be ended. Each CiL event that is created is 
     * assigned a unique event code that identifies it in the database - The event owner can 
     * find this value after creating a new event, by selecting the "altcast_code" which 
     * is found in their Viewer Window embed code 
     * (e.g. the event code is "46e6cd22b5" in "altcast_code=46e6cd22b5"). 
     * This value is also returned by the event/list and event/create API methods.
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Pin_Delete
     */
    public function setEventCode(string $code)
    {
        $this->_eventcode = $code;
        return $this;
    }
    
    /**
     * The id of the pin item to be deleted. These ids are returned by the pin/create and 
     * pin/list API methods. 
     * 
     * @param string $pinid
     * @return ZendX_CoveritLive_Endpoints_Pin_Delete
     */
    public function setPinId(string $pinid)
    {
        $this->_pinid = $pinid;
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
                'event_code' => $this->_eventcode,
                'pin_id' => $this->_pinid
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
                'endpointurl' => '/pin/delete',
                'method' => 'post'
        );
    }
} 
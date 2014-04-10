<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows the display of published pin items to be ordered. 
 * There must be at least 2 published pin items to order. Each call must reorder 
 * all of the currently published pin items (ie. single item reordering is not supported). 
 * The ordering is achieved by passing a json encoded array of the ids and positions 
 * of each pin item.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=402
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Pin_Order implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_order = array();

    /**
     * The event code for the event which is to be ended. Each CiL event that is created is 
     * assigned a unique event code that identifies it in the database - The event owner can 
     * find this value after creating a new event, by selecting the "altcast_code" which 
     * is found in their Viewer Window embed code 
     * (e.g. the event code is "46e6cd22b5" in "altcast_code=46e6cd22b5"). 
     * This value is also returned by the event/list and event/create API methods.
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Pin_Order
     */
    public function setEventCode(string $code)
    {
        $this->_eventcode = $code;
        return $this;
    }
    
    /**
     * A json encoded array of the published pin item ids, and the positions in which to order them. 
     * All of the currently published pin items must be represented, and each position may only 
     * be used once. For example, for two published pin items:
     * 
     * [{ "pin_id": 123, "position":1 }, { "pin_id": 456, "position":2 }]
     * 
     * @param string $orderdata
     * @return ZendX_CoveritLive_Endpoints_Pin_Order
     */
    public function setOrder(string $orderdata)
    {
        $this->_order = $orderdata;
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
                'order_data' => $this->_order
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
                'endpointurl' => '/pin/order',
                'method' => 'post'
        );
    }
} 
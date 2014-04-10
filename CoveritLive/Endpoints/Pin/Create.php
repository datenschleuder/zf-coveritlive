<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows for the creation of pin items. The pin item id is returned by this method 
 * if the pin item is successfully created, allowing for further interactions through the API.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=396
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Pin_Create implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_content = NULL;
    
    private $_status = NULL;
    
    private $_direction =  NULL;

    /**
     * The event code for the event which is to be ended. Each CiL event that is created is 
     * assigned a unique event code that identifies it in the database - The event owner can 
     * find this value after creating a new event, by selecting the "altcast_code" which 
     * is found in their Viewer Window embed code 
     * (e.g. the event code is "46e6cd22b5" in "altcast_code=46e6cd22b5"). 
     * This value is also returned by the event/list and event/create API methods.
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Pin_Create
     */
    public function setEventCode(string $code)
    {
        $this->_eventcode = $code;
        return $this;
    }
    
    /**
     * The content of the pin item to be created. May include HTML markup. 
     * May not be > 5000 characters in length.
     * 
     * @param string $content
     * @return ZendX_CoveritLive_Endpoints_Pin_Create
     */
    public function setContent(string $content)
    {
        $this->_content = $content;
        return $this;
    }
    
    /**
     * The status of the pin item to be created. Must be set to "published" or "unpublished".
     * 
     * Note: If the maximum number of pin items (3) have already been published, attempting 
     * to create new published pin items will return an error.
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Pin_Create
     */
    public function setStatus(string $value)
    {
        $this->_status = $value;
        return $this;
    }
    
    /**
     * Where the newly pin item will display. Valid values are "append" or "prepend". Appended items 
     * will appear at the end of the list of pin items, while prepended items will appear at the 
     * beginning. Omit this parameter if the status request parameter is set to "unpublished". 
     * Defaults to "append". 
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Pin_Create
     */
    public function setDirection(string $value)
    {
        $this->_direction = $value;
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
                'content' => $this->_content,
                'status' => $this->_status,
                'direction' => $this->_direction
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
                'endpointurl' => '/pin/create',
                'method' => 'post'
        );
    }
} 
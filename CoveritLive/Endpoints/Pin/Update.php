<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows the content and published status of a pin item to be updated. 
 * The only pin items that can be updated are host comments, guest comments, captions in 
 * images and any pin items created through the API. Any updates made will immediately 
 * propagate to all readers of the live event in real time. Pin items are 
 * identified by a pin item id, which is returned by the pin/create and pin/list API methods.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=404
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Pin_Update implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_pinid = NULL;
    
    private $_content = NULL;
    
    private $_authorname = NULL;
    
    private $_ispublished = NULL; 

    /**
     * Indicates whether the pin item should be published or unpublished. 
     * Valid values include: "y", "n". 
     * Set to "y" to publish a currently unpublished pin item, 
     * and set to "n" to unpublish a currently published pin item.
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Pin_Update
     */
    public function isPublished(string $value)
    {
        $this->_ispublished = $value;
        return $this;
    }
    
    
    /**
     * Update the name of the pin item author. Only applies to guest_comment pin items.
     * 
     * @param string $author
     * @return ZendX_CoveritLive_Endpoints_Pin_Update
     */
    public function setAuthorName(string $author)
    {
        $this->_authorname = $author;
        return $this;
    }
    
    
    /**
     * This is the content which will replace the current item content. 
     * May include HTML markup. May not be > 5000 characters in length.
     * 
     * @param string $content
     * @return ZendX_CoveritLive_Endpoints_Pin_Update
     */
    public function setContent(string $content)
    {
        $this->_content = $content;
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
     * @return ZendX_CoveritLive_Endpoints_Pin_Update
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
     * @return ZendX_CoveritLive_Endpoints_Pin_Update
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
                'pin_id' => $this->_pinid,
                'content' => $this->_content,
                'author_name' => $this->_authorname,
                'published' => $this->_ispublished
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
                'endpointurl' => '/pin/update',
                'method' => 'post'
        );
    }
} 
<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows you to post content directly into your live event from a custom application. 
 * Once set up you will be able to auto-publish content (including text and multimedia) from external 
 * sources such as 3rd party image or content management systems. Set it up once and let the API 
 * do all the work during your event. This allows CoveritLive to be integrated with just about 
 * any application that can connect to the web.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=279
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Content_Create implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_content = NULL;
    
    private $_writername = NULL;
    
    private $_avataruri = NULL;
 
    
    /**
     * The event code for the event which the comments will be added to. 
     * Each CiL event that is created is assigned a unique event code 
     * that identifies it in the database - The event owner can find this 
     * value after creating a new event, by selecting the "altcast_code" 
     * which is found in their Viewer Window embed code 
     * (e.g. the event code is "46e6cd22b5" in "altcast_code=46e6cd22b5"). 
     * This value is also returned by the event/list API method.
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Content_Create
     */
    public function setEventCode($code)
    {
        $this->_eventcode = (string) $code;
        return $this;
    }
    
    
    /**
     * This is the content which will be inserted into your event. 
     * May include HTML markup. May not be > 500 characters in length.
     * 
     * @param string $content
     * @return ZendX_CoveritLive_Endpoints_Content_Create
     */
    public function setContent($content)
    {
        $this->_content = (string) $content;
        return $this;
    }
    
    
    /**
     * If provided AND the target event has enabled Display Names, 
     * the parameter provided here will be used for that display name. 
     * 
     * @param string $name
     * @return ZendX_CoveritLive_Endpoints_Content_Create
     */
    public function setWriterName($name)
    {
        $this->_writername = (string) $name;
        return $this;
    }
    
    
    /**
     * If provided the URI of an image that will be used as the avatar for 
     * the content entry being inserted. Images are displayed at 48x48 pixels. 
     * If image provided does not match these dimensions it will be 
     * auto-resized in the CoveritLive Viewer Window.  
     * 
     * @param string $uri
     * @return ZendX_CoveritLive_Endpoints_Content_Create
     */
    public function setAvatarUri($uri)
    {
        $this->_avataruri = (string) $uri;
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
                'writer_name' => $this->_writername,
                'avatar_uri' => $this->_avataruri
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
                'endpointurl' => '/content/create',
                'method' => 'post'
        );
    }
} 
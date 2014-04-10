<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows users to create polls on the fly. The poll id is returned by the method 
 * if the poll is successfully created, allowing for further interactions through the API.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=296
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Poll_Create implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_question = NULL;
    
    private $_answers = NULL;
    


    /**
     * The event code for the event which is to be ended. Each CiL event that is created is 
     * assigned a unique event code that identifies it in the database - The event owner can 
     * find this value after creating a new event, by selecting the "altcast_code" which 
     * is found in their Viewer Window embed code 
     * (e.g. the event code is "46e6cd22b5" in "altcast_code=46e6cd22b5"). 
     * This value is also returned by the event/list and event/create API methods.
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Poll_Create
     */
    public function setEventCode(string $code)
    {
        $this->_eventcode = $code;
        return $this;
    }
    
    /**
     * The poll question. May not be more than 500 characters in length.
     * 
     * @param string $question
     * @return ZendX_CoveritLive_Endpoints_Poll_Create
     */
    public function setQustion(string $question)
    {
        $this->_question = $question;
        return $this;
    }
    
    /**
     * A pipe delimited list of answers. There must be between 2 and 6 pipe delimited answers, 
     * and each answer may not be more than 200 characters in length. 
     * For example: "The first answer|The second answer|The third answer"
     * 
     * @param string $answer
     * @return ZendX_CoveritLive_Endpoints_Poll_Create
     */
    public function setAnswers(string $answers)
    {
        $this->_answers = $answers;
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
                'question' => $this->_question,
                'answers' => $this->_answers,
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
                'endpointurl' => '/poll/create',
                'method' => 'post'
        );
    }
} 
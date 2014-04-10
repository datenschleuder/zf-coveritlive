<?php
/**
 * ZF-CoveritLive - Interface for ZendX_CoveritLive_Endpoints_*
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @license    MIT
 */
interface ZendX_CoveritLive_Interfaces_Endpoint
{

    public function getData ();

    public function getUrl ();
}
<?php

/*
 * This file is part of the CloudStack PHP Client. This particular file is
 * (c) Jason Hancock <jsnbyh@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This is designed to work with the CloudStack API extension which can be
 * found at https://github.com/jasonhancock/cloudstack-api-extension
 */

class ExtendedCloudStackClient extends CloudStackClient {

    /**
     * Gets the userdata associated with a virtual machine.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the numeric ID of the virtual machine
     */
    public function getUserData($args=array()) {
        if (empty($args['id']))
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('getUserData', $args);
    }

    /**
     * Lists the available bundles. A bundle is a collection of a template, zone,
     * service offering, disk offering, and userdata associated to a name.
     */
    public function listBundles($args=array()) {
        return $this->request('listBundles', $args);
    }

    /**
     * Deploys a bundle as a new virtual machine.
     * @param array $args An associative array. The following are options for keys:
     *     bundle - the name of the bundle you want to deploy
     */
    public function deployBundle($args=array()) {
        if (empty($args['bundle']))
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'bundle'), MISSING_ARGUMENT);

        return $this->request('deployBundle', $args);
    }

    /**
     * Generates a url with a signature that can be used to load up the console
     * for a given vm.
     * @param integer id The id of the virtual machine to generate the url for
     * @param string $console_proxy_url The url of the console proxy. Usually does
     *    not need to be specified
     * @return string the url with signature to talk to the console proxy
     */
    public function getConsoleProxyUrl($id, $console_proxy_url=null) {
        $args = array();

        // Building the query
        $args['apikey'] = $this->apiKey;
        $args['cmd'] = 'access';
        $args['vm'] = $id;
        ksort($args);
        $query = http_build_query($args);
        $query = str_replace("+", "%20", $query);
        $query .= "&signature=" . $this->getSignature(strtolower($query));

        if($console_proxy_url == null) {
            // Usually the api endpoint is /client/api, but the console proxy
            // endpoint is /client/console. Instead of making a separate param
            // for that endpoint, chop it up ourselves to keep the config simple
            if(preg_match('/^(.+)\/api$/', $this->endpoint, $matches)) {
                $console_proxy_url = $matches[1] . '/console';
            } else {
                throw new Exception('Unable to formulate console proxy url based on api endpoint');
            }
        }

        $url = $console_proxy_url . "?" . $query;

        return $url;
    }
}

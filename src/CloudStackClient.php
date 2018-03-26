<?php

class CloudStackClient extends BaseCloudStackClient {

    /**
     * Creates a network offering.
     *
     * @param array $args An associative array. The following are options for keys:
     *     displaytext - the display text of the network offering
     *     guestiptype - guest type of the network offering: Shared or Isolated
     *     name - the name of the network offering
     *     supportedservices - services supported by the network offering
     *     traffictype - the traffic type for the network offering. Supported type in
     *        current release is GUEST only
     *     availability - the availability of network offering. Default value is
     *        Optional
     *     conservemode - true if the network offering is IP conserve mode enabled
     *     networkrate - data transfer rate in megabits per second allowed
     *     servicecapabilitylist - desired service capabilities as part of network
     *        offering
     *     serviceofferingid - the service offering ID used by virtual router provider
     *     serviceproviderlist - provider to service mapping. If not specified, the
     *        provider for the service will be mapped to the default provider on the physical
     *        network
     *     specifyipranges - true if network offering supports specifying ip ranges;
     *        defaulted to false if not specified
     *     specifyvlan - true if network offering supports vlans
     *     tags - the tags for the network offering.
     */
    public function createNetworkOffering($args=array()) {

        if (!isset($args['displaytext']) || strlen($args['displaytext']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'displaytext'), MISSING_ARGUMENT);

        if (!isset($args['guestiptype']) || strlen($args['guestiptype']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'guestiptype'), MISSING_ARGUMENT);

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        if (!isset($args['supportedservices']) || strlen($args['supportedservices']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'supportedservices'), MISSING_ARGUMENT);

        if (!isset($args['traffictype']) || strlen($args['traffictype']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'traffictype'), MISSING_ARGUMENT);

        return $this->request('createNetworkOffering', $args);
    }


    /**
     * Updates a network offering.
     *
     * @param array $args An associative array. The following are options for keys:
     *     availability - the availability of network offering. Default value is
     *        Required for Guest Virtual network offering; Optional for Guest Direct network
     *        offering
     *     displaytext - the display text of the network offering
     *     id - the id of the network offering
     *     name - the name of the network offering
     *     sortkey - sort key of the network offering, integer
     *     state - update state for the network offering
     */
    public function updateNetworkOffering($args=array()) {

        return $this->request('updateNetworkOffering', $args);
    }


    /**
     * Deletes a network offering.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the network offering
     */
    public function deleteNetworkOffering($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteNetworkOffering', $args);
    }


    /**
     * Lists all available network offerings.
     *
     * @param array $args An associative array. The following are options for keys:
     *     availability - the availability of network offering. Default value is
     *        Required
     *     displaytext - list network offerings by display text
     *     guestiptype - list network offerings by guest type: Shared or Isolated
     *     id - list network offerings by id
     *     isdefault - true if need to list only default network offerings. Default
     *        value is false
     *     istagged - true if offering has tags specified
     *     keyword - List by keyword
     *     name - list network offerings by name
     *     networkid - the ID of the network. Pass this in if you want to see the
     *        available network offering that a network can be changed to.
     *     page -
     *     pagesize -
     *     sourcenatsupported - true if need to list only netwok offerings where source
     *        nat is supported, false otherwise
     *     specifyipranges - true if need to list only network offerings which support
     *        specifying ip ranges
     *     specifyvlan - the tags for the network offering.
     *     state - list network offerings by state
     *     supportedservices - list network offerings supporting certain services
     *     tags - list network offerings by tags
     *     traffictype - list by traffic type
     *     zoneid - list netowrk offerings available for network creation in specific
     *        zone
     *     page - Pagination
     */
    public function listNetworkOfferings($args=array()) {

        return $this->request('listNetworkOfferings', $args);
    }


    /**
     * Creates a network
     *
     * @param array $args An associative array. The following are options for keys:
     *     displaytext - the display text of the network
     *     name - the name of the network
     *     networkofferingid - the network offering id
     *     zoneid - the Zone ID for the network
     *     account - account who will own the network
     *     acltype - Access control type; supported values are account and domain. In
     *        3.0 all shared networks should have aclType=Domain, and all Isolated networks -
     *        Account. Account means that only the account owner can use the network, domain -
     *        all accouns in the domain can use the network
     *     domainid - domain ID of the account owning a network
     *     endip - the ending IP address in the network IP range. If not specified,
     *        will be defaulted to startIP
     *     gateway - the gateway of the network
     *     netmask - the netmask of the network
     *     networkdomain - network domain
     *     physicalnetworkid - the Physical Network ID the network belongs to
     *     projectid - an optional project for the ssh key
     *     startip - the beginning IP address in the network IP range
     *     subdomainaccess - Defines whether to allow subdomains to use networks
     *        dedicated to their parent domain(s). Should be used with aclType=Domain,
     *        defaulted to allow.subdomain.network.access global config if not specified
     *     vlan - the ID or VID of the network
     */
    public function createNetwork($args=array()) {

        if (!isset($args['displaytext']) || strlen($args['displaytext']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'displaytext'), MISSING_ARGUMENT);

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        if (!isset($args['networkofferingid']) || strlen($args['networkofferingid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'networkofferingid'), MISSING_ARGUMENT);

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('createNetwork', $args);
    }


    /**
     * Deletes a network
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the network
     */
    public function deleteNetwork($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteNetwork', $args);
    }


    /**
     * Lists all available networks.
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     acltype - list networks by ACL (access control list) type. Supported values
     *        are Account and Domain
     *     domainid - list only resources belonging to the domain specified
     *     id - list networks by id
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     issystem - true if network is system, false otherwise
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     page -
     *     pagesize -
     *     physicalnetworkid - list networks by physical network id
     *     projectid - list firewall rules by project
     *     restartrequired - list network offerings by restartRequired option
     *     specifyipranges - true if need to list only networks which support
     *        specifying ip ranges
     *     supportedservices - list network offerings supporting certain services
     *     traffictype - type of the traffic
     *     type - the type of the network. Supported values are: Isolated and Shared
     *     zoneid - the Zone ID of the network
     *     page - Pagination
     */
    public function listNetworks($args=array()) {

        return $this->request('listNetworks', $args);
    }


    /**
     * Restarts the network; includes 1) restarting network elements - virtual routers,
     * dhcp servers 2) reapplying all public ips 3) reapplying
     * loadBalancing/portForwarding rules
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The id of the network to restart.
     *     cleanup - If cleanup old network elements
     */
    public function restartNetwork($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('restartNetwork', $args);
    }


    /**
     * Updates a network
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the network
     *     changecidr - Force update even if cidr type is different
     *     displaytext - the new display text for the network
     *     name - the new name for the network
     *     networkdomain - network domain
     *     networkofferingid - network offering ID
     */
    public function updateNetwork($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateNetwork', $args);
    }


    /**
     * Creates a physical network
     *
     * @param array $args An associative array. The following are options for keys:
     *     name - the name of the physical network
     *     zoneid - the Zone ID for the physical network
     *     broadcastdomainrange - the broadcast domain range for the physical
     *        network[Pod or Zone]. In Acton release it can be Zone only in Advance zone, and
     *        Pod in Basic
     *     domainid - domain ID of the account owning a physical network
     *     isolationmethods - the isolation method for the physical
     *        network[VLAN/L3/GRE]
     *     networkspeed - the speed for the physical network[1G/10G]
     *     tags - Tag the physical network
     *     vlan - the VLAN for the physical network
     */
    public function createPhysicalNetwork($args=array()) {

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('createPhysicalNetwork', $args);
    }


    /**
     * Deletes a Physical Network.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the Physical network
     */
    public function deletePhysicalNetwork($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deletePhysicalNetwork', $args);
    }


    /**
     * Lists physical networks
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - list physical network by id
     *     keyword - List by keyword
     *     name - search by name
     *     page -
     *     pagesize -
     *     zoneid - the Zone ID for the physical network
     *     page - Pagination
     */
    public function listPhysicalNetworks($args=array()) {

        return $this->request('listPhysicalNetworks', $args);
    }


    /**
     * Updates a physical network
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - physical network id
     *     networkspeed - the speed for the physical network[1G/10G]
     *     state - Enabled/Disabled
     *     tags - Tag the physical network
     *     vlan - the VLAN for the physical network
     */
    public function updatePhysicalNetwork($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updatePhysicalNetwork', $args);
    }


    /**
     * Lists all network services provided by CloudStack or for the given Provider.
     *
     * @param array $args An associative array. The following are options for keys:
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     provider - network service provider name
     *     service - network service name to list providers and capabilities of
     *     page - Pagination
     */
    public function listSupportedNetworkServices($args=array()) {

        return $this->request('listSupportedNetworkServices', $args);
    }


    /**
     * Adds a network serviceProvider to a physical network
     *
     * @param array $args An associative array. The following are options for keys:
     *     name - the name for the physical network service provider
     *     physicalnetworkid - the Physical Network ID to add the provider to
     *     destinationphysicalnetworkid - the destination Physical Network ID to bridge
     *        to
     *     servicelist - the list of services to be enabled for this physical network
     *        service provider
     */
    public function addNetworkServiceProvider($args=array()) {

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        if (!isset($args['physicalnetworkid']) || strlen($args['physicalnetworkid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'physicalnetworkid'), MISSING_ARGUMENT);

        return $this->request('addNetworkServiceProvider', $args);
    }


    /**
     * Deletes a Network Service Provider.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the network service provider
     */
    public function deleteNetworkServiceProvider($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteNetworkServiceProvider', $args);
    }


    /**
     * Lists network serviceproviders for a given physical network.
     *
     * @param array $args An associative array. The following are options for keys:
     *     keyword - List by keyword
     *     name - list providers by name
     *     page -
     *     pagesize -
     *     physicalnetworkid - the Physical Network ID
     *     state - list providers by state
     *     page - Pagination
     */
    public function listNetworkServiceProviders($args=array()) {

        return $this->request('listNetworkServiceProviders', $args);
    }


    /**
     * Updates a network serviceProvider of a physical network
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - network service provider id
     *     servicelist - the list of services to be enabled for this physical network
     *        service provider
     *     state - Enabled/Disabled/Shutdown the physical network service provider
     */
    public function updateNetworkServiceProvider($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateNetworkServiceProvider', $args);
    }


    /**
     * Creates a Storage network IP range.
     *
     * @param array $args An associative array. The following are options for keys:
     *     gateway - the gateway for storage network
     *     netmask - the netmask for storage network
     *     podid - UUID of pod where the ip range belongs to
     *     startip - the beginning IP address
     *     endip - the ending IP address
     *     vlan - Optional. The vlan the ip range sits on, default to Null when it is
     *        not specificed which means you network is not on any Vlan. This is mainly for
     *        Vmware as other hypervisors can directly reterive bridge from pyhsical network
     *        traffic type table
     */
    public function createStorageNetworkIpRange($args=array()) {

        if (!isset($args['gateway']) || strlen($args['gateway']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'gateway'), MISSING_ARGUMENT);

        if (!isset($args['netmask']) || strlen($args['netmask']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'netmask'), MISSING_ARGUMENT);

        if (!isset($args['podid']) || strlen($args['podid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'podid'), MISSING_ARGUMENT);

        if (!isset($args['startip']) || strlen($args['startip']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'startip'), MISSING_ARGUMENT);

        return $this->request('createStorageNetworkIpRange', $args);
    }


    /**
     * Deletes a storage network IP Range.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the uuid of the storage network ip range
     */
    public function deleteStorageNetworkIpRange($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteStorageNetworkIpRange', $args);
    }


    /**
     * List a storage network IP range.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - optional parameter. Storaget network IP range uuid, if specicied, using
     *        it to search the range.
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     podid - optional parameter. Pod uuid, if specicied and range uuid is absent,
     *        using it to search the range.
     *     zoneid - optional parameter. Zone uuid, if specicied and both pod uuid and
     *        range uuid are absent, using it to search the range.
     *     page - Pagination
     */
    public function listStorageNetworkIpRange($args=array()) {

        return $this->request('listStorageNetworkIpRange', $args);
    }


    /**
     * Update a Storage network IP range, only allowed when no IPs in this range have
     * been allocated.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - UUID of storage network ip range
     *     endip - the ending IP address
     *     netmask - the netmask for storage network
     *     startip - the beginning IP address
     *     vlan - Optional. the vlan the ip range sits on
     */
    public function updateStorageNetworkIpRange($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateStorageNetworkIpRange', $args);
    }


    /**
     * Adds a network device of one of the following types: ExternalDhcp,
     * ExternalFirewall, ExternalLoadBalancer, PxeServer
     *
     * @param array $args An associative array. The following are options for keys:
     *     networkdeviceparameterlist - parameters for network device
     *     networkdevicetype - Network device type, now supports ExternalDhcp,
     *        PxeServer, NetscalerMPXLoadBalancer, NetscalerVPXLoadBalancer,
     *        NetscalerSDXLoadBalancer, F5BigIpLoadBalancer, JuniperSRXFirewall
     */
    public function addNetworkDevice($args=array()) {

        return $this->request('addNetworkDevice', $args);
    }


    /**
     * List network devices
     *
     * @param array $args An associative array. The following are options for keys:
     *     keyword - List by keyword
     *     networkdeviceparameterlist - parameters for network device
     *     networkdevicetype - Network device type, now supports ExternalDhcp,
     *        PxeServer, NetscalerMPXLoadBalancer, NetscalerVPXLoadBalancer,
     *        NetscalerSDXLoadBalancer, F5BigIpLoadBalancer, JuniperSRXFirewall
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listNetworkDevice($args=array()) {

        return $this->request('listNetworkDevice', $args);
    }


    /**
     * Deletes network device.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - Id of network device to delete
     */
    public function deleteNetworkDevice($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteNetworkDevice', $args);
    }


    /**
     * lists network that are using a F5 load balancer device
     *
     * @param array $args An associative array. The following are options for keys:
     *     lbdeviceid - f5 load balancer device ID
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listF5LoadBalancerNetworks($args=array()) {

        if (!isset($args['lbdeviceid']) || strlen($args['lbdeviceid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'lbdeviceid'), MISSING_ARGUMENT);

        return $this->request('listF5LoadBalancerNetworks', $args);
    }


    /**
     * lists network that are using SRX firewall device
     *
     * @param array $args An associative array. The following are options for keys:
     *     lbdeviceid - netscaler load balancer device ID
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listSrxFirewallNetworks($args=array()) {

        if (!isset($args['lbdeviceid']) || strlen($args['lbdeviceid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'lbdeviceid'), MISSING_ARGUMENT);

        return $this->request('listSrxFirewallNetworks', $args);
    }


    /**
     * lists network that are using a netscaler load balancer device
     *
     * @param array $args An associative array. The following are options for keys:
     *     lbdeviceid - netscaler load balancer device ID
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listNetscalerLoadBalancerNetworks($args=array()) {

        if (!isset($args['lbdeviceid']) || strlen($args['lbdeviceid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'lbdeviceid'), MISSING_ARGUMENT);

        return $this->request('listNetscalerLoadBalancerNetworks', $args);
    }


    /**
     * Creates a load balancer rule
     *
     * @param array $args An associative array. The following are options for keys:
     *     algorithm - load balancer algorithm (source, roundrobin, leastconn)
     *     name - name of the load balancer rule
     *     privateport - the private port of the private ip address/virtual machine
     *        where the network traffic will be load balanced to
     *     publicport - the public port from where the network traffic will be load
     *        balanced from
     *     account - the account associated with the load balancer. Must be used with
     *        the domainId parameter.
     *     cidrlist - the cidr list to forward traffic from
     *     description - the description of the load balancer rule
     *     domainid - the domain ID associated with the load balancer
     *     networkid - The guest network this rule will be created for
     *     openfirewall - if true, firewall rule for source/end pubic port is
     *        automatically created; if false - firewall rule has to be created explicitely.
     *        Has value true by default
     *     publicipid - public ip address id from where the network traffic will be
     *        load balanced from
     *     zoneid - zone where the load balancer is going to be created. This parameter
     *        is required when LB service provider is ElasticLoadBalancerVm
     */
    public function createLoadBalancerRule($args=array()) {

        if (!isset($args['algorithm']) || strlen($args['algorithm']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'algorithm'), MISSING_ARGUMENT);

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        if (!isset($args['privateport']) || strlen($args['privateport']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'privateport'), MISSING_ARGUMENT);

        if (!isset($args['publicport']) || strlen($args['publicport']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'publicport'), MISSING_ARGUMENT);

        return $this->request('createLoadBalancerRule', $args);
    }


    /**
     * Deletes a load balancer rule.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the load balancer rule
     */
    public function deleteLoadBalancerRule($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteLoadBalancerRule', $args);
    }


    /**
     * Removes a virtual machine or a list of virtual machines from a load balancer
     * rule.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the load balancer rule
     *     virtualmachineids - the list of IDs of the virtual machines that are being
     *        removed from the load balancer rule (i.e. virtualMachineIds=1,2,3)
     */
    public function removeFromLoadBalancerRule($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        if (!isset($args['virtualmachineids']) || strlen($args['virtualmachineids']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'virtualmachineids'), MISSING_ARGUMENT);

        return $this->request('removeFromLoadBalancerRule', $args);
    }


    /**
     * Assigns virtual machine or a list of virtual machines to a load balancer rule.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the load balancer rule
     *     virtualmachineids - the list of IDs of the virtual machine that are being
     *        assigned to the load balancer rule(i.e. virtualMachineIds=1,2,3)
     */
    public function assignToLoadBalancerRule($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        if (!isset($args['virtualmachineids']) || strlen($args['virtualmachineids']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'virtualmachineids'), MISSING_ARGUMENT);

        return $this->request('assignToLoadBalancerRule', $args);
    }


    /**
     * Creates a Load Balancer stickiness policy
     *
     * @param array $args An associative array. The following are options for keys:
     *     lbruleid - the ID of the load balancer rule
     *     methodname - name of the LB Stickiness policy method, possible values can be
     *        obtained from ListNetworks API
     *     name - name of the LB Stickiness policy
     *     description - the description of the LB Stickiness policy
     *     param - param list. Example:
     *        param[0].name=cookiename&param[0].value=LBCookie
     */
    public function createLBStickinessPolicy($args=array()) {

        if (!isset($args['lbruleid']) || strlen($args['lbruleid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'lbruleid'), MISSING_ARGUMENT);

        if (!isset($args['methodname']) || strlen($args['methodname']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'methodname'), MISSING_ARGUMENT);

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        return $this->request('createLBStickinessPolicy', $args);
    }


    /**
     * Deletes a LB stickiness policy.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the LB stickiness policy
     */
    public function deleteLBStickinessPolicy($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteLBStickinessPolicy', $args);
    }


    /**
     * Lists load balancer rules.
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     id - the ID of the load balancer rule
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     name - the name of the load balancer rule
     *     page -
     *     pagesize -
     *     projectid - list firewall rules by project
     *     publicipid - the public IP address id of the load balancer rule
     *     virtualmachineid - the ID of the virtual machine of the load balancer rule
     *     zoneid - the availability zone ID
     *     page - Pagination
     */
    public function listLoadBalancerRules($args=array()) {

        return $this->request('listLoadBalancerRules', $args);
    }


    /**
     * Lists LBStickiness policies.
     *
     * @param array $args An associative array. The following are options for keys:
     *     lbruleid - the ID of the load balancer rule
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listLBStickinessPolicies($args=array()) {

        if (!isset($args['lbruleid']) || strlen($args['lbruleid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'lbruleid'), MISSING_ARGUMENT);

        return $this->request('listLBStickinessPolicies', $args);
    }


    /**
     * List all virtual machine instances that are assigned to a load balancer rule.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the load balancer rule
     *     applied - true if listing all virtual machines currently applied to the load
     *        balancer rule; default is true
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listLoadBalancerRuleInstances($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('listLoadBalancerRuleInstances', $args);
    }


    /**
     * Updates load balancer
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the id of the load balancer rule to update
     *     algorithm - load balancer algorithm (source, roundrobin, leastconn)
     *     description - the description of the load balancer rule
     *     name - the name of the load balancer rule
     */
    public function updateLoadBalancerRule($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateLoadBalancerRule', $args);
    }


    /**
     * Adds a F5 BigIP load balancer device
     *
     * @param array $args An associative array. The following are options for keys:
     *     networkdevicetype - supports only F5BigIpLoadBalancer
     *     password - Credentials to reach F5 BigIP load balancer device
     *     physicalnetworkid - the Physical Network ID
     *     url - URL of the F5 load balancer appliance.
     *     username - Credentials to reach F5 BigIP load balancer device
     */
    public function addF5LoadBalancer($args=array()) {

        if (!isset($args['networkdevicetype']) || strlen($args['networkdevicetype']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'networkdevicetype'), MISSING_ARGUMENT);

        if (!isset($args['password']) || strlen($args['password']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'password'), MISSING_ARGUMENT);

        if (!isset($args['physicalnetworkid']) || strlen($args['physicalnetworkid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'physicalnetworkid'), MISSING_ARGUMENT);

        if (!isset($args['url']) || strlen($args['url']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'url'), MISSING_ARGUMENT);

        if (!isset($args['username']) || strlen($args['username']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'username'), MISSING_ARGUMENT);

        return $this->request('addF5LoadBalancer', $args);
    }


    /**
     * configures a F5 load balancer device
     *
     * @param array $args An associative array. The following are options for keys:
     *     lbdeviceid - F5 load balancer device ID
     *     lbdevicecapacity - capacity of the device, Capacity will be interpreted as
     *        number of networks device can handle
     */
    public function configureF5LoadBalancer($args=array()) {

        if (!isset($args['lbdeviceid']) || strlen($args['lbdeviceid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'lbdeviceid'), MISSING_ARGUMENT);

        return $this->request('configureF5LoadBalancer', $args);
    }


    /**
     * delete a F5 load balancer device
     *
     * @param array $args An associative array. The following are options for keys:
     *     lbdeviceid - netscaler load balancer device ID
     */
    public function deleteF5LoadBalancer($args=array()) {

        if (!isset($args['lbdeviceid']) || strlen($args['lbdeviceid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'lbdeviceid'), MISSING_ARGUMENT);

        return $this->request('deleteF5LoadBalancer', $args);
    }


    /**
     * lists F5 load balancer devices
     *
     * @param array $args An associative array. The following are options for keys:
     *     keyword - List by keyword
     *     lbdeviceid - f5 load balancer device ID
     *     page -
     *     pagesize -
     *     physicalnetworkid - the Physical Network ID
     *     page - Pagination
     */
    public function listF5LoadBalancers($args=array()) {

        return $this->request('listF5LoadBalancers', $args);
    }


    /**
     * Adds a netscaler load balancer device
     *
     * @param array $args An associative array. The following are options for keys:
     *     networkdevicetype - Netscaler device type supports NetscalerMPXLoadBalancer,
     *        NetscalerVPXLoadBalancer, NetscalerSDXLoadBalancer
     *     password - Credentials to reach netscaler load balancer device
     *     physicalnetworkid - the Physical Network ID
     *     url - URL of the netscaler load balancer appliance.
     *     username - Credentials to reach netscaler load balancer device
     */
    public function addNetscalerLoadBalancer($args=array()) {

        if (!isset($args['networkdevicetype']) || strlen($args['networkdevicetype']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'networkdevicetype'), MISSING_ARGUMENT);

        if (!isset($args['password']) || strlen($args['password']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'password'), MISSING_ARGUMENT);

        if (!isset($args['physicalnetworkid']) || strlen($args['physicalnetworkid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'physicalnetworkid'), MISSING_ARGUMENT);

        if (!isset($args['url']) || strlen($args['url']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'url'), MISSING_ARGUMENT);

        if (!isset($args['username']) || strlen($args['username']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'username'), MISSING_ARGUMENT);

        return $this->request('addNetscalerLoadBalancer', $args);
    }


    /**
     * delete a netscaler load balancer device
     *
     * @param array $args An associative array. The following are options for keys:
     *     lbdeviceid - netscaler load balancer device ID
     */
    public function deleteNetscalerLoadBalancer($args=array()) {

        if (!isset($args['lbdeviceid']) || strlen($args['lbdeviceid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'lbdeviceid'), MISSING_ARGUMENT);

        return $this->request('deleteNetscalerLoadBalancer', $args);
    }


    /**
     * configures a netscaler load balancer device
     *
     * @param array $args An associative array. The following are options for keys:
     *     lbdeviceid - Netscaler load balancer device ID
     *     inline - true if netscaler load balancer is intended to be used in in-line
     *        with firewall, false if netscaler load balancer will side-by-side with firewall
     *     lbdevicecapacity - capacity of the device, Capacity will be interpreted as
     *        number of networks device can handle
     *     lbdevicededicated - true if this netscaler device to dedicated for a
     *        account, false if the netscaler device will be shared by multiple accounts
     */
    public function configureNetscalerLoadBalancer($args=array()) {

        if (!isset($args['lbdeviceid']) || strlen($args['lbdeviceid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'lbdeviceid'), MISSING_ARGUMENT);

        return $this->request('configureNetscalerLoadBalancer', $args);
    }


    /**
     * lists netscaler load balancer devices
     *
     * @param array $args An associative array. The following are options for keys:
     *     keyword - List by keyword
     *     lbdeviceid - netscaler load balancer device ID
     *     page -
     *     pagesize -
     *     physicalnetworkid - the Physical Network ID
     *     page - Pagination
     */
    public function listNetscalerLoadBalancers($args=array()) {

        return $this->request('listNetscalerLoadBalancers', $args);
    }


    /**
     * Creates and automatically starts a virtual machine based on a service offering,
     * disk offering, and template.
     *
     * @param array $args An associative array. The following are options for keys:
     *     serviceofferingid - the ID of the service offering for the virtual machine
     *     templateid - the ID of the template for the virtual machine
     *     zoneid - availability zone for the virtual machine
     *     account - an optional account for the virtual machine. Must be used with
     *        domainId.
     *     diskofferingid - the ID of the disk offering for the virtual machine. If the
     *        template is of ISO format, the diskOfferingId is for the root disk volume.
     *        Otherwise this parameter is used to indicate the offering for the data disk
     *        volume. If the templateId parameter passed is from a Template object, the
     *        diskOfferingId refers to a DATA Disk Volume created. If the templateId parameter
     *        passed is from an ISO object, the diskOfferingId refers to a ROOT Disk Volume
     *        created.
     *     displayname - an optional user generated name for the virtual machine
     *     domainid - an optional domainId for the virtual machine. If the account
     *        parameter is used, domainId must also be used.
     *     group - an optional group for the virtual machine
     *     hostid - destination Host ID to deploy the VM to - parameter available for
     *        root admin only
     *     hypervisor - the hypervisor on which to deploy the virtual machine
     *     ipaddress - the ip address for default vm's network
     *     iptonetworklist - ip to network mapping. Can't be specified with networkIds
     *        parameter. Example:
     *        iptonetworklist[0].ip=10.10.10.11&iptonetworklist[0].networkid=204 - requests to
     *        use ip 10.10.10.11 in network id=204
     *     keyboard - an optional keyboard device type for the virtual machine. valid
     *        value can be one of de,de-ch,es,fi,fr,fr-be,fr-ch,is,it,jp,nl-be,no,pt,uk,us
     *     keypair - name of the ssh key pair used to login to the virtual machine
     *     name - host name for the virtual machine
     *     networkids - list of network ids used by virtual machine. Can't be specified
     *        with ipToNetworkList parameter
     *     projectid - Deploy vm for the project
     *     securitygroupids - comma separated list of security groups id that going to
     *        be applied to the virtual machine. Should be passed only when vm is created from
     *        a zone with Basic Network support. Mutually exclusive with securitygroupnames
     *        parameter
     *     securitygroupnames - comma separated list of security groups names that
     *        going to be applied to the virtual machine. Should be passed only when vm is
     *        created from a zone with Basic Network support. Mutually exclusive with
     *        securitygroupids parameter
     *     size - the arbitrary size for the DATADISK volume. Mutually exclusive with
     *        diskOfferingId
     *     userdata - an optional binary data that can be sent to the virtual machine
     *        upon a successful deployment. This binary data must be base64 encoded before
     *        adding it to the request. Currently only HTTP GET is supported. Using HTTP GET
     *        (via querystring), you can send up to 2KB of data after base64 encoding.
     */
    public function deployVirtualMachine($args=array()) {

        if (!isset($args['serviceofferingid']) || strlen($args['serviceofferingid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'serviceofferingid'), MISSING_ARGUMENT);

        if (!isset($args['templateid']) || strlen($args['templateid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'templateid'), MISSING_ARGUMENT);

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('deployVirtualMachine', $args);
    }


    /**
     * Destroys a virtual machine. Once destroyed, only the administrator can recover
     * it.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the virtual machine
     */
    public function destroyVirtualMachine($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('destroyVirtualMachine', $args);
    }


    /**
     * Reboots a virtual machine.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the virtual machine
     */
    public function rebootVirtualMachine($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('rebootVirtualMachine', $args);
    }


    /**
     * Starts a virtual machine.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the virtual machine
     */
    public function startVirtualMachine($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('startVirtualMachine', $args);
    }


    /**
     * Stops a virtual machine.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the virtual machine
     *     forced - Force stop the VM.  The caller knows the VM is stopped.
     */
    public function stopVirtualMachine($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('stopVirtualMachine', $args);
    }


    /**
     * Resets the password for virtual machine. The virtual machine must be in a
     * "Stopped" state and the template must already support this feature for this
     * command to take effect. [async]
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the virtual machine
     */
    public function resetPasswordForVirtualMachine($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('resetPasswordForVirtualMachine', $args);
    }


    /**
     * Changes the service offering for a virtual machine. The virtual machine must be
     * in a "Stopped" state for this command to take effect.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the virtual machine
     *     serviceofferingid - the service offering ID to apply to the virtual machine
     */
    public function changeServiceForVirtualMachine($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        if (!isset($args['serviceofferingid']) || strlen($args['serviceofferingid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'serviceofferingid'), MISSING_ARGUMENT);

        return $this->request('changeServiceForVirtualMachine', $args);
    }


    /**
     * Updates parameters of a virtual machine.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the virtual machine
     *     displayname - user generated name
     *     group - group of the virtual machine
     *     haenable - true if high-availability is enabled for the virtual machine,
     *        false otherwise
     *     ostypeid - the ID of the OS type that best represents this VM.
     *     userdata - an optional binary data that can be sent to the virtual machine
     *        upon a successful deployment. This binary data must be base64 encoded before
     *        adding it to the request. Currently only HTTP GET is supported. Using HTTP GET
     *        (via querystring), you can send up to 2KB of data after base64 encoding.
     */
    public function updateVirtualMachine($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateVirtualMachine', $args);
    }


    /**
     * Recovers a virtual machine.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the virtual machine
     */
    public function recoverVirtualMachine($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('recoverVirtualMachine', $args);
    }


    /**
     * List the virtual machines owned by the account.
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     details - comma separated list of host details requested, value can be a
     *        list of [all, group, nics, stats, secgrp, tmpl, servoff, iso, volume, min]. If
     *        no parameter is passed in, the details will be defaulted to all
     *     domainid - list only resources belonging to the domain specified
     *     forvirtualnetwork - list by network type; true if need to list vms using
     *        Virtual Network, false otherwise
     *     groupid - the group ID
     *     hostid - the host ID
     *     hypervisor - the target hypervisor for the template
     *     id - the ID of the virtual machine
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     name - name of the virtual machine
     *     networkid - list by network id
     *     page -
     *     pagesize -
     *     podid - the pod ID
     *     projectid - list firewall rules by project
     *     state - state of the virtual machine
     *     storageid - the storage ID where vm's volumes belong to
     *     zoneid - the availability zone ID
     *     page - Pagination
     */
    public function listVirtualMachines($args=array()) {

        return $this->request('listVirtualMachines', $args);
    }


    /**
     * Returns an encrypted password for the VM
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the virtual machine
     */
    public function getVMPassword($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('getVMPassword', $args);
    }


    /**
     * Attempts Migration of a VM to a different host or Root volume of the vm to a
     * different storage pool
     *
     * @param array $args An associative array. The following are options for keys:
     *     virtualmachineid - the ID of the virtual machine
     *     hostid - Destination Host ID to migrate VM to. Required for live migrating a
     *        VM from host to host
     *     storageid - Destination storage pool ID to migrate VM volumes to. Required
     *        for migrating the root disk volume
     */
    public function migrateVirtualMachine($args=array()) {

        if (!isset($args['virtualmachineid']) || strlen($args['virtualmachineid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'virtualmachineid'), MISSING_ARGUMENT);

        return $this->request('migrateVirtualMachine', $args);
    }


    /**
     * Move a user VM to another user under same domain.
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - account name of the new VM owner.
     *     domainid - domain id of the new VM owner.
     *     virtualmachineid - the vm ID of the user VM to be moved
     *     networkids - list of network ids that will be part of VM network after move
     *        in advanced network setting.
     *     securitygroupids - comma separated list of security groups id that going to
     *        be applied to the virtual machine. Should be passed only when vm is moved in a
     *        zone with Basic Network support.
     */
    public function assignVirtualMachine($args=array()) {

        if (!isset($args['account']) || strlen($args['account']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'account'), MISSING_ARGUMENT);

        if (!isset($args['domainid']) || strlen($args['domainid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'domainid'), MISSING_ARGUMENT);

        if (!isset($args['virtualmachineid']) || strlen($args['virtualmachineid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'virtualmachineid'), MISSING_ARGUMENT);

        return $this->request('assignVirtualMachine', $args);
    }


    /**
     * Restore a VM to original template or specific snapshot
     *
     * @param array $args An associative array. The following are options for keys:
     *     virtualmachineid - Virtual Machine ID
     */
    public function restoreVirtualMachine($args=array()) {

        if (!isset($args['virtualmachineid']) || strlen($args['virtualmachineid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'virtualmachineid'), MISSING_ARGUMENT);

        return $this->request('restoreVirtualMachine', $args);
    }


    /**
     * Adds traffic type to a physical network
     *
     * @param array $args An associative array. The following are options for keys:
     *     physicalnetworkid - the Physical Network ID
     *     traffictype - the trafficType to be added to the physical network
     *     kvmnetworklabel - The network name label of the physical device dedicated to
     *        this traffic on a KVM host
     *     vlan - The VLAN id to be used for Management traffic by VMware host
     *     vmwarenetworklabel - The network name label of the physical device dedicated
     *        to this traffic on a VMware host
     *     xennetworklabel - The network name label of the physical device dedicated to
     *        this traffic on a XenServer host
     */
    public function addTrafficType($args=array()) {

        if (!isset($args['physicalnetworkid']) || strlen($args['physicalnetworkid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'physicalnetworkid'), MISSING_ARGUMENT);

        if (!isset($args['traffictype']) || strlen($args['traffictype']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'traffictype'), MISSING_ARGUMENT);

        return $this->request('addTrafficType', $args);
    }


    /**
     * Deletes traffic type of a physical network
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - traffic type id
     */
    public function deleteTrafficType($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteTrafficType', $args);
    }


    /**
     * Lists traffic types of a given physical network.
     *
     * @param array $args An associative array. The following are options for keys:
     *     physicalnetworkid - the Physical Network ID
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listTrafficTypes($args=array()) {

        if (!isset($args['physicalnetworkid']) || strlen($args['physicalnetworkid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'physicalnetworkid'), MISSING_ARGUMENT);

        return $this->request('listTrafficTypes', $args);
    }


    /**
     * Updates traffic type of a physical network
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - traffic type id
     *     kvmnetworklabel - The network name label of the physical device dedicated to
     *        this traffic on a KVM host
     *     vmwarenetworklabel - The network name label of the physical device dedicated
     *        to this traffic on a VMware host
     *     xennetworklabel - The network name label of the physical device dedicated to
     *        this traffic on a XenServer host
     */
    public function updateTrafficType($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateTrafficType', $args);
    }


    /**
     * Lists implementors of implementor of a network traffic type or implementors of
     * all network traffic types
     *
     * @param array $args An associative array. The following are options for keys:
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     traffictype - Optional. The network traffic type, if specified, return its
     *        implementor. Otherwise, return all traffic types with their implementor
     *     page - Pagination
     */
    public function listTrafficTypeImplementors($args=array()) {

        return $this->request('listTrafficTypeImplementors', $args);
    }


    /**
     * Generates usage records. This will generate records only if there any records to
     * be generated, i.e if the scheduled usage job was not run or failed
     *
     * @param array $args An associative array. The following are options for keys:
     *     enddate - End date range for usage record query. Use yyyy-MM-dd as the date
     *        format, e.g. startDate=2009-06-03.
     *     startdate - Start date range for usage record query. Use yyyy-MM-dd as the
     *        date format, e.g. startDate=2009-06-01.
     *     domainid - List events for the specified domain.
     */
    public function generateUsageRecords($args=array()) {

        if (!isset($args['enddate']) || strlen($args['enddate']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'enddate'), MISSING_ARGUMENT);

        if (!isset($args['startdate']) || strlen($args['startdate']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'startdate'), MISSING_ARGUMENT);

        return $this->request('generateUsageRecords', $args);
    }


    /**
     * Lists usage records for accounts
     *
     * @param array $args An associative array. The following are options for keys:
     *     enddate - End date range for usage record query. Use yyyy-MM-dd as the date
     *        format, e.g. startDate=2009-06-03.
     *     startdate - Start date range for usage record query. Use yyyy-MM-dd as the
     *        date format, e.g. startDate=2009-06-01.
     *     account - List usage records for the specified user.
     *     accountid - List usage records for the specified account
     *     domainid - List usage records for the specified domain.
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     projectid - List usage records for specified project
     *     type - List usage records for the specified usage type
     *     page - Pagination
     */
    public function listUsageRecords($args=array()) {

        if (!isset($args['enddate']) || strlen($args['enddate']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'enddate'), MISSING_ARGUMENT);

        if (!isset($args['startdate']) || strlen($args['startdate']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'startdate'), MISSING_ARGUMENT);

        return $this->request('listUsageRecords', $args);
    }


    /**
     * List Usage Types
     *
     * @param array $args An associative array. The following are options for keys:
     *     page - Pagination
     */
    public function listUsageTypes($args=array()) {

        return $this->request('listUsageTypes', $args);
    }


    /**
     * Adds Traffic Monitor Host for Direct Network Usage
     *
     * @param array $args An associative array. The following are options for keys:
     *     url - URL of the traffic monitor Host
     *     zoneid - Zone in which to add the external firewall appliance.
     */
    public function addTrafficMonitor($args=array()) {

        if (!isset($args['url']) || strlen($args['url']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'url'), MISSING_ARGUMENT);

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('addTrafficMonitor', $args);
    }


    /**
     * Deletes an traffic monitor host.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - Id of the Traffic Monitor Host.
     */
    public function deleteTrafficMonitor($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteTrafficMonitor', $args);
    }


    /**
     * List traffic monitor Hosts.
     *
     * @param array $args An associative array. The following are options for keys:
     *     zoneid - zone Id
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listTrafficMonitors($args=array()) {

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('listTrafficMonitors', $args);
    }


    /**
     * Attaches a disk volume to a virtual machine.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the disk volume
     *     virtualmachineid - the ID of the virtual machine
     *     deviceid - the ID of the device to map the volume to within the guest OS. If
     *        no deviceId is passed in, the next available deviceId will be chosen. Possible
     *        values for a Linux OS are:* 1 - /dev/xvdb* 2 - /dev/xvdc* 4 - /dev/xvde* 5 -
     *        /dev/xvdf* 6 - /dev/xvdg* 7 - /dev/xvdh* 8 - /dev/xvdi* 9 - /dev/xvdj
     */
    public function attachVolume($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        if (!isset($args['virtualmachineid']) || strlen($args['virtualmachineid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'virtualmachineid'), MISSING_ARGUMENT);

        return $this->request('attachVolume', $args);
    }


    /**
     * Detaches a disk volume from a virtual machine.
     *
     * @param array $args An associative array. The following are options for keys:
     *     deviceid - the device ID on the virtual machine where volume is detached
     *        from
     *     id - the ID of the disk volume
     *     virtualmachineid - the ID of the virtual machine where the volume is
     *        detached from
     */
    public function detachVolume($args=array()) {

        return $this->request('detachVolume', $args);
    }


    /**
     * Creates a disk volume from a disk offering. This disk volume must still be
     * attached to a virtual machine to make use of it.
     *
     * @param array $args An associative array. The following are options for keys:
     *     name - the name of the disk volume
     *     account - the account associated with the disk volume. Must be used with the
     *        domainId parameter.
     *     diskofferingid - the ID of the disk offering. Either diskOfferingId or
     *        snapshotId must be passed in.
     *     domainid - the domain ID associated with the disk offering. If used with the
     *        account parameter returns the disk volume associated with the account for the
     *        specified domain.
     *     projectid - the project associated with the volume. Mutually exclusive with
     *        account parameter
     *     size - Arbitrary volume size
     *     snapshotid - the snapshot ID for the disk volume. Either diskOfferingId or
     *        snapshotId must be passed in.
     *     zoneid - the ID of the availability zone
     */
    public function createVolume($args=array()) {

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        return $this->request('createVolume', $args);
    }


    /**
     * Deletes a detached disk volume.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the disk volume
     */
    public function deleteVolume($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteVolume', $args);
    }


    /**
     * Lists all volumes.
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     hostid - list volumes on specified host
     *     id - the ID of the disk volume
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     name - the name of the disk volume
     *     page -
     *     pagesize -
     *     podid - the pod id the disk volume belongs to
     *     projectid - list firewall rules by project
     *     type - the type of disk volume
     *     virtualmachineid - the ID of the virtual machine
     *     zoneid - the ID of the availability zone
     *     page - Pagination
     */
    public function listVolumes($args=array()) {

        return $this->request('listVolumes', $args);
    }


    /**
     * Extracts volume
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the volume
     *     mode - the mode of extraction - HTTP_DOWNLOAD or FTP_UPLOAD
     *     zoneid - the ID of the zone where the volume is located
     *     url - the url to which the volume would be extracted
     */
    public function extractVolume($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        if (!isset($args['mode']) || strlen($args['mode']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'mode'), MISSING_ARGUMENT);

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('extractVolume', $args);
    }


    /**
     * Migrate volume
     *
     * @param array $args An associative array. The following are options for keys:
     *     storageid - destination storage pool ID to migrate the volume to
     *     volumeid - the ID of the volume
     */
    public function migrateVolume($args=array()) {

        if (!isset($args['storageid']) || strlen($args['storageid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'storageid'), MISSING_ARGUMENT);

        if (!isset($args['volumeid']) || strlen($args['volumeid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'volumeid'), MISSING_ARGUMENT);

        return $this->request('migrateVolume', $args);
    }


    /**
     * Create a volume
     *
     * @param array $args An associative array. The following are options for keys:
     *     aggregatename - aggregate name.
     *     ipaddress - ip address.
     *     password - password.
     *     poolname - pool name.
     *     size - volume size.
     *     username - user name.
     *     volumename - volume name.
     *     snapshotpolicy - snapshot policy.
     *     snapshotreservation - snapshot reservation.
     */
    public function createVolumeOnFiler($args=array()) {

        if (!isset($args['aggregatename']) || strlen($args['aggregatename']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'aggregatename'), MISSING_ARGUMENT);

        if (!isset($args['ipaddress']) || strlen($args['ipaddress']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'ipaddress'), MISSING_ARGUMENT);

        if (!isset($args['password']) || strlen($args['password']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'password'), MISSING_ARGUMENT);

        if (!isset($args['poolname']) || strlen($args['poolname']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'poolname'), MISSING_ARGUMENT);

        if (!isset($args['size']) || strlen($args['size']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'size'), MISSING_ARGUMENT);

        if (!isset($args['username']) || strlen($args['username']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'username'), MISSING_ARGUMENT);

        if (!isset($args['volumename']) || strlen($args['volumename']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'volumename'), MISSING_ARGUMENT);

        return $this->request('createVolumeOnFiler', $args);
    }


    /**
     * Destroy a Volume
     *
     * @param array $args An associative array. The following are options for keys:
     *     aggregatename - aggregate name.
     *     ipaddress - ip address.
     *     volumename - volume name.
     */
    public function destroyVolumeOnFiler($args=array()) {

        if (!isset($args['aggregatename']) || strlen($args['aggregatename']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'aggregatename'), MISSING_ARGUMENT);

        if (!isset($args['ipaddress']) || strlen($args['ipaddress']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'ipaddress'), MISSING_ARGUMENT);

        if (!isset($args['volumename']) || strlen($args['volumename']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'volumename'), MISSING_ARGUMENT);

        return $this->request('destroyVolumeOnFiler', $args);
    }


    /**
     * List Volumes
     *
     * @param array $args An associative array. The following are options for keys:
     *     poolname - pool name.
     *     page - Pagination
     */
    public function listVolumesOnFiler($args=array()) {

        if (!isset($args['poolname']) || strlen($args['poolname']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'poolname'), MISSING_ARGUMENT);

        return $this->request('listVolumesOnFiler', $args);
    }


    /**
     * Creates a user for an account that already exists
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - Creates the user under the specified account. If no account is
     *        specified, the username will be used as the account name.
     *     email - email
     *     firstname - firstname
     *     lastname - lastname
     *     password - Hashed password (Default is MD5). If you wish to use any other
     *        hashing algorithm, you would need to write a custom authentication adapter See
     *        Docs section.
     *     username - Unique username.
     *     domainid - Creates the user under the specified domain. Has to be
     *        accompanied with the account parameter
     *     timezone - Specifies a timezone for this command. For more information on
     *        the timezone parameter, see Time Zone Format.
     */
    public function createUser($args=array()) {

        if (!isset($args['account']) || strlen($args['account']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'account'), MISSING_ARGUMENT);

        if (!isset($args['email']) || strlen($args['email']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'email'), MISSING_ARGUMENT);

        if (!isset($args['firstname']) || strlen($args['firstname']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'firstname'), MISSING_ARGUMENT);

        if (!isset($args['lastname']) || strlen($args['lastname']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'lastname'), MISSING_ARGUMENT);

        if (!isset($args['password']) || strlen($args['password']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'password'), MISSING_ARGUMENT);

        if (!isset($args['username']) || strlen($args['username']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'username'), MISSING_ARGUMENT);

        return $this->request('createUser', $args);
    }


    /**
     * Creates a user for an account
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - Deletes a user
     */
    public function deleteUser($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteUser', $args);
    }


    /**
     * Updates a user account
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - User id
     *     email - email
     *     firstname - first name
     *     lastname - last name
     *     password - Hashed password (default is MD5). If you wish to use any other
     *        hasing algorithm, you would need to write a custom authentication adapter
     *     timezone - Specifies a timezone for this command. For more information on
     *        the timezone parameter, see Time Zone Format.
     *     userapikey - The API key for the user. Must be specified with userSecretKey
     *     username - Unique username
     *     usersecretkey - The secret key for the user. Must be specified with
     *        userApiKey
     */
    public function updateUser($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateUser', $args);
    }


    /**
     * Lists user accounts
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     accounttype - List users by account type. Valid types include admin,
     *        domain-admin, read-only-admin, or user.
     *     domainid - list only resources belonging to the domain specified
     *     id - List user by ID.
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     page -
     *     pagesize -
     *     state - List users by state of the user account.
     *     username - List user by the username
     *     page - Pagination
     */
    public function listUsers($args=array()) {

        return $this->request('listUsers', $args);
    }


    /**
     * Disables a user account
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - Disables user by user ID.
     */
    public function disableUser($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('disableUser', $args);
    }


    /**
     * Enables a user account
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - Enables user by user ID.
     */
    public function enableUser($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('enableUser', $args);
    }


    /**
     * This command allows a user to register for the developer API, returning a secret
     * key and an API key. This request is made through the integration API port, so it
     * is a privileged command and must be made on behalf of a user. It is up to the
     * implementer just how the username and password are entered, and then how that
     * translates to an integration API request. Both secret key and API key should be
     * returned to the user
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - User id
     */
    public function registerUserKeys($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('registerUserKeys', $args);
    }


    /**
     * Adds vpn users
     *
     * @param array $args An associative array. The following are options for keys:
     *     password - password for the username
     *     username - username for the vpn user
     *     account - an optional account for the vpn user. Must be used with domainId.
     *     domainid - an optional domainId for the vpn user. If the account parameter
     *        is used, domainId must also be used.
     *     projectid - add vpn user to the specific project
     */
    public function addVpnUser($args=array()) {

        if (!isset($args['password']) || strlen($args['password']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'password'), MISSING_ARGUMENT);

        if (!isset($args['username']) || strlen($args['username']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'username'), MISSING_ARGUMENT);

        return $this->request('addVpnUser', $args);
    }


    /**
     * Removes vpn user
     *
     * @param array $args An associative array. The following are options for keys:
     *     username - username for the vpn user
     *     account - an optional account for the vpn user. Must be used with domainId.
     *     domainid - an optional domainId for the vpn user. If the account parameter
     *        is used, domainId must also be used.
     *     projectid - remove vpn user from the project
     */
    public function removeVpnUser($args=array()) {

        if (!isset($args['username']) || strlen($args['username']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'username'), MISSING_ARGUMENT);

        return $this->request('removeVpnUser', $args);
    }


    /**
     * Lists vpn users
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     id - the ID of the vpn user
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     page -
     *     pagesize -
     *     projectid - list firewall rules by project
     *     username - the username of the vpn user.
     *     page - Pagination
     */
    public function listVpnUsers($args=array()) {

        return $this->request('listVpnUsers', $args);
    }


    /**
     * Creates a template of a virtual machine. The virtual machine must be in a
     * STOPPED state. A template created from this command is automatically designated
     * as a private template visible to the account that created it.
     *
     * @param array $args An associative array. The following are options for keys:
     *     displaytext - the display text of the template. This is usually used for
     *        display purposes.
     *     name - the name of the template
     *     ostypeid - the ID of the OS Type that best represents the OS of this
     *        template.
     *     bits - 32 or 64 bit
     *     details - Template details in key/value pairs.
     *     isfeatured - true if this template is a featured template, false otherwise
     *     ispublic - true if this template is a public template, false otherwise
     *     passwordenabled - true if the template supports the password reset feature;
     *        default is false
     *     requireshvm - true if the template requres HVM, false otherwise
     *     snapshotid - the ID of the snapshot the template is being created from.
     *        Either this parameter, or volumeId has to be passed in
     *     templatetag - the tag for this template.
     *     url - Optional, only for baremetal hypervisor. The directory name where
     *        template stored on CIFS server
     *     virtualmachineid - Optional, VM ID. If this presents, it is going to create
     *        a baremetal template for VM this ID refers to. This is only for VM whose
     *        hypervisor type is BareMetal
     *     volumeid - the ID of the disk volume the template is being created from.
     *        Either this parameter, or snapshotId has to be passed in
     */
    public function createTemplate($args=array()) {

        if (!isset($args['displaytext']) || strlen($args['displaytext']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'displaytext'), MISSING_ARGUMENT);

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        if (!isset($args['ostypeid']) || strlen($args['ostypeid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'ostypeid'), MISSING_ARGUMENT);

        return $this->request('createTemplate', $args);
    }


    /**
     * Registers an existing template into the Cloud.com cloud.
     *
     * @param array $args An associative array. The following are options for keys:
     *     displaytext - the display text of the template. This is usually used for
     *        display purposes.
     *     format - the format for the template. Possible values include QCOW2, RAW,
     *        and VHD.
     *     hypervisor - the target hypervisor for the template
     *     name - the name of the template
     *     ostypeid - the ID of the OS Type that best represents the OS of this
     *        template.
     *     url - the URL of where the template is hosted. Possible URL include http://
     *        and https://
     *     zoneid - the ID of the zone the template is to be hosted on
     *     account - an optional accountName. Must be used with domainId.
     *     bits - 32 or 64 bits support. 64 by default
     *     checksum - the MD5 checksum value of this template
     *     details - Template details in key/value pairs.
     *     domainid - an optional domainId. If the account parameter is used, domainId
     *        must also be used.
     *     isextractable - true if the template or its derivatives are extractable;
     *        default is false
     *     isfeatured - true if this template is a featured template, false otherwise
     *     ispublic - true if the template is available to all accounts; default is
     *        true
     *     passwordenabled - true if the template supports the password reset feature;
     *        default is false
     *     projectid - Register template for the project
     *     requireshvm - true if this template requires HVM
     *     sshkeyenabled - true if the template supports the sshkey upload feature;
     *        default is false
     *     templatetag - the tag for this template.
     */
    public function registerTemplate($args=array()) {

        if (!isset($args['displaytext']) || strlen($args['displaytext']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'displaytext'), MISSING_ARGUMENT);

        if (!isset($args['format']) || strlen($args['format']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'format'), MISSING_ARGUMENT);

        if (!isset($args['hypervisor']) || strlen($args['hypervisor']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'hypervisor'), MISSING_ARGUMENT);

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        if (!isset($args['ostypeid']) || strlen($args['ostypeid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'ostypeid'), MISSING_ARGUMENT);

        if (!isset($args['url']) || strlen($args['url']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'url'), MISSING_ARGUMENT);

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('registerTemplate', $args);
    }


    /**
     * Updates attributes of a template.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the image file
     *     bootable - true if image is bootable, false otherwise
     *     displaytext - the display text of the image
     *     format - the format for the image
     *     name - the name of the image file
     *     ostypeid - the ID of the OS type that best represents the OS of this image.
     *     passwordenabled - true if the image supports the password reset feature;
     *        default is false
     *     sortkey - sort key of the template, integer
     */
    public function updateTemplate($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateTemplate', $args);
    }


    /**
     * Copies a template from one zone to another.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - Template ID.
     *     destzoneid - ID of the zone the template is being copied to.
     *     sourcezoneid - ID of the zone the template is currently hosted on.
     */
    public function copyTemplate($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        if (!isset($args['destzoneid']) || strlen($args['destzoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'destzoneid'), MISSING_ARGUMENT);

        if (!isset($args['sourcezoneid']) || strlen($args['sourcezoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'sourcezoneid'), MISSING_ARGUMENT);

        return $this->request('copyTemplate', $args);
    }


    /**
     * Deletes a template from the system. All virtual machines using the deleted
     * template will not be affected.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the template
     *     zoneid - the ID of zone of the template
     */
    public function deleteTemplate($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteTemplate', $args);
    }


    /**
     * List all public, private, and privileged templates.
     *
     * @param array $args An associative array. The following are options for keys:
     *     templatefilter - possible values are "featured", "self", "self-executable",
     *        "executable", and "community".* featured-templates that are featured and are
     *        public* self-templates that have been registered/created by the owner*
     *        selfexecutable-templates that have been registered/created by the owner that can
     *        be used to deploy a new VM* executable-all templates that can be used to deploy
     *        a new VM* community-templates that are public.
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     hypervisor - the hypervisor for which to restrict the search
     *     id - the template ID
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     name - the template name
     *     page -
     *     pagesize -
     *     projectid - list firewall rules by project
     *     zoneid - list templates by zoneId
     *     page - Pagination
     */
    public function listTemplates($args=array()) {

        if (!isset($args['templatefilter']) || strlen($args['templatefilter']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'templatefilter'), MISSING_ARGUMENT);

        return $this->request('listTemplates', $args);
    }


    /**
     * Updates a template visibility permissions. A public template is visible to all
     * accounts within the same domain. A private template is visible only to the owner
     * of the template. A priviledged template is a private template with account
     * permissions added. Only accounts specified under the template permissions are
     * visible to them.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the template ID
     *     accounts - a comma delimited list of accounts. If specified, "op" parameter
     *        has to be passed in.
     *     isextractable - true if the template/iso is extractable, false other wise.
     *        Can be set only by root admin
     *     isfeatured - true for featured template/iso, false otherwise
     *     ispublic - true for public template/iso, false for private templates/isos
     *     op - permission operator (add, remove, reset)
     *     projectids - a comma delimited list of projects. If specified, "op"
     *        parameter has to be passed in.
     */
    public function updateTemplatePermissions($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateTemplatePermissions', $args);
    }


    /**
     * List template visibility and all accounts that have permissions to view this
     * template.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the template ID
     *     page - Pagination
     */
    public function listTemplatePermissions($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('listTemplatePermissions', $args);
    }


    /**
     * Extracts a template
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the template
     *     mode - the mode of extraction - HTTP_DOWNLOAD or FTP_UPLOAD
     *     url - the url to which the ISO would be extracted
     *     zoneid - the ID of the zone where the ISO is originally located
     */
    public function extractTemplate($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        if (!isset($args['mode']) || strlen($args['mode']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'mode'), MISSING_ARGUMENT);

        return $this->request('extractTemplate', $args);
    }


    /**
     * load template into primary storage
     *
     * @param array $args An associative array. The following are options for keys:
     *     templateid - template ID of the template to be prepared in primary
     *        storage(s).
     *     zoneid - zone ID of the template to be prepared in primary storage(s).
     */
    public function prepareTemplate($args=array()) {

        if (!isset($args['templateid']) || strlen($args['templateid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'templateid'), MISSING_ARGUMENT);

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('prepareTemplate', $args);
    }


    /**
     * Attaches an ISO to a virtual machine.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the ISO file
     *     virtualmachineid - the ID of the virtual machine
     */
    public function attachIso($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        if (!isset($args['virtualmachineid']) || strlen($args['virtualmachineid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'virtualmachineid'), MISSING_ARGUMENT);

        return $this->request('attachIso', $args);
    }


    /**
     * Detaches any ISO file (if any) currently attached to a virtual machine.
     *
     * @param array $args An associative array. The following are options for keys:
     *     virtualmachineid - The ID of the virtual machine
     */
    public function detachIso($args=array()) {

        if (!isset($args['virtualmachineid']) || strlen($args['virtualmachineid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'virtualmachineid'), MISSING_ARGUMENT);

        return $this->request('detachIso', $args);
    }


    /**
     * Lists all available ISO files.
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     bootable - true if the ISO is bootable, false otherwise
     *     domainid - list only resources belonging to the domain specified
     *     hypervisor - the hypervisor for which to restrict the search
     *     id - list all isos by id
     *     isofilter - possible values are "featured", "self",
     *        "self-executable","executable", and "community". * featured-ISOs that are
     *        featured and are publicself-ISOs that have been registered/created by the owner.
     *        * selfexecutable-ISOs that have been registered/created by the owner that can be
     *        used to deploy a new VM. * executable-all ISOs that can be used to deploy a new
     *        VM * community-ISOs that are public.
     *     ispublic - true if the ISO is publicly available to all users, false
     *        otherwise.
     *     isready - true if this ISO is ready to be deployed
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     name - list all isos by name
     *     page -
     *     pagesize -
     *     projectid - list firewall rules by project
     *     zoneid - the ID of the zone
     *     page - Pagination
     */
    public function listIsos($args=array()) {

        return $this->request('listIsos', $args);
    }


    /**
     * Registers an existing ISO into the Cloud.com Cloud.
     *
     * @param array $args An associative array. The following are options for keys:
     *     displaytext - the display text of the ISO. This is usually used for display
     *        purposes.
     *     name - the name of the ISO
     *     url - the URL to where the ISO is currently being hosted
     *     zoneid - the ID of the zone you wish to register the ISO to.
     *     account - an optional account name. Must be used with domainId.
     *     bootable - true if this ISO is bootable. If not passed explicitly its
     *        assumed to be true
     *     checksum - the MD5 checksum value of this ISO
     *     domainid - an optional domainId. If the account parameter is used, domainId
     *        must also be used.
     *     isextractable - true if the iso or its derivatives are extractable; default
     *        is false
     *     isfeatured - true if you want this ISO to be featured
     *     ispublic - true if you want to register the ISO to be publicly available to
     *        all users, false otherwise.
     *     ostypeid - the ID of the OS Type that best represents the OS of this ISO. If
     *        the iso is bootable this parameter needs to be passed
     *     projectid - Register iso for the project
     */
    public function registerIso($args=array()) {

        if (!isset($args['displaytext']) || strlen($args['displaytext']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'displaytext'), MISSING_ARGUMENT);

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        if (!isset($args['url']) || strlen($args['url']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'url'), MISSING_ARGUMENT);

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('registerIso', $args);
    }


    /**
     * Updates an ISO file.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the image file
     *     bootable - true if image is bootable, false otherwise
     *     displaytext - the display text of the image
     *     format - the format for the image
     *     name - the name of the image file
     *     ostypeid - the ID of the OS type that best represents the OS of this image.
     *     passwordenabled - true if the image supports the password reset feature;
     *        default is false
     *     sortkey - sort key of the template, integer
     */
    public function updateIso($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateIso', $args);
    }


    /**
     * Deletes an ISO file.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the ISO file
     *     zoneid - the ID of the zone of the ISO file. If not specified, the ISO will
     *        be deleted from all the zones
     */
    public function deleteIso($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteIso', $args);
    }


    /**
     * Copies a template from one zone to another.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - Template ID.
     *     destzoneid - ID of the zone the template is being copied to.
     *     sourcezoneid - ID of the zone the template is currently hosted on.
     */
    public function copyIso($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        if (!isset($args['destzoneid']) || strlen($args['destzoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'destzoneid'), MISSING_ARGUMENT);

        if (!isset($args['sourcezoneid']) || strlen($args['sourcezoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'sourcezoneid'), MISSING_ARGUMENT);

        return $this->request('copyIso', $args);
    }


    /**
     * Updates iso permissions
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the template ID
     *     accounts - a comma delimited list of accounts. If specified, "op" parameter
     *        has to be passed in.
     *     isextractable - true if the template/iso is extractable, false other wise.
     *        Can be set only by root admin
     *     isfeatured - true for featured template/iso, false otherwise
     *     ispublic - true for public template/iso, false for private templates/isos
     *     op - permission operator (add, remove, reset)
     *     projectids - a comma delimited list of projects. If specified, "op"
     *        parameter has to be passed in.
     */
    public function updateIsoPermissions($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateIsoPermissions', $args);
    }


    /**
     * List template visibility and all accounts that have permissions to view this
     * template.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the template ID
     *     page - Pagination
     */
    public function listIsoPermissions($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('listIsoPermissions', $args);
    }


    /**
     * Extracts an ISO
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the ISO file
     *     mode - the mode of extraction - HTTP_DOWNLOAD or FTP_UPLOAD
     *     url - the url to which the ISO would be extracted
     *     zoneid - the ID of the zone where the ISO is originally located
     */
    public function extractIso($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        if (!isset($args['mode']) || strlen($args['mode']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'mode'), MISSING_ARGUMENT);

        return $this->request('extractIso', $args);
    }


    /**
     * Lists all port forwarding rules for an IP address.
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     id - Lists rule with the specified ID.
     *     ipaddressid - the id of IP address of the port forwarding services
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     page -
     *     pagesize -
     *     projectid - list firewall rules by project
     *     page - Pagination
     */
    public function listPortForwardingRules($args=array()) {

        return $this->request('listPortForwardingRules', $args);
    }


    /**
     * Creates a port forwarding rule
     *
     * @param array $args An associative array. The following are options for keys:
     *     ipaddressid - the IP address id of the port forwarding rule
     *     privateport - the starting port of port forwarding rule's private port
     *        range
     *     protocol - the protocol for the port fowarding rule. Valid values are TCP or
     *        UDP.
     *     publicport - the starting port of port forwarding rule's public port range
     *     virtualmachineid - the ID of the virtual machine for the port forwarding
     *        rule
     *     cidrlist - the cidr list to forward traffic from
     *     openfirewall - if true, firewall rule for source/end pubic port is
     *        automatically created; if false - firewall rule has to be created explicitely.
     *        Has value true by default
     */
    public function createPortForwardingRule($args=array()) {

        if (!isset($args['ipaddressid']) || strlen($args['ipaddressid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'ipaddressid'), MISSING_ARGUMENT);

        if (!isset($args['privateport']) || strlen($args['privateport']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'privateport'), MISSING_ARGUMENT);

        if (!isset($args['protocol']) || strlen($args['protocol']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'protocol'), MISSING_ARGUMENT);

        if (!isset($args['publicport']) || strlen($args['publicport']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'publicport'), MISSING_ARGUMENT);

        if (!isset($args['virtualmachineid']) || strlen($args['virtualmachineid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'virtualmachineid'), MISSING_ARGUMENT);

        return $this->request('createPortForwardingRule', $args);
    }


    /**
     * Deletes a port forwarding rule
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the port forwarding rule
     */
    public function deletePortForwardingRule($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deletePortForwardingRule', $args);
    }


    /**
     * Creates a firewall rule for a given ip address
     *
     * @param array $args An associative array. The following are options for keys:
     *     protocol - the protocol for the firewall rule. Valid values are
     *        TCP/UDP/ICMP.
     *     cidrlist - the cidr list to forward traffic from
     *     endport - the ending port of firewall rule
     *     icmpcode - error code for this icmp message
     *     icmptype - type of the icmp message being sent
     *     ipaddressid - the IP address id of the port forwarding rule
     *     startport - the starting port of firewall rule
     *     type - type of firewallrule: system/user
     */
    public function createFirewallRule($args=array()) {

        if (!isset($args['protocol']) || strlen($args['protocol']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'protocol'), MISSING_ARGUMENT);

        return $this->request('createFirewallRule', $args);
    }


    /**
     * Deletes a firewall rule
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the firewall rule
     */
    public function deleteFirewallRule($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteFirewallRule', $args);
    }


    /**
     * Lists all firewall rules for an IP address.
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     id - Lists rule with the specified ID.
     *     ipaddressid - the id of IP address of the firwall services
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     page -
     *     pagesize -
     *     projectid - list firewall rules by project
     *     page - Pagination
     */
    public function listFirewallRules($args=array()) {

        return $this->request('listFirewallRules', $args);
    }


    /**
     * Adds a SRX firewall device
     *
     * @param array $args An associative array. The following are options for keys:
     *     networkdevicetype - supports only JuniperSRXFirewall
     *     password - Credentials to reach SRX firewall device
     *     physicalnetworkid - the Physical Network ID
     *     url - URL of the SRX appliance.
     *     username - Credentials to reach SRX firewall device
     */
    public function addSrxFirewall($args=array()) {

        if (!isset($args['networkdevicetype']) || strlen($args['networkdevicetype']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'networkdevicetype'), MISSING_ARGUMENT);

        if (!isset($args['password']) || strlen($args['password']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'password'), MISSING_ARGUMENT);

        if (!isset($args['physicalnetworkid']) || strlen($args['physicalnetworkid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'physicalnetworkid'), MISSING_ARGUMENT);

        if (!isset($args['url']) || strlen($args['url']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'url'), MISSING_ARGUMENT);

        if (!isset($args['username']) || strlen($args['username']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'username'), MISSING_ARGUMENT);

        return $this->request('addSrxFirewall', $args);
    }


    /**
     * delete a SRX firewall device
     *
     * @param array $args An associative array. The following are options for keys:
     *     fwdeviceid - srx firewall device ID
     */
    public function deleteSrxFirewall($args=array()) {

        if (!isset($args['fwdeviceid']) || strlen($args['fwdeviceid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'fwdeviceid'), MISSING_ARGUMENT);

        return $this->request('deleteSrxFirewall', $args);
    }


    /**
     * Configures a SRX firewall device
     *
     * @param array $args An associative array. The following are options for keys:
     *     fwdeviceid - SRX firewall device ID
     *     fwdevicecapacity - capacity of the firewall device, Capacity will be
     *        interpreted as number of networks device can handle
     */
    public function configureSrxFirewall($args=array()) {

        if (!isset($args['fwdeviceid']) || strlen($args['fwdeviceid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'fwdeviceid'), MISSING_ARGUMENT);

        return $this->request('configureSrxFirewall', $args);
    }


    /**
     * lists SRX firewall devices in a physical network
     *
     * @param array $args An associative array. The following are options for keys:
     *     fwdeviceid - SRX firewall device ID
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     physicalnetworkid - the Physical Network ID
     *     page - Pagination
     */
    public function listSrxFirewalls($args=array()) {

        return $this->request('listSrxFirewalls', $args);
    }


    /**
     * Starts a router.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the router
     */
    public function startRouter($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('startRouter', $args);
    }


    /**
     * Starts a router.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the router
     */
    public function rebootRouter($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('rebootRouter', $args);
    }


    /**
     * Stops a router.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the router
     *     forced - Force stop the VM. The caller knows the VM is stopped.
     */
    public function stopRouter($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('stopRouter', $args);
    }


    /**
     * Destroys a router.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the router
     */
    public function destroyRouter($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('destroyRouter', $args);
    }


    /**
     * Upgrades domain router to a new service offering
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the router
     *     serviceofferingid - the service offering ID to apply to the domain router
     */
    public function changeServiceForRouter($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        if (!isset($args['serviceofferingid']) || strlen($args['serviceofferingid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'serviceofferingid'), MISSING_ARGUMENT);

        return $this->request('changeServiceForRouter', $args);
    }


    /**
     * List routers.
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     hostid - the host ID of the router
     *     id - the ID of the disk router
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     name - the name of the router
     *     networkid - list by network id
     *     page -
     *     pagesize -
     *     podid - the Pod ID of the router
     *     projectid - list firewall rules by project
     *     state - the state of the router
     *     zoneid - the Zone ID of the router
     *     page - Pagination
     */
    public function listRouters($args=array()) {

        return $this->request('listRouters', $args);
    }


    /**
     * Create a virtual router element.
     *
     * @param array $args An associative array. The following are options for keys:
     *     nspid - the network service provider ID of the virtual router element
     */
    public function createVirtualRouterElement($args=array()) {

        if (!isset($args['nspid']) || strlen($args['nspid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'nspid'), MISSING_ARGUMENT);

        return $this->request('createVirtualRouterElement', $args);
    }


    /**
     * Configures a virtual router element.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the virtual router provider
     *     enabled - Enabled/Disabled the service provider
     */
    public function configureVirtualRouterElement($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        if (!isset($args['enabled']) || strlen($args['enabled']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'enabled'), MISSING_ARGUMENT);

        return $this->request('configureVirtualRouterElement', $args);
    }


    /**
     * Lists all available virtual router elements.
     *
     * @param array $args An associative array. The following are options for keys:
     *     enabled - list network offerings by enabled state
     *     id - list virtual router elements by id
     *     keyword - List by keyword
     *     nspid - list virtual router elements by network service provider id
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listVirtualRouterElements($args=array()) {

        return $this->request('listVirtualRouterElements', $args);
    }


    /**
     * Creates a project
     *
     * @param array $args An associative array. The following are options for keys:
     *     displaytext - display text of the project
     *     name - name of the project
     *     account - account who will be Admin for the project
     *     domainid - domain ID of the account owning a project
     */
    public function createProject($args=array()) {

        if (!isset($args['displaytext']) || strlen($args['displaytext']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'displaytext'), MISSING_ARGUMENT);

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        return $this->request('createProject', $args);
    }


    /**
     * Deletes a project
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - id of the project to be deleted
     */
    public function deleteProject($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteProject', $args);
    }


    /**
     * Updates a project
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - id of the project to be modified
     *     account - new Admin account for the project
     *     displaytext - display text of the project
     */
    public function updateProject($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateProject', $args);
    }


    /**
     * Activates a project
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - id of the project to be modified
     */
    public function activateProject($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('activateProject', $args);
    }


    /**
     * Suspends a project
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - id of the project to be suspended
     */
    public function suspendProject($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('suspendProject', $args);
    }


    /**
     * Lists projects and provides detailed information for listed projects
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     displaytext - list projects by display text
     *     domainid - list only resources belonging to the domain specified
     *     id - list projects by project ID
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     name - list projects by name
     *     page -
     *     pagesize -
     *     state - list projects by state
     *     page - Pagination
     */
    public function listProjects($args=array()) {

        return $this->request('listProjects', $args);
    }


    /**
     * Lists projects and provides detailed information for listed projects
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     activeonly - if true, list only active invitations - having Pending state
     *        and ones that are not timed out yet
     *     domainid - list only resources belonging to the domain specified
     *     id - list invitations by id
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     page -
     *     pagesize -
     *     projectid - list by project id
     *     state - list invitations by state
     *     page - Pagination
     */
    public function listProjectInvitations($args=array()) {

        return $this->request('listProjectInvitations', $args);
    }


    /**
     * Accepts or declines project invitation
     *
     * @param array $args An associative array. The following are options for keys:
     *     projectid - id of the project to join
     *     accept - if true, accept the invitation, decline if false. True by default
     *     account - account that is joining the project
     *     token - list invitations for specified account; this parameter has to be
     *        specified with domainId
     */
    public function updateProjectInvitation($args=array()) {

        if (!isset($args['projectid']) || strlen($args['projectid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'projectid'), MISSING_ARGUMENT);

        return $this->request('updateProjectInvitation', $args);
    }


    /**
     * Accepts or declines project invitation
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - id of the invitation
     */
    public function deleteProjectInvitation($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteProjectInvitation', $args);
    }


    /**
     * Adds a new host.
     *
     * @param array $args An associative array. The following are options for keys:
     *     hypervisor - hypervisor type of the host
     *     password - the password for the host
     *     url - the host URL
     *     username - the username for the host
     *     zoneid - the Zone ID for the host
     *     allocationstate - Allocation state of this Host for allocation of new
     *        resources
     *     clusterid - the cluster ID for the host
     *     clustername - the cluster name for the host
     *     hosttags - list of tags to be added to the host
     *     podid - the Pod ID for the host
     */
    public function addHost($args=array()) {

        if (!isset($args['hypervisor']) || strlen($args['hypervisor']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'hypervisor'), MISSING_ARGUMENT);

        if (!isset($args['password']) || strlen($args['password']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'password'), MISSING_ARGUMENT);

        if (!isset($args['url']) || strlen($args['url']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'url'), MISSING_ARGUMENT);

        if (!isset($args['username']) || strlen($args['username']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'username'), MISSING_ARGUMENT);

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('addHost', $args);
    }


    /**
     * Reconnects a host.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the host ID
     */
    public function reconnectHost($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('reconnectHost', $args);
    }


    /**
     * Updates a host.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the host to update
     *     allocationstate - Change resource state of host, valid values are [Enable,
     *        Disable]. Operation may failed if host in states not allowing Enable/Disable
     *     hosttags - list of tags to be added to the host
     *     oscategoryid - the id of Os category to update the host with
     *     url - the new uri for the secondary storage: nfs://host/path
     */
    public function updateHost($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateHost', $args);
    }


    /**
     * Deletes a host.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the host ID
     *     forced - Force delete the host. All HA enabled vms running on the host will
     *        be put to HA; HA disabled ones will be stopped
     *     forcedestroylocalstorage - Force destroy local storage on this host. All VMs
     *        created on this local storage will be destroyed
     */
    public function deleteHost($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteHost', $args);
    }


    /**
     * Prepares a host for maintenance.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the host ID
     */
    public function prepareHostForMaintenance($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('prepareHostForMaintenance', $args);
    }


    /**
     * Cancels host maintenance.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the host ID
     */
    public function cancelHostMaintenance($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('cancelHostMaintenance', $args);
    }


    /**
     * Lists hosts.
     *
     * @param array $args An associative array. The following are options for keys:
     *     clusterid - lists hosts existing in particular cluster
     *     details - comma separated list of host details requested, value can be a
     *        list of [ min, all, capacity, events, stats]
     *     id - the id of the host
     *     keyword - List by keyword
     *     name - the name of the host
     *     page -
     *     pagesize -
     *     podid - the Pod ID for the host
     *     resourcestate - list hosts by resource state. Resource state represents
     *        current state determined by admin of host, valule can be one of [Enabled,
     *        Disabled, Unmanaged, PrepareForMaintenance, ErrorInMaintenance, Maintenance,
     *        Error]
     *     state - the state of the host
     *     type - the host type
     *     virtualmachineid - lists hosts in the same cluster as this VM and flag hosts
     *        with enough CPU/RAm to host this VM
     *     zoneid - the Zone ID for the host
     *     page - Pagination
     */
    public function listHosts($args=array()) {

        return $this->request('listHosts', $args);
    }


    /**
     * Adds secondary storage.
     *
     * @param array $args An associative array. The following are options for keys:
     *     url - the URL for the secondary storage
     *     zoneid - the Zone ID for the secondary storage
     */
    public function addSecondaryStorage($args=array()) {

        if (!isset($args['url']) || strlen($args['url']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'url'), MISSING_ARGUMENT);

        return $this->request('addSecondaryStorage', $args);
    }


    /**
     * Update password of a host/pool on management server.
     *
     * @param array $args An associative array. The following are options for keys:
     *     password - the new password for the host/cluster
     *     username - the username for the host/cluster
     *     clusterid - the cluster ID
     *     hostid - the host ID
     */
    public function updateHostPassword($args=array()) {

        if (!isset($args['password']) || strlen($args['password']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'password'), MISSING_ARGUMENT);

        if (!isset($args['username']) || strlen($args['username']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'username'), MISSING_ARGUMENT);

        return $this->request('updateHostPassword', $args);
    }


    /**
     * Creates an account
     *
     * @param array $args An associative array. The following are options for keys:
     *     accounttype - Type of the account.  Specify 0 for user, 1 for root admin,
     *        and 2 for domain admin
     *     email - email
     *     firstname - firstname
     *     lastname - lastname
     *     password - Hashed password (Default is MD5). If you wish to use any other
     *        hashing algorithm, you would need to write a custom authentication adapter See
     *        Docs section.
     *     username - Unique username.
     *     account - Creates the user under the specified account. If no account is
     *        specified, the username will be used as the account name.
     *     accountdetails - details for account used to store specific parameters
     *     domainid - Creates the user under the specified domain.
     *     networkdomain - Network domain for the account's networks
     *     timezone - Specifies a timezone for this command. For more information on
     *        the timezone parameter, see Time Zone Format.
     */
    public function createAccount($args=array()) {

        if (!isset($args['accounttype']) || strlen($args['accounttype']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'accounttype'), MISSING_ARGUMENT);

        if (!isset($args['email']) || strlen($args['email']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'email'), MISSING_ARGUMENT);

        if (!isset($args['firstname']) || strlen($args['firstname']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'firstname'), MISSING_ARGUMENT);

        if (!isset($args['lastname']) || strlen($args['lastname']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'lastname'), MISSING_ARGUMENT);

        if (!isset($args['password']) || strlen($args['password']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'password'), MISSING_ARGUMENT);

        if (!isset($args['username']) || strlen($args['username']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'username'), MISSING_ARGUMENT);

        return $this->request('createAccount', $args);
    }


    /**
     * Deletes a account, and all users associated with this account
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - Account id
     */
    public function deleteAccount($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteAccount', $args);
    }


    /**
     * Updates account information for the authenticated user
     *
     * @param array $args An associative array. The following are options for keys:
     *     newname - new name for the account
     *     account - the current account name
     *     accountdetails - details for account used to store specific parameters
     *     domainid - the ID of the domain where the account exists
     *     id - Account id
     *     networkdomain - Network domain for the account's networks; empty string will
     *        update domainName with NULL value
     */
    public function updateAccount($args=array()) {

        if (!isset($args['newname']) || strlen($args['newname']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'newname'), MISSING_ARGUMENT);

        return $this->request('updateAccount', $args);
    }


    /**
     * Disables an account
     *
     * @param array $args An associative array. The following are options for keys:
     *     lock - If true, only lock the account; else disable the account
     *     account - Disables specified account.
     *     domainid - Disables specified account in this domain.
     *     id - Account id
     */
    public function disableAccount($args=array()) {

        if (!isset($args['lock']) || strlen($args['lock']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'lock'), MISSING_ARGUMENT);

        return $this->request('disableAccount', $args);
    }


    /**
     * Enables an account
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - Enables specified account.
     *     domainid - Enables specified account in this domain.
     *     id - Account id
     */
    public function enableAccount($args=array()) {

        return $this->request('enableAccount', $args);
    }


    /**
     * Lists accounts and provides detailed account information for listed accounts
     *
     * @param array $args An associative array. The following are options for keys:
     *     accounttype - list accounts by account type. Valid account types are 1
     *        (admin), 2 (domain-admin), and 0 (user).
     *     domainid - list only resources belonging to the domain specified
     *     id - list account by account ID
     *     iscleanuprequired - list accounts by cleanuprequred attribute (values are
     *        true or false)
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     name - list account by account name
     *     page -
     *     pagesize -
     *     state - list accounts by state. Valid states are enabled, disabled, and
     *        locked.
     *     page - Pagination
     */
    public function listAccounts($args=array()) {

        return $this->request('listAccounts', $args);
    }


    /**
     * Adds acoount to a project
     *
     * @param array $args An associative array. The following are options for keys:
     *     projectid - id of the project to add the account to
     *     account - name of the account to be added to the project
     *     email - email to which invitation to the project is going to be sent
     */
    public function addAccountToProject($args=array()) {

        if (!isset($args['projectid']) || strlen($args['projectid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'projectid'), MISSING_ARGUMENT);

        return $this->request('addAccountToProject', $args);
    }


    /**
     * Deletes account from the project
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - name of the account to be removed from the project
     *     projectid - id of the project to remove the account from
     */
    public function deleteAccountFromProject($args=array()) {

        if (!isset($args['account']) || strlen($args['account']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'account'), MISSING_ARGUMENT);

        if (!isset($args['projectid']) || strlen($args['projectid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'projectid'), MISSING_ARGUMENT);

        return $this->request('deleteAccountFromProject', $args);
    }


    /**
     * Lists project's accounts
     *
     * @param array $args An associative array. The following are options for keys:
     *     projectid - id of the project
     *     account - list accounts of the project by account name
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     role - list accounts of the project by role
     *     page - Pagination
     */
    public function listProjectAccounts($args=array()) {

        if (!isset($args['projectid']) || strlen($args['projectid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'projectid'), MISSING_ARGUMENT);

        return $this->request('listProjectAccounts', $args);
    }


    /**
     * Lists storage pools.
     *
     * @param array $args An associative array. The following are options for keys:
     *     clusterid - list storage pools belongig to the specific cluster
     *     id - the ID of the storage pool
     *     ipaddress - the IP address for the storage pool
     *     keyword - List by keyword
     *     name - the name of the storage pool
     *     page -
     *     pagesize -
     *     path - the storage pool path
     *     podid - the Pod ID for the storage pool
     *     zoneid - the Zone ID for the storage pool
     *     page - Pagination
     */
    public function listStoragePools($args=array()) {

        return $this->request('listStoragePools', $args);
    }


    /**
     * Creates a storage pool.
     *
     * @param array $args An associative array. The following are options for keys:
     *     name - the name for the storage pool
     *     url - the URL of the storage pool
     *     zoneid - the Zone ID for the storage pool
     *     clusterid - the cluster ID for the storage pool
     *     details - the details for the storage pool
     *     podid - the Pod ID for the storage pool
     *     tags - the tags for the storage pool
     */
    public function createStoragePool($args=array()) {

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        if (!isset($args['url']) || strlen($args['url']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'url'), MISSING_ARGUMENT);

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('createStoragePool', $args);
    }


    /**
     * Updates a storage pool.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the Id of the storage pool
     *     tags - comma-separated list of tags for the storage pool
     */
    public function updateStoragePool($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateStoragePool', $args);
    }


    /**
     * Deletes a storage pool.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - Storage pool id
     */
    public function deleteStoragePool($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteStoragePool', $args);
    }


    /**
     * Create a pool
     *
     * @param array $args An associative array. The following are options for keys:
     *     algorithm - algorithm.
     *     name - pool name.
     */
    public function createPool($args=array()) {

        if (!isset($args['algorithm']) || strlen($args['algorithm']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'algorithm'), MISSING_ARGUMENT);

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        return $this->request('createPool', $args);
    }


    /**
     * Delete a pool
     *
     * @param array $args An associative array. The following are options for keys:
     *     poolname - pool name.
     */
    public function deletePool($args=array()) {

        if (!isset($args['poolname']) || strlen($args['poolname']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'poolname'), MISSING_ARGUMENT);

        return $this->request('deletePool', $args);
    }


    /**
     * Modify pool
     *
     * @param array $args An associative array. The following are options for keys:
     *     algorithm - algorithm.
     *     poolname - pool name.
     */
    public function modifyPool($args=array()) {

        if (!isset($args['algorithm']) || strlen($args['algorithm']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'algorithm'), MISSING_ARGUMENT);

        if (!isset($args['poolname']) || strlen($args['poolname']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'poolname'), MISSING_ARGUMENT);

        return $this->request('modifyPool', $args);
    }


    /**
     * List Pool
     *
     * @param array $args An associative array. The following are options for keys:
     *     page - Pagination
     */
    public function listPools($args=array()) {

        return $this->request('listPools', $args);
    }


    /**
     * Creates a security group
     *
     * @param array $args An associative array. The following are options for keys:
     *     name - name of the security group
     *     account - an optional account for the security group. Must be used with
     *        domainId.
     *     description - the description of the security group
     *     domainid - an optional domainId for the security group. If the account
     *        parameter is used, domainId must also be used.
     *     projectid - Deploy vm for the project
     */
    public function createSecurityGroup($args=array()) {

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        return $this->request('createSecurityGroup', $args);
    }


    /**
     * Deletes security group
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - the account of the security group. Must be specified with domain
     *        ID
     *     domainid - the domain ID of account owning the security group
     *     id - The ID of the security group. Mutually exclusive with name parameter
     *     name - The ID of the security group. Mutually exclusive with id parameter
     *     projectid - the project of the security group
     */
    public function deleteSecurityGroup($args=array()) {

        return $this->request('deleteSecurityGroup', $args);
    }


    /**
     * Authorizes a particular ingress rule for this security group
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - an optional account for the security group. Must be used with
     *        domainId.
     *     cidrlist - the cidr list associated
     *     domainid - an optional domainId for the security group. If the account
     *        parameter is used, domainId must also be used.
     *     endport - end port for this ingress rule
     *     icmpcode - error code for this icmp message
     *     icmptype - type of the icmp message being sent
     *     projectid - an optional project of the security group
     *     protocol - TCP is default. UDP is the other supported protocol
     *     securitygroupid - The ID of the security group. Mutually exclusive with
     *        securityGroupName parameter
     *     securitygroupname - The name of the security group. Mutually exclusive with
     *        securityGroupName parameter
     *     startport - start port for this ingress rule
     *     usersecuritygrouplist - user to security group mapping
     */
    public function authorizeSecurityGroupIngress($args=array()) {

        return $this->request('authorizeSecurityGroupIngress', $args);
    }


    /**
     * Deletes a particular ingress rule from this security group
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the ingress rule
     */
    public function revokeSecurityGroupIngress($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('revokeSecurityGroupIngress', $args);
    }


    /**
     * Authorizes a particular egress rule for this security group
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - an optional account for the security group. Must be used with
     *        domainId.
     *     cidrlist - the cidr list associated
     *     domainid - an optional domainId for the security group. If the account
     *        parameter is used, domainId must also be used.
     *     endport - end port for this egress rule
     *     icmpcode - error code for this icmp message
     *     icmptype - type of the icmp message being sent
     *     projectid - an optional project of the security group
     *     protocol - TCP is default. UDP is the other supported protocol
     *     securitygroupid - The ID of the security group. Mutually exclusive with
     *        securityGroupName parameter
     *     securitygroupname - The name of the security group. Mutually exclusive with
     *        securityGroupName parameter
     *     startport - start port for this egress rule
     *     usersecuritygrouplist - user to security group mapping
     */
    public function authorizeSecurityGroupEgress($args=array()) {

        return $this->request('authorizeSecurityGroupEgress', $args);
    }


    /**
     * Deletes a particular egress rule from this security group
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the egress rule
     */
    public function revokeSecurityGroupEgress($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('revokeSecurityGroupEgress', $args);
    }


    /**
     * Lists security groups
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     id - list the security group by the id provided
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     page -
     *     pagesize -
     *     projectid - list firewall rules by project
     *     securitygroupname - lists security groups by name
     *     virtualmachineid - lists security groups by virtual machine id
     *     page - Pagination
     */
    public function listSecurityGroups($args=array()) {

        return $this->request('listSecurityGroups', $args);
    }


    /**
     * Starts a system virtual machine.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the system virtual machine
     */
    public function startSystemVm($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('startSystemVm', $args);
    }


    /**
     * Reboots a system VM.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the system virtual machine
     */
    public function rebootSystemVm($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('rebootSystemVm', $args);
    }


    /**
     * Stops a system VM.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the system virtual machine
     *     forced - Force stop the VM.  The caller knows the VM is stopped.
     */
    public function stopSystemVm($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('stopSystemVm', $args);
    }


    /**
     * Destroyes a system virtual machine.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the system virtual machine
     */
    public function destroySystemVm($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('destroySystemVm', $args);
    }


    /**
     * List system virtual machines.
     *
     * @param array $args An associative array. The following are options for keys:
     *     hostid - the host ID of the system VM
     *     id - the ID of the system VM
     *     keyword - List by keyword
     *     name - the name of the system VM
     *     page -
     *     pagesize -
     *     podid - the Pod ID of the system VM
     *     state - the state of the system VM
     *     systemvmtype - the system VM type. Possible types are "consoleproxy" and
     *        "secondarystoragevm".
     *     zoneid - the Zone ID of the system VM
     *     page - Pagination
     */
    public function listSystemVms($args=array()) {

        return $this->request('listSystemVms', $args);
    }


    /**
     * Attempts Migration of a system virtual machine to the host specified.
     *
     * @param array $args An associative array. The following are options for keys:
     *     hostid - destination Host ID to migrate VM to
     *     virtualmachineid - the ID of the virtual machine
     */
    public function migrateSystemVm($args=array()) {

        if (!isset($args['hostid']) || strlen($args['hostid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'hostid'), MISSING_ARGUMENT);

        if (!isset($args['virtualmachineid']) || strlen($args['virtualmachineid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'virtualmachineid'), MISSING_ARGUMENT);

        return $this->request('migrateSystemVm', $args);
    }


    /**
     * Creates an instant snapshot of a volume.
     *
     * @param array $args An associative array. The following are options for keys:
     *     volumeid - The ID of the disk volume
     *     account - The account of the snapshot. The account parameter must be used
     *        with the domainId parameter.
     *     domainid - The domain ID of the snapshot. If used with the account
     *        parameter, specifies a domain for the account associated with the disk volume.
     *     policyid - policy id of the snapshot, if this is null, then use
     *        MANUAL_POLICY.
     */
    public function createSnapshot($args=array()) {

        if (!isset($args['volumeid']) || strlen($args['volumeid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'volumeid'), MISSING_ARGUMENT);

        return $this->request('createSnapshot', $args);
    }


    /**
     * Lists all available snapshots for the account.
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     id - lists snapshot by snapshot ID
     *     intervaltype - valid values are HOURLY, DAILY, WEEKLY, and MONTHLY.
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     name - lists snapshot by snapshot name
     *     page -
     *     pagesize -
     *     projectid - list firewall rules by project
     *     snapshottype - valid values are MANUAL or RECURRING.
     *     volumeid - the ID of the disk volume
     *     page - Pagination
     */
    public function listSnapshots($args=array()) {

        return $this->request('listSnapshots', $args);
    }


    /**
     * Deletes a snapshot of a disk volume.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - The ID of the snapshot
     */
    public function deleteSnapshot($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteSnapshot', $args);
    }


    /**
     * Creates a snapshot policy for the account.
     *
     * @param array $args An associative array. The following are options for keys:
     *     intervaltype - valid values are HOURLY, DAILY, WEEKLY, and MONTHLY
     *     maxsnaps - maximum number of snapshots to retain
     *     schedule - time the snapshot is scheduled to be taken. Format is:* if
     *        HOURLY, MM* if DAILY, MM:HH* if WEEKLY, MM:HH:DD (1-7)* if MONTHLY, MM:HH:DD
     *        (1-28)
     *     timezone - Specifies a timezone for this command. For more information on
     *        the timezone parameter, see Time Zone Format.
     *     volumeid - the ID of the disk volume
     */
    public function createSnapshotPolicy($args=array()) {

        if (!isset($args['intervaltype']) || strlen($args['intervaltype']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'intervaltype'), MISSING_ARGUMENT);

        if (!isset($args['maxsnaps']) || strlen($args['maxsnaps']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'maxsnaps'), MISSING_ARGUMENT);

        if (!isset($args['schedule']) || strlen($args['schedule']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'schedule'), MISSING_ARGUMENT);

        if (!isset($args['timezone']) || strlen($args['timezone']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'timezone'), MISSING_ARGUMENT);

        if (!isset($args['volumeid']) || strlen($args['volumeid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'volumeid'), MISSING_ARGUMENT);

        return $this->request('createSnapshotPolicy', $args);
    }


    /**
     * Deletes snapshot policies for the account.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the Id of the snapshot policy
     *     ids - list of snapshots policy IDs separated by comma
     */
    public function deleteSnapshotPolicies($args=array()) {

        return $this->request('deleteSnapshotPolicies', $args);
    }


    /**
     * Lists snapshot policies.
     *
     * @param array $args An associative array. The following are options for keys:
     *     volumeid - the ID of the disk volume
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listSnapshotPolicies($args=array()) {

        if (!isset($args['volumeid']) || strlen($args['volumeid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'volumeid'), MISSING_ARGUMENT);

        return $this->request('listSnapshotPolicies', $args);
    }


    /**
     * Create a LUN from a pool
     *
     * @param array $args An associative array. The following are options for keys:
     *     name - pool name.
     *     size - LUN size.
     */
    public function createLunOnFiler($args=array()) {

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        if (!isset($args['size']) || strlen($args['size']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'size'), MISSING_ARGUMENT);

        return $this->request('createLunOnFiler', $args);
    }


    /**
     * Destroy a LUN
     *
     * @param array $args An associative array. The following are options for keys:
     *     path - LUN path.
     */
    public function destroyLunOnFiler($args=array()) {

        if (!isset($args['path']) || strlen($args['path']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'path'), MISSING_ARGUMENT);

        return $this->request('destroyLunOnFiler', $args);
    }


    /**
     * List LUN
     *
     * @param array $args An associative array. The following are options for keys:
     *     poolname - pool name.
     *     page - Pagination
     */
    public function listLunsOnFiler($args=array()) {

        if (!isset($args['poolname']) || strlen($args['poolname']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'poolname'), MISSING_ARGUMENT);

        return $this->request('listLunsOnFiler', $args);
    }


    /**
     * Associate a LUN with a guest IQN
     *
     * @param array $args An associative array. The following are options for keys:
     *     iqn - Guest IQN to which the LUN associate.
     *     name - LUN name.
     */
    public function associateLun($args=array()) {

        if (!isset($args['iqn']) || strlen($args['iqn']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'iqn'), MISSING_ARGUMENT);

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        return $this->request('associateLun', $args);
    }


    /**
     * Dissociate a LUN
     *
     * @param array $args An associative array. The following are options for keys:
     *     iqn - Guest IQN.
     *     path - LUN path.
     */
    public function dissociateLun($args=array()) {

        if (!isset($args['iqn']) || strlen($args['iqn']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'iqn'), MISSING_ARGUMENT);

        if (!isset($args['path']) || strlen($args['path']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'path'), MISSING_ARGUMENT);

        return $this->request('dissociateLun', $args);
    }


    /**
     * Enables static nat for given ip address
     *
     * @param array $args An associative array. The following are options for keys:
     *     ipaddressid - the public IP address id for which static nat feature is being
     *        enabled
     *     virtualmachineid - the ID of the virtual machine for enabling static nat
     *        feature
     */
    public function enableStaticNat($args=array()) {

        if (!isset($args['ipaddressid']) || strlen($args['ipaddressid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'ipaddressid'), MISSING_ARGUMENT);

        if (!isset($args['virtualmachineid']) || strlen($args['virtualmachineid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'virtualmachineid'), MISSING_ARGUMENT);

        return $this->request('enableStaticNat', $args);
    }


    /**
     * Creates an ip forwarding rule
     *
     * @param array $args An associative array. The following are options for keys:
     *     ipaddressid - the public IP address id of the forwarding rule, already
     *        associated via associateIp
     *     protocol - the protocol for the rule. Valid values are TCP or UDP.
     *     startport - the start port for the rule
     *     cidrlist - the cidr list to forward traffic from
     *     endport - the end port for the rule
     *     openfirewall - if true, firewall rule for source/end pubic port is
     *        automatically created; if false - firewall rule has to be created explicitely.
     *        Has value true by default
     */
    public function createIpForwardingRule($args=array()) {

        if (!isset($args['ipaddressid']) || strlen($args['ipaddressid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'ipaddressid'), MISSING_ARGUMENT);

        if (!isset($args['protocol']) || strlen($args['protocol']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'protocol'), MISSING_ARGUMENT);

        if (!isset($args['startport']) || strlen($args['startport']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'startport'), MISSING_ARGUMENT);

        return $this->request('createIpForwardingRule', $args);
    }


    /**
     * Deletes an ip forwarding rule
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the id of the forwarding rule
     */
    public function deleteIpForwardingRule($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteIpForwardingRule', $args);
    }


    /**
     * List the ip forwarding rules
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     id - Lists rule with the specified ID.
     *     ipaddressid - list the rule belonging to this public ip address
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     page -
     *     pagesize -
     *     projectid - list firewall rules by project
     *     virtualmachineid - Lists all rules applied to the specified Vm.
     *     page - Pagination
     */
    public function listIpForwardingRules($args=array()) {

        return $this->request('listIpForwardingRules', $args);
    }


    /**
     * Disables static rule for given ip address
     *
     * @param array $args An associative array. The following are options for keys:
     *     ipaddressid - the public IP address id for which static nat feature is being
     *        disableed
     */
    public function disableStaticNat($args=array()) {

        if (!isset($args['ipaddressid']) || strlen($args['ipaddressid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'ipaddressid'), MISSING_ARGUMENT);

        return $this->request('disableStaticNat', $args);
    }


    /**
     * Creates a domain
     *
     * @param array $args An associative array. The following are options for keys:
     *     name - creates domain with this name
     *     networkdomain - Network domain for networks in the domain
     *     parentdomainid - assigns new domain a parent domain by domain ID of the
     *        parent.  If no parent domain is specied, the ROOT domain is assumed.
     */
    public function createDomain($args=array()) {

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        return $this->request('createDomain', $args);
    }


    /**
     * Updates a domain with a new name
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - ID of domain to update
     *     name - updates domain with this name
     *     networkdomain - Network domain for the domain's networks; empty string will
     *        update domainName with NULL value
     */
    public function updateDomain($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateDomain', $args);
    }


    /**
     * Deletes a specified domain
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - ID of domain to delete
     *     cleanup - true if all domain resources (child domains, accounts) have to be
     *        cleaned up, false otherwise
     */
    public function deleteDomain($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteDomain', $args);
    }


    /**
     * Lists domains and provides detailed information for listed domains
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - List domain by domain ID.
     *     keyword - List by keyword
     *     level - List domains by domain level.
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     name - List domain by domain name.
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listDomains($args=array()) {

        return $this->request('listDomains', $args);
    }


    /**
     * Lists all children domains belonging to a specified domain
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - list children domain by parent domain ID.
     *     isrecursive - to return the entire tree, use the value "true". To return the
     *        first level children, use the value "false".
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     name - list children domains by name
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listDomainChildren($args=array()) {

        return $this->request('listDomainChildren', $args);
    }


    /**
     * Creates a Zone.
     *
     * @param array $args An associative array. The following are options for keys:
     *     dns1 - the first DNS for the Zone
     *     internaldns1 - the first internal DNS for the Zone
     *     name - the name of the Zone
     *     networktype - network type of the zone, can be Basic or Advanced
     *     allocationstate - Allocation state of this Zone for allocation of new
     *        resources
     *     dns2 - the second DNS for the Zone
     *     domain - Network domain name for the networks in the zone
     *     domainid - the ID of the containing domain, null for public zones
     *     guestcidraddress - the guest CIDR address for the Zone
     *     internaldns2 - the second internal DNS for the Zone
     *     securitygroupenabled - true if network is security group enabled, false
     *        otherwise
     */
    public function createZone($args=array()) {

        if (!isset($args['dns1']) || strlen($args['dns1']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'dns1'), MISSING_ARGUMENT);

        if (!isset($args['internaldns1']) || strlen($args['internaldns1']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'internaldns1'), MISSING_ARGUMENT);

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        if (!isset($args['networktype']) || strlen($args['networktype']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'networktype'), MISSING_ARGUMENT);

        return $this->request('createZone', $args);
    }


    /**
     * Updates a Zone.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the Zone
     *     allocationstate - Allocation state of this cluster for allocation of new
     *        resources
     *     details - the details for the Zone
     *     dhcpprovider - the dhcp Provider for the Zone
     *     dns1 - the first DNS for the Zone
     *     dns2 - the second DNS for the Zone
     *     dnssearchorder - the dns search order list
     *     domain - Network domain name for the networks in the zone; empty string will
     *        update domain with NULL value
     *     guestcidraddress - the guest CIDR address for the Zone
     *     internaldns1 - the first internal DNS for the Zone
     *     internaldns2 - the second internal DNS for the Zone
     *     ispublic - updates a private zone to public if set, but not vice-versa
     *     name - the name of the Zone
     */
    public function updateZone($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateZone', $args);
    }


    /**
     * Deletes a Zone.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the Zone
     */
    public function deleteZone($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteZone', $args);
    }


    /**
     * Lists zones
     *
     * @param array $args An associative array. The following are options for keys:
     *     available - true if you want to retrieve all available Zones. False if you
     *        only want to return the Zones from which you have at least one VM. Default is
     *        false.
     *     domainid - the ID of the domain associated with the zone
     *     id - the ID of the zone
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     showcapacities - flag to display the capacity of the zones
     *     page - Pagination
     */
    public function listZones($args=array()) {

        return $this->request('listZones', $args);
    }


    /**
     * Creates a vm group
     *
     * @param array $args An associative array. The following are options for keys:
     *     name - the name of the instance group
     *     account - the account of the instance group. The account parameter must be
     *        used with the domainId parameter.
     *     domainid - the domain ID of account owning the instance group
     *     projectid - The project of the instance group
     */
    public function createInstanceGroup($args=array()) {

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        return $this->request('createInstanceGroup', $args);
    }


    /**
     * Deletes a vm group
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the instance group
     */
    public function deleteInstanceGroup($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteInstanceGroup', $args);
    }


    /**
     * Updates a vm group
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - Instance group ID
     *     name - new instance group name
     */
    public function updateInstanceGroup($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateInstanceGroup', $args);
    }


    /**
     * Lists vm groups
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     id - list instance groups by ID
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     name - list instance groups by name
     *     page -
     *     pagesize -
     *     projectid - list firewall rules by project
     *     page - Pagination
     */
    public function listInstanceGroups($args=array()) {

        return $this->request('listInstanceGroups', $args);
    }


    /**
     * Creates a service offering.
     *
     * @param array $args An associative array. The following are options for keys:
     *     cpunumber - the CPU number of the service offering
     *     cpuspeed - the CPU speed of the service offering in MHz.
     *     displaytext - the display text of the service offering
     *     memory - the total memory of the service offering in MB
     *     name - the name of the service offering
     *     domainid - the ID of the containing domain, null for public offerings
     *     hosttags - the host tag for this service offering.
     *     issystem - is this a system vm offering
     *     limitcpuuse - restrict the CPU usage to committed service offering
     *     networkrate - data transfer rate in megabits per second allowed. Supported
     *        only for non-System offering and system offerings having "domainrouter"
     *        systemvmtype
     *     offerha - the HA for the service offering
     *     storagetype - the storage type of the service offering. Values are local and
     *        shared.
     *     systemvmtype - the system VM type. Possible types are "domainrouter",
     *        "consoleproxy" and "secondarystoragevm".
     *     tags - the tags for this service offering.
     */
    public function createServiceOffering($args=array()) {

        if (!isset($args['cpunumber']) || strlen($args['cpunumber']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'cpunumber'), MISSING_ARGUMENT);

        if (!isset($args['cpuspeed']) || strlen($args['cpuspeed']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'cpuspeed'), MISSING_ARGUMENT);

        if (!isset($args['displaytext']) || strlen($args['displaytext']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'displaytext'), MISSING_ARGUMENT);

        if (!isset($args['memory']) || strlen($args['memory']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'memory'), MISSING_ARGUMENT);

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        return $this->request('createServiceOffering', $args);
    }


    /**
     * Deletes a service offering.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the service offering
     */
    public function deleteServiceOffering($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteServiceOffering', $args);
    }


    /**
     * Updates a service offering.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the service offering to be updated
     *     displaytext - the display text of the service offering to be updated
     *     name - the name of the service offering to be updated
     *     sortkey - sort key of the service offering, integer
     */
    public function updateServiceOffering($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateServiceOffering', $args);
    }


    /**
     * Lists all available service offerings.
     *
     * @param array $args An associative array. The following are options for keys:
     *     domainid - the ID of the domain associated with the service offering
     *     id - ID of the service offering
     *     issystem - is this a system vm offering
     *     keyword - List by keyword
     *     name - name of the service offering
     *     page -
     *     pagesize -
     *     systemvmtype - the system VM type. Possible types are "consoleproxy",
     *        "secondarystoragevm" or "domainrouter".
     *     virtualmachineid - the ID of the virtual machine. Pass this in if you want
     *        to see the available service offering that a virtual machine can be changed to.
     *     page - Pagination
     */
    public function listServiceOfferings($args=array()) {

        return $this->request('listServiceOfferings', $args);
    }


    /**
     * Creates a new Pod.
     *
     * @param array $args An associative array. The following are options for keys:
     *     gateway - the gateway for the Pod
     *     name - the name of the Pod
     *     netmask - the netmask for the Pod
     *     startip - the starting IP address for the Pod
     *     zoneid - the Zone ID in which the Pod will be created
     *     allocationstate - Allocation state of this Pod for allocation of new
     *        resources
     *     endip - the ending IP address for the Pod
     */
    public function createPod($args=array()) {

        if (!isset($args['gateway']) || strlen($args['gateway']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'gateway'), MISSING_ARGUMENT);

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        if (!isset($args['netmask']) || strlen($args['netmask']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'netmask'), MISSING_ARGUMENT);

        if (!isset($args['startip']) || strlen($args['startip']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'startip'), MISSING_ARGUMENT);

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('createPod', $args);
    }


    /**
     * Updates a Pod.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the Pod
     *     allocationstate - Allocation state of this cluster for allocation of new
     *        resources
     *     endip - the ending IP address for the Pod
     *     gateway - the gateway for the Pod
     *     name - the name of the Pod
     *     netmask - the netmask of the Pod
     *     startip - the starting IP address for the Pod
     */
    public function updatePod($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updatePod', $args);
    }


    /**
     * Deletes a Pod.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the Pod
     */
    public function deletePod($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deletePod', $args);
    }


    /**
     * Lists all Pods.
     *
     * @param array $args An associative array. The following are options for keys:
     *     allocationstate - list pods by allocation state
     *     id - list Pods by ID
     *     keyword - List by keyword
     *     name - list Pods by name
     *     page -
     *     pagesize -
     *     showcapacities - flag to display the capacity of the pods
     *     zoneid - list Pods by Zone ID
     *     page - Pagination
     */
    public function listPods($args=array()) {

        return $this->request('listPods', $args);
    }


    /**
     * Creates a disk offering.
     *
     * @param array $args An associative array. The following are options for keys:
     *     displaytext - alternate display text of the disk offering
     *     name - name of the disk offering
     *     customized - whether disk offering is custom or not
     *     disksize - size of the disk offering in GB
     *     domainid - the ID of the containing domain, null for public offerings
     *     tags - tags for the disk offering
     */
    public function createDiskOffering($args=array()) {

        if (!isset($args['displaytext']) || strlen($args['displaytext']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'displaytext'), MISSING_ARGUMENT);

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        return $this->request('createDiskOffering', $args);
    }


    /**
     * Updates a disk offering.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - ID of the disk offering
     *     displaytext - updates alternate display text of the disk offering with this
     *        value
     *     name - updates name of the disk offering with this value
     *     sortkey - sort key of the disk offering, integer
     */
    public function updateDiskOffering($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateDiskOffering', $args);
    }


    /**
     * Updates a disk offering.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - ID of the disk offering
     */
    public function deleteDiskOffering($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteDiskOffering', $args);
    }


    /**
     * Lists all available disk offerings.
     *
     * @param array $args An associative array. The following are options for keys:
     *     domainid - the ID of the domain of the disk offering.
     *     id - ID of the disk offering
     *     keyword - List by keyword
     *     name - name of the disk offering
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listDiskOfferings($args=array()) {

        return $this->request('listDiskOfferings', $args);
    }


    /**
     * Adds a new cluster
     *
     * @param array $args An associative array. The following are options for keys:
     *     clustername - the cluster name
     *     clustertype - type of the cluster: CloudManaged, ExternalManaged
     *     hypervisor - hypervisor type of the cluster:
     *        XenServer,KVM,VMware,Hyperv,BareMetal,Simulator
     *     zoneid - the Zone ID for the cluster
     *     allocationstate - Allocation state of this cluster for allocation of new
     *        resources
     *     password - the password for the host
     *     podid - the Pod ID for the host
     *     url - the URL
     *     username - the username for the cluster
     */
    public function addCluster($args=array()) {

        if (!isset($args['clustername']) || strlen($args['clustername']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'clustername'), MISSING_ARGUMENT);

        if (!isset($args['clustertype']) || strlen($args['clustertype']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'clustertype'), MISSING_ARGUMENT);

        if (!isset($args['hypervisor']) || strlen($args['hypervisor']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'hypervisor'), MISSING_ARGUMENT);

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('addCluster', $args);
    }


    /**
     * Deletes a cluster.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the cluster ID
     */
    public function deleteCluster($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteCluster', $args);
    }


    /**
     * Updates an existing cluster
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the Cluster
     *     allocationstate - Allocation state of this cluster for allocation of new
     *        resources
     *     clustername - the cluster name
     *     clustertype - hypervisor type of the cluster
     *     hypervisor - hypervisor type of the cluster
     *     managedstate - whether this cluster is managed by cloudstack
     */
    public function updateCluster($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('updateCluster', $args);
    }


    /**
     * Lists clusters.
     *
     * @param array $args An associative array. The following are options for keys:
     *     allocationstate - lists clusters by allocation state
     *     clustertype - lists clusters by cluster type
     *     hypervisor - lists clusters by hypervisor type
     *     id - lists clusters by the cluster ID
     *     keyword - List by keyword
     *     managedstate - whether this cluster is managed by cloudstack
     *     name - lists clusters by the cluster name
     *     page -
     *     pagesize -
     *     podid - lists clusters by Pod ID
     *     showcapacities - flag to display the capacity of the clusters
     *     zoneid - lists clusters by Zone ID
     *     page - Pagination
     */
    public function listClusters($args=array()) {

        return $this->request('listClusters', $args);
    }


    /**
     * Creates a l2tp/ipsec remote access vpn
     *
     * @param array $args An associative array. The following are options for keys:
     *     publicipid - public ip address id of the vpn server
     *     account - an optional account for the VPN. Must be used with domainId.
     *     domainid - an optional domainId for the VPN. If the account parameter is
     *        used, domainId must also be used.
     *     iprange - the range of ip addresses to allocate to vpn clients. The first ip
     *        in the range will be taken by the vpn server
     *     openfirewall - if true, firewall rule for source/end pubic port is
     *        automatically created; if false - firewall rule has to be created explicitely.
     *        Has value true by default
     */
    public function createRemoteAccessVpn($args=array()) {

        if (!isset($args['publicipid']) || strlen($args['publicipid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'publicipid'), MISSING_ARGUMENT);

        return $this->request('createRemoteAccessVpn', $args);
    }


    /**
     * Destroys a l2tp/ipsec remote access vpn
     *
     * @param array $args An associative array. The following are options for keys:
     *     publicipid - public ip address id of the vpn server
     */
    public function deleteRemoteAccessVpn($args=array()) {

        if (!isset($args['publicipid']) || strlen($args['publicipid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'publicipid'), MISSING_ARGUMENT);

        return $this->request('deleteRemoteAccessVpn', $args);
    }


    /**
     * Lists remote access vpns
     *
     * @param array $args An associative array. The following are options for keys:
     *     publicipid - public ip address id of the vpn server
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     page -
     *     pagesize -
     *     projectid - list firewall rules by project
     *     page - Pagination
     */
    public function listRemoteAccessVpns($args=array()) {

        if (!isset($args['publicipid']) || strlen($args['publicipid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'publicipid'), MISSING_ARGUMENT);

        return $this->request('listRemoteAccessVpns', $args);
    }


    /**
     * Creates a VLAN IP range.
     *
     * @param array $args An associative array. The following are options for keys:
     *     startip - the beginning IP address in the VLAN IP range
     *     account - account who will own the VLAN. If VLAN is Zone wide, this
     *        parameter should be ommited
     *     domainid - domain ID of the account owning a VLAN
     *     endip - the ending IP address in the VLAN IP range
     *     forvirtualnetwork - true if VLAN is of Virtual type, false if Direct
     *     gateway - the gateway of the VLAN IP range
     *     netmask - the netmask of the VLAN IP range
     *     networkid - the network id
     *     physicalnetworkid - the physical network id
     *     podid - optional parameter. Have to be specified for Direct Untagged vlan
     *        only.
     *     projectid - project who will own the VLAN. If VLAN is Zone wide, this
     *        parameter should be ommited
     *     vlan - the ID or VID of the VLAN. Default is an "untagged" VLAN.
     *     zoneid - the Zone ID of the VLAN IP range
     */
    public function createVlanIpRange($args=array()) {

        if (!isset($args['startip']) || strlen($args['startip']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'startip'), MISSING_ARGUMENT);

        return $this->request('createVlanIpRange', $args);
    }


    /**
     * Creates a VLAN IP range.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the id of the VLAN IP range
     */
    public function deleteVlanIpRange($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteVlanIpRange', $args);
    }


    /**
     * Lists all VLAN IP ranges.
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - the account with which the VLAN IP range is associated. Must be
     *        used with the domainId parameter.
     *     domainid - the domain ID with which the VLAN IP range is associated.  If
     *        used with the account parameter, returns all VLAN IP ranges for that account in
     *        the specified domain.
     *     forvirtualnetwork - true if VLAN is of Virtual type, false if Direct
     *     id - the ID of the VLAN IP range
     *     keyword - List by keyword
     *     networkid - network id of the VLAN IP range
     *     page -
     *     pagesize -
     *     physicalnetworkid - physical network id of the VLAN IP range
     *     podid - the Pod ID of the VLAN IP range
     *     projectid - project who will own the VLAN
     *     vlan - the ID or VID of the VLAN. Default is an "untagged" VLAN.
     *     zoneid - the Zone ID of the VLAN IP range
     *     page - Pagination
     */
    public function listVlanIpRanges($args=array()) {

        return $this->request('listVlanIpRanges', $args);
    }


    /**
     * Create a new keypair and returns the private key
     *
     * @param array $args An associative array. The following are options for keys:
     *     name - Name of the keypair
     *     account - an optional account for the ssh key. Must be used with domainId.
     *     domainid - an optional domainId for the ssh key. If the account parameter is
     *        used, domainId must also be used.
     *     projectid - an optional project for the ssh key
     */
    public function createSSHKeyPair($args=array()) {

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        return $this->request('createSSHKeyPair', $args);
    }


    /**
     * Deletes a keypair by name
     *
     * @param array $args An associative array. The following are options for keys:
     *     name - Name of the keypair
     *     account - the account associated with the keypair. Must be used with the
     *        domainId parameter.
     *     domainid - the domain ID associated with the keypair
     *     projectid - the project associated with keypair
     */
    public function deleteSSHKeyPair($args=array()) {

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        return $this->request('deleteSSHKeyPair', $args);
    }


    /**
     * List registered keypairs
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     fingerprint - A public key fingerprint to look for
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     name - A key pair name to look for
     *     page -
     *     pagesize -
     *     projectid - list firewall rules by project
     *     page - Pagination
     */
    public function listSSHKeyPairs($args=array()) {

        return $this->request('listSSHKeyPairs', $args);
    }


    /**
     * Updates resource limits for an account or domain.
     *
     * @param array $args An associative array. The following are options for keys:
     *     resourcetype - Type of resource to update. Values are 0, 1, 2, 3, and 4. 0 -
     *        Instance. Number of instances a user can create. 1 - IP. Number of public IP
     *        addresses a user can own. 2 - Volume. Number of disk volumes a user can create.3
     *        - Snapshot. Number of snapshots a user can create.4 - Template. Number of
     *        templates that a user can register/create.
     *     account - Update resource for a specified account. Must be used with the
     *        domainId parameter.
     *     domainid - Update resource limits for all accounts in specified domain. If
     *        used with the account parameter, updates resource limits for a specified account
     *        in specified domain.
     *     max - Maximum resource limit.
     *     projectid - Update resource limits for project
     */
    public function updateResourceLimit($args=array()) {

        if (!isset($args['resourcetype']) || strlen($args['resourcetype']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'resourcetype'), MISSING_ARGUMENT);

        return $this->request('updateResourceLimit', $args);
    }


    /**
     * Recalculate and update resource count for an account or domain.
     *
     * @param array $args An associative array. The following are options for keys:
     *     domainid - If account parameter specified then updates resource counts for a
     *        specified account in this domain else update resource counts for all accounts &
     *        child domains in specified domain.
     *     account - Update resource count for a specified account. Must be used with
     *        the domainId parameter.
     *     projectid - Update resource limits for project
     *     resourcetype - Type of resource to update. If specifies valid values are 0,
     *        1, 2, 3, and 4. If not specified will update all resource counts0 - Instance.
     *        Number of instances a user can create. 1 - IP. Number of public IP addresses a
     *        user can own. 2 - Volume. Number of disk volumes a user can create.3 - Snapshot.
     *        Number of snapshots a user can create.4 - Template. Number of templates that a
     *        user can register/create.
     */
    public function updateResourceCount($args=array()) {

        if (!isset($args['domainid']) || strlen($args['domainid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'domainid'), MISSING_ARGUMENT);

        return $this->request('updateResourceCount', $args);
    }


    /**
     * Lists resource limits.
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     id - Lists resource limits by ID.
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     page -
     *     pagesize -
     *     projectid - list firewall rules by project
     *     resourcetype - Type of resource to update. Values are 0, 1, 2, 3, and 4. 0 -
     *        Instance. Number of instances a user can create. 1 - IP. Number of public IP
     *        addresses a user can own. 2 - Volume. Number of disk volumes a user can create.3
     *        - Snapshot. Number of snapshots a user can create.4 - Template. Number of
     *        templates that a user can register/create.
     *     page - Pagination
     */
    public function listResourceLimits($args=array()) {

        return $this->request('listResourceLimits', $args);
    }


    /**
     * List hypervisors
     *
     * @param array $args An associative array. The following are options for keys:
     *     zoneid - the zone id for listing hypervisors.
     *     page - Pagination
     */
    public function listHypervisors($args=array()) {

        return $this->request('listHypervisors', $args);
    }


    /**
     * Updates a hypervisor capabilities.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - ID of the hypervisor capability
     *     maxguestslimit - the max number of Guest VMs per host for this hypervisor.
     *     securitygroupenabled - set true to enable security group for this
     *        hypervisor.
     */
    public function updateHypervisorCapabilities($args=array()) {

        return $this->request('updateHypervisorCapabilities', $args);
    }


    /**
     * Lists all hypervisor capabilities.
     *
     * @param array $args An associative array. The following are options for keys:
     *     hypervisor - the hypervisor for which to restrict the search
     *     id - ID of the hypervisor capability
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listHypervisorCapabilities($args=array()) {

        return $this->request('listHypervisorCapabilities', $args);
    }


    /**
     * Adds F5 external load balancer appliance.
     *
     * @param array $args An associative array. The following are options for keys:
     *     password - Password of the external load balancer appliance.
     *     url - URL of the external load balancer appliance.
     *     username - Username of the external load balancer appliance.
     *     zoneid - Zone in which to add the external load balancer appliance.
     */
    public function addExternalLoadBalancer($args=array()) {

        if (!isset($args['password']) || strlen($args['password']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'password'), MISSING_ARGUMENT);

        if (!isset($args['url']) || strlen($args['url']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'url'), MISSING_ARGUMENT);

        if (!isset($args['username']) || strlen($args['username']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'username'), MISSING_ARGUMENT);

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('addExternalLoadBalancer', $args);
    }


    /**
     * Deletes a F5 external load balancer appliance added in a zone.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - Id of the external loadbalancer appliance.
     */
    public function deleteExternalLoadBalancer($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteExternalLoadBalancer', $args);
    }


    /**
     * Lists F5 external load balancer appliances added in a zone.
     *
     * @param array $args An associative array. The following are options for keys:
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     zoneid - zone Id
     *     page - Pagination
     */
    public function listExternalLoadBalancers($args=array()) {

        return $this->request('listExternalLoadBalancers', $args);
    }


    /**
     * Adds an external firewall appliance
     *
     * @param array $args An associative array. The following are options for keys:
     *     password - Password of the external firewall appliance.
     *     url - URL of the external firewall appliance.
     *     username - Username of the external firewall appliance.
     *     zoneid - Zone in which to add the external firewall appliance.
     */
    public function addExternalFirewall($args=array()) {

        if (!isset($args['password']) || strlen($args['password']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'password'), MISSING_ARGUMENT);

        if (!isset($args['url']) || strlen($args['url']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'url'), MISSING_ARGUMENT);

        if (!isset($args['username']) || strlen($args['username']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'username'), MISSING_ARGUMENT);

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('addExternalFirewall', $args);
    }


    /**
     * Deletes an external firewall appliance.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - Id of the external firewall appliance.
     */
    public function deleteExternalFirewall($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('deleteExternalFirewall', $args);
    }


    /**
     * List external firewall appliances.
     *
     * @param array $args An associative array. The following are options for keys:
     *     zoneid - zone Id
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listExternalFirewalls($args=array()) {

        if (!isset($args['zoneid']) || strlen($args['zoneid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'zoneid'), MISSING_ARGUMENT);

        return $this->request('listExternalFirewalls', $args);
    }


    /**
     * Updates a configuration.
     *
     * @param array $args An associative array. The following are options for keys:
     *     name - the name of the configuration
     *     value - the value of the configuration
     */
    public function updateConfiguration($args=array()) {

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        return $this->request('updateConfiguration', $args);
    }


    /**
     * Lists all configurations.
     *
     * @param array $args An associative array. The following are options for keys:
     *     category - lists configurations by category
     *     keyword - List by keyword
     *     name - lists configuration by name
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listConfigurations($args=array()) {

        return $this->request('listConfigurations', $args);
    }


    /**
     * Lists capabilities
     *
     * @param array $args An associative array. The following are options for keys:
     *     page - Pagination
     */
    public function listCapabilities($args=array()) {

        return $this->request('listCapabilities', $args);
    }


    /**
     * Acquires and associates a public IP to an account.
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - the account to associate with this IP address
     *     domainid - the ID of the domain to associate with this IP address
     *     networkid - The network this ip address should be associated to.
     *     projectid - Deploy vm for the project
     *     zoneid - the ID of the availability zone you want to acquire an public IP
     *        address from
     */
    public function associateIpAddress($args=array()) {

        return $this->request('associateIpAddress', $args);
    }


    /**
     * Disassociates an ip address from the account.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the id of the public ip address to disassociate
     */
    public function disassociateIpAddress($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('disassociateIpAddress', $args);
    }


    /**
     * Lists all public ip addresses
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     allocatedonly - limits search results to allocated public IP addresses
     *     associatednetworkid - lists all public IP addresses associated to the
     *        network specified
     *     domainid - list only resources belonging to the domain specified
     *     forloadbalancing - list only ips used for load balancing
     *     forvirtualnetwork - the virtual network for the IP address
     *     id - lists ip address by id
     *     ipaddress - lists the specified IP address
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     issourcenat - list only source nat ip addresses
     *     isstaticnat - list only static nat ip addresses
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     page -
     *     pagesize -
     *     physicalnetworkid - lists all public IP addresses by physical network id
     *     projectid - list firewall rules by project
     *     vlanid - lists all public IP addresses by VLAN ID
     *     zoneid - lists all public IP addresses by Zone ID
     *     page - Pagination
     */
    public function listPublicIpAddresses($args=array()) {

        return $this->request('listPublicIpAddresses', $args);
    }


    /**
     * Adds Swift.
     *
     * @param array $args An associative array. The following are options for keys:
     *     url - the URL for swift
     *     account - the account for swift
     *     key - key for the user for swift
     *     username - the username for swift
     */
    public function addSwift($args=array()) {

        if (!isset($args['url']) || strlen($args['url']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'url'), MISSING_ARGUMENT);

        return $this->request('addSwift', $args);
    }


    /**
     * List Swift.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the id of the swift
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listSwifts($args=array()) {

        return $this->request('listSwifts', $args);
    }


    /**
     * Puts storage pool into maintenance state
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - Primary storage ID
     */
    public function enableStorageMaintenance($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('enableStorageMaintenance', $args);
    }


    /**
     * Cancels maintenance for primary storage
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the primary storage ID
     */
    public function cancelStorageMaintenance($args=array()) {

        if (!isset($args['id']) || strlen($args['id']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'id'), MISSING_ARGUMENT);

        return $this->request('cancelStorageMaintenance', $args);
    }


    /**
     * Lists all supported OS types for this cloud.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - list by Os type Id
     *     keyword - List by keyword
     *     oscategoryid - list by Os Category id
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listOsTypes($args=array()) {

        return $this->request('listOsTypes', $args);
    }


    /**
     * Lists all supported OS categories for this cloud.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - list Os category by id
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     page - Pagination
     */
    public function listOsCategories($args=array()) {

        return $this->request('listOsCategories', $args);
    }


    /**
     * A command to list events.
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     duration - the duration of the event
     *     enddate - the end date range of the list you want to retrieve (use format
     *        "yyyy-MM-dd" or the new format "yyyy-MM-dd HH:mm:ss")
     *     entrytime - the time the event was entered
     *     id - the ID of the event
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     level - the event level (INFO, WARN, ERROR)
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     page -
     *     pagesize -
     *     projectid - list firewall rules by project
     *     startdate - the start date range of the list you want to retrieve (use
     *        format "yyyy-MM-dd" or the new format "yyyy-MM-dd HH:mm:ss")
     *     type - the event type (see event types)
     *     page - Pagination
     */
    public function listEvents($args=array()) {

        return $this->request('listEvents', $args);
    }


    /**
     * List Event Types
     *
     * @param array $args An associative array. The following are options for keys:
     *     page - Pagination
     */
    public function listEventTypes($args=array()) {

        return $this->request('listEventTypes', $args);
    }


    /**
     * Retrieves the current status of asynchronous job.
     *
     * @param array $args An associative array. The following are options for keys:
     *     jobid - the ID of the asychronous job
     */
    public function queryAsyncJobResult($args=array()) {

        if (!isset($args['jobid']) || strlen($args['jobid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'jobid'), MISSING_ARGUMENT);

        return $this->request('queryAsyncJobResult', $args);
    }


    /**
     * Lists all pending asynchronous jobs for the account.
     *
     * @param array $args An associative array. The following are options for keys:
     *     account - List resources by account. Must be used with the domainId
     *        parameter.
     *     domainid - list only resources belonging to the domain specified
     *     isrecursive - defaults to false, but if true, lists all resources from the
     *        parent specified by the domainId till leaves.
     *     keyword - List by keyword
     *     listall - If set to false, list only resources belonging to the command's
     *        caller; if set to true - list resources that the caller is authorized to see.
     *        Default value is false
     *     page -
     *     pagesize -
     *     startdate - the start date of the async job
     *     page - Pagination
     */
    public function listAsyncJobs($args=array()) {

        return $this->request('listAsyncJobs', $args);
    }


    /**
     * Lists all the system wide capacities.
     *
     * @param array $args An associative array. The following are options for keys:
     *     clusterid - lists capacity by the Cluster ID
     *     fetchlatest - recalculate capacities and fetch the latest
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     podid - lists capacity by the Pod ID
     *     sortby - Sort the results. Available values: Usage
     *     type - lists capacity by type* CAPACITY_TYPE_MEMORY = 0* CAPACITY_TYPE_CPU =
     *        1* CAPACITY_TYPE_STORAGE = 2* CAPACITY_TYPE_STORAGE_ALLOCATED = 3*
     *        CAPACITY_TYPE_VIRTUAL_NETWORK_PUBLIC_IP = 4* CAPACITY_TYPE_PRIVATE_IP = 5*
     *        CAPACITY_TYPE_SECONDARY_STORAGE = 6* CAPACITY_TYPE_VLAN = 7*
     *        CAPACITY_TYPE_DIRECT_ATTACHED_PUBLIC_IP = 8* CAPACITY_TYPE_LOCAL_STORAGE = 9.
     *     zoneid - lists capacity by the Zone ID
     *     page - Pagination
     */
    public function listCapacity($args=array()) {

        return $this->request('listCapacity', $args);
    }


    /**
     * Register a public key in a keypair under a certain name
     *
     * @param array $args An associative array. The following are options for keys:
     *     name - Name of the keypair
     *     publickey - Public key material of the keypair
     *     account - an optional account for the ssh key. Must be used with domainId.
     *     domainid - an optional domainId for the ssh key. If the account parameter is
     *        used, domainId must also be used.
     *     projectid - an optional project for the ssh key
     */
    public function registerSSHKeyPair($args=array()) {

        if (!isset($args['name']) || strlen($args['name']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'name'), MISSING_ARGUMENT);

        if (!isset($args['publickey']) || strlen($args['publickey']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'publickey'), MISSING_ARGUMENT);

        return $this->request('registerSSHKeyPair', $args);
    }


    /**
     * Logs out the user
     *
     * @param array $args An associative array. The following are options for keys:
     */
    public function logout($args=array()) {

        return $this->request('logout', $args);
    }


    /**
     * Logs a user into the CloudStack. A successful login attempt will generate a
     * JSESSIONID cookie value that can be passed in subsequent Query command calls
     * until the "logout" command has been issued or the session has expired.
     *
     * @param array $args An associative array. The following are options for keys:
     *     username - Username
     *     password - Hashed password (Default is MD5). If you wish to use any other
     *        hashing algorithm, you would need to write a custom authentication adapter See
     *        Docs section.
     *     domain - path of the domain that the user belongs to. Example:
     *        domain=/com/cloud/internal.  If no domain is passed in, the ROOT domain is
     *        assumed.
     *     domainId - id of the domain that the user belongs to. If both domain and
     *        domainId are passed in, "domainId" parameter takes precendence
     */
    public function login($args=array()) {

        if (!isset($args['username']) || strlen($args['username']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'username'), MISSING_ARGUMENT);

        if (!isset($args['password']) || strlen($args['password']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'password'), MISSING_ARGUMENT);

        return $this->request('login', $args);
    }


    /**
     * Configure the LDAP context for this site.
     *
     * @param array $args An associative array. The following are options for keys:
     *     hostname - Hostname or ip address of the ldap server eg: my.ldap.com
     *     queryfilter - You specify a query filter here, which narrows down the users,
     *        who can be part of this domain.
     *     searchbase - The search base defines the starting point for the search in
     *        the directory tree Example:  dc=cloud,dc=com.
     *     binddn - Specify the distinguished name of a user with the search permission
     *        on the directory.
     *     bindpass - Enter the password.
     *     port - Specify the LDAP port if required, default is 389.
     *     ssl - Check Use SSL if the external LDAP server is configured for LDAP over
     *        SSL.
     *     truststore - Enter the path to trust certificates store.
     *     truststorepass - Enter the password for trust store.
     */
    public function ldapConfig($args=array()) {

        if (!isset($args['hostname']) || strlen($args['hostname']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'hostname'), MISSING_ARGUMENT);

        if (!isset($args['queryfilter']) || strlen($args['queryfilter']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'queryfilter'), MISSING_ARGUMENT);

        if (!isset($args['searchbase']) || strlen($args['searchbase']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'searchbase'), MISSING_ARGUMENT);

        return $this->request('ldapConfig', $args);
    }


    /**
     * Retrieves a cloud identifier.
     *
     * @param array $args An associative array. The following are options for keys:
     *     userid - the user ID for the cloud identifier
     */
    public function getCloudIdentifier($args=array()) {

        if (!isset($args['userid']) || strlen($args['userid']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'userid'), MISSING_ARGUMENT);

        return $this->request('getCloudIdentifier', $args);
    }


    /**
     * Uploads custom certificate
     *
     * @param array $args An associative array. The following are options for keys:
     *     certificate - the custom cert to be uploaded
     *     domainsuffix - DNS domain suffix that the certificate is granted for
     *     id - the custom cert id in the chain
     *     name - the alias of the certificate
     *     privatekey - the private key for the certificate
     */
    public function uploadCustomCertificate($args=array()) {

        if (!isset($args['certificate']) || strlen($args['certificate']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'certificate'), MISSING_ARGUMENT);

        if (!isset($args['domainsuffix']) || strlen($args['domainsuffix']) == 0)
            throw new CloudStackClientException(sprintf(MISSING_ARGUMENT_MSG, 'domainsuffix'), MISSING_ARGUMENT);

        return $this->request('uploadCustomCertificate', $args);
    }


    /**
     * Lists all alerts.
     *
     * @param array $args An associative array. The following are options for keys:
     *     id - the ID of the alert
     *     keyword - List by keyword
     *     page -
     *     pagesize -
     *     type - list by alert type
     *     page - Pagination
     */
    public function listAlerts($args=array()) {

        return $this->request('listAlerts', $args);
    }


}
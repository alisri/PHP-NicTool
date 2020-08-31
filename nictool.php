<?php
/**
 * Class NicTool
 * Author: Mohammad A. Souri (MAS)
 * Email: Souri.blackhat@gmail.com
 * Created date: 2020-08-27
 * All right reserved©.
 */


final class NicTool {
    private $username;
    private $password;
    private $client;
    private $authentication;
    /**
     * NicTool constructor.
     * @param $location
     * 'http://IP:8082/soap';
     * @param $uri
     * 'http://IP:8082/NicToolServer/SOAP';
     * @param $username
     * Admin Login username
     * @param $password
     * Admin Login password
     */
    public function __construct($location, $uri, $username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->client =  new SoapClient(null, array('location' => $location, 'uri'=> $uri));
        $this->login();
    }

    private function login(){
        $requestParams = array(
            'nt_protocol_version' => '1.0',
            'password' => $this->password,
            'username' => $this->username
        );
        $this->authentication = $this->client->login($requestParams);
    }

    public function get_group_zones($nt_group_id, $limit, $page){
        $requestParams = array(
            'nt_group_id' => $nt_group_id,
            'limit' => $limit,
            'page'=>$page,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_group_zones($requestParams);
    }

    public function get_zone_record($nt_zone_record_id, $nt_group_id){
        $requestParams = array(
            'nt_zone_record_id' => $nt_zone_record_id,
            'nt_group_id' => $nt_group_id,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_zone_record($requestParams);
    }

    public function get_zone_log($nt_zone_id, $page, $start, $limit, $Sort, $N_sortfield, $N_sortmod, $N_field, $search_query, $Search, $N_option, $N_value, $N_inclusive, $quick_search, $search_value){
        $requestParams = array(
            'nt_zone_id' =>$nt_zone_id,
            'page' => $page,
            'start' => $start,
            'limit' => $limit,
            'Sort' => $Sort,
            'N_sortfield' => $N_sortfield,
            'N_sortmod' => $N_sortmod,
            'N_field' => $N_field,
            'search_query' => $search_query,
            'Search' => $Search,
            'N_option' => $N_option,
            'N_value' => $N_value,
            'N_inclusive' => $N_inclusive,
            'quick_search' => $quick_search,
            'search_value' => $search_value,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_zone_log($requestParams);
    }

    public function get_zone_records($nt_zone_id){
        $requestParams = array(
            'nt_zone_id' => $nt_zone_id,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_zone_records($requestParams);
    }
    public function get_zone_record_log_entry($nt_zone_id, $nt_zone_record_id, $nt_zone_record_log_id){
        $requestParams = array(
            'nt_zone_id' => $nt_zone_id,
            'nt_zone_record_id' => $nt_zone_record_id,
            'nt_zone_record_log_id' => $nt_zone_record_log_id,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_zone_record_log_entry($requestParams);
    }
    public function get_zone_record_delegates($nt_zone_record_id){
        $requestParams = array(
            'nt_zone_record_id' => $nt_zone_record_id,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_zone_record_delegates($requestParams);
    }
    public function get_zone_record_log($nt_zone_id, $page, $start, $limit, $Sort, $N_sortfield, $N_sortmod, $N_field, $search_query, $Search, $N_option, $N_value, $N_value, $quick_search, $search_value){
        $requestParams = array(
            $nt_zone_id,
            'page' => $page,
            'start' => $start,
            'limit' => $limit,
            'Sort' => $Sort,
            'N_sortfield' => $N_sortfield,
            'N_sortmod' => $N_sortmod,
            'N_field' => $N_field,
            'search_query' => $search_query,
            'Search' => $Search,
            'N_option' => $N_option,
            'N_value' => $N_value,
            'N_value' => $N_value,
            'quick_search' => $quick_search,
            'search_value' => $search_value,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_zone_record_log($requestParams);
    }

    public function new_zone($nt_zone_id, $nt_group_id, $zone, $ttl, $nameservers, $mailaddr, $description){
        $requestParams = array(
            'nt_zone_id' => $nt_zone_id,
            'nt_group_id'=> $nt_group_id,
            'zone' => $zone,
            'ttl' => $ttl,
            'nameservers' => $nameservers,
            'mailaddr' => $mailaddr,
            'description' => $description,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->new_zone($requestParams);
    }

    public function get_user($nt_user_id){
        $requestParams = array(
            'nt_user_id' => $nt_user_id,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_user($requestParams);
    }

    public function get_user_global_log($nt_user_id, $nt_group_id, $page, $start, $limit, $Sort, $N_sortfield, $N_sortmod, $N_field, $search_query, $Search, $N_option, $N_value, $N_inclusive, $quick_search, $search_value){
        $requestParams = array(
            'nt_user_id' => $nt_user_id,
            'nt_group_id'=> $nt_group_id,
            'page'=>$page,
            'start'=>$start,
            'limit' =>$limit,
            'sort'=>$Sort,
            'N_sortfield'=>$N_sortfield,
            'N_sortmod' => $N_sortmod,
            'N_field' => $N_field,
            'search_query'=>$search_query,
            'Search'=>$Search,
            'N_option'=>$N_option,
            'N_value'=>$N_value,
            'N_inclusive'=>$N_inclusive,
            'quick_search'=>$quick_search,
            'search_value'=>$search_value,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_user_global_log($requestParams);
    }

    public function logout(){
        return $this->client->logout();
    }


    public function move_nameservers($nameserver_list, $nt_group_id){
        $requestParams = array(
            'nameserver_list'=>$nameserver_list,
            'nt_group_id'=>$nt_group_id,
            'nt_user_session' => $this->authentication->nt_user_session
        );

        return $this->client->move_nameservers($requestParams);
    }
    public function get_zone_summary($nt_zone_id){
        $requestParams = array(
            'nt_zone_id'=>$nt_zone_id,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_zone_summary($requestParams);
    }

    public function move_users($user_list, $nt_group_id){
        $requestParams = array(
            'user_list'=>$user_list,
            'nt_group_id'=>$nt_group_id,
            'nt_user_session' => $this->authentication->nt_user_session

        );
        return $this->client->move_users($requestParams);
    }

    public function new_nameserver($nt_nameserver_id, $nt_group_id, $datadir, $description, $output_format, $service_type, $logdir, $name, $address, $ttl, $nt_user_session ){
        $requestParams = array(
            'nt_nameserver_id' => $nt_nameserver_id,
            'nt_group_id' => $nt_group_id,
            'datadir' => $datadir,
            'description' => $description,
            'output_format' => $output_format,
            'service_type' => $service_type,
            'logdir' => $logdir,
            'name' => $name,
            'address' => $address,
            'ttl' => $ttl,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->new_nameserver($requestParams);
    }



    public function move_zones($zone_list, $nt_group_id){
        $requestParams = array(
            'zone_list'=>$zone_list,
            'nt_group_id'=>$nt_group_id,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->move_zones($requestParams);
    }
    public function new_group($nt_group_id, $gid, $name, $group_write, $group_create, $group_delete, $zone_write, $zone_create, $zone_delegate, $zone_delete, $zonerecord_write,$zonerecord_create, $zonerecord_delegate, $zonerecord_delete, $user_write, $user_create, $user_delete, $nameserver_write, $nameserver_create,$nameserver_delete, $self_write, $usable_nameservers){
        $requestParams = array(
            '$nt_group_id' => $nt_group_id,
            'gid' => $gid,
            'name' => $name,
            'group_write' => $group_write,
            'group_create' => $group_create,
            'group_delete' => $group_delete,
            'zone_write' => $zone_write,
            'zone_create' => $zone_create,
            'zone_delegate' => $zone_delegate,
            'zone_delete' => $zone_delete,
            'zonerecord_write' => $zonerecord_write,
            'zonerecord_create' => $zonerecord_create,
            'zonerecord_delegate' => $zonerecord_delegate,
            'zonerecord_delete' => $zonerecord_delete,
            'user_write' => $user_write,
            'user_create' => $user_create,
            '$user_delete' => $user_delete,
            'nameserver_write' => $nameserver_write,
            'nameserver_create' => $nameserver_create,
            'nameserver_delete' => $nameserver_delete,
            'self_write' => $self_write,
            'usable_nameservers' => $usable_nameservers,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->new_group($requestParams);
    }

    public function new_user($nt_group_id, $first_name, $email, $last_name, $username, $password, $password2, $group_write, $group_create, $group_delete, $zone_write, $zone_create, $zone_delegate, $zone_delete, $zonerecord_write, $zonerecord_create, $zonerecord_delegate, $zonerecord_delete, $user_write, $user_create, $user_delete, $nameserver_write, $nameserver_create, $nameserver_delete, $self_write, $inherit_group_permissions ){
        $requestParams = array(
            'nt_group_id' => $nt_group_id,
            'first_name' => $first_name,
            'email' => $email,
            'last_name' => $last_name,
            'username' => $username,
            'password' => $password,
            'password2' => $password2,
            'group_write' => $group_write,
            'group_create' => $group_create,
            'group_delete' => $group_delete,
            'zone_write' => $zone_write,
            'zone_create' => $zone_create,
            'zone_delegate' => $zone_delegate,
            'zone_delete' => $zone_delete,
            'zonerecord_write' => $zonerecord_write,
            'zonerecord_create' => $zonerecord_create,
            'zonerecord_delegate' => $zonerecord_delegate,
            'zonerecord_delete' => $zonerecord_delete,
            'user_write' => $user_write,
            'user_create' => $user_create,
            'user_delete' => $user_delete,
            'nameserver_write' => $nameserver_write,
            'nameserver_create' => $nameserver_create,
            'nameserver_delete' => $nameserver_delete,
            'self_write' => $self_write,
            'inherit_group_permissions' => $inherit_group_permissions,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->new_user($requestParams);
    }

    public function new_zone_record($nt_zone_record_id, $nt_zone_id, $name, $ttl, $description, $type, $address, $weight){
        $requestParams = array(
            'nt_zone_record_id' => $nt_zone_record_id,
            'nt_zone_id' => $nt_zone_id,
            'name' => $name,
            'ttl' => $ttl,
            'description' => $description,
            'type' => $type,
            'address' => $address,
            'weight' => $weight,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->new_zone_record($requestParams);
    }

    public function get_zone_list($zone_list){
        $requestParams = array(
            'zone_list' => $zone_list,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_zone_list($requestParams);
    }
    public function get_zone_delegates($nt_zone_id){
        $requestParams = array(
            'nt_zone_id' => $nt_zone_id,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_zone_delegates($requestParams);
    }
    public function get_user_permissions($nt_user_id){
        $requestParams = array(
            'nt_user_id' => $nt_user_id,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_user_permissions($requestParams);
    }

    /**
     * @param $user_list
     * string. This string is a list of user id's separated by commas.
     * @return mixed
     */
    public function get_user_list($user_list){
        $requestParams = array(
            'user_list' => $user_list,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_user_list($requestParams);
    }

    /**
     * @param $nameserver_list
     * string. This string is a list of nameserver ID's separated by commas.
     * @return mixed
     */
    public function get_nameserver_list($nameserver_list){
        $requestParams = array(
            'nameserver_list' => $nameserver_list,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_nameserver_list($requestParams);
    }

    /**
     * @param $nt_group_id
     * string. ID number of the group. REQUIRED.
     * @return mixed
     */
    public function get_nameserver_tree($nt_group_id){
        $requestParams = array(
            'nt_group_id' => $nt_group_id,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_nameserver_tree($requestParams);
    }

    /**
     * @param $nt_nameserver_idd
     * string. ID number of the nameserver. REQUIRED.
     * @return mixed
     */
    public function get_nameserver($nt_nameserver_idd){
        $requestParams = array(
            'nt_nameserver_id' => $nt_nameserver_idd,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_nameserver($requestParams);
    }

    /**
     * @param $nt_group_id
     * string. ID number of the group. REQUIRED.
     * @return mixed
     */
    public function get_group_permissions($nt_group_id){
        $requestParams = array(
            'nt_group_id' => $nt_group_id,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_group_permissions($requestParams);
    }


    public function get_group_nameservers($include_subgroups, $page, $start, $limit, $Sort, $N_sortfield, $N_sortmod, $N_field, $search_query, $Search, $N_option, $N_value, $N_inclusive, $quick_search, $search_value){
        $requestParams = array(
            'nt_group_id' => $nt_group_id,
            'include_subgroups' => $include_subgroups,
            'page' => $page,
            'start' => $start,
            'limit' => $limit,
            'Sort' => $Sort,
            'N_sortfield' => $N_sortfield,
            'N_sortmod' => $N_sortmod,
            'N_field' => $N_field,
            'search_query' => $search_query,
            'Search' => $Search,
            'N_option' => $N_option,
            'N_value' => $N_value,
            'N_inclusive' => $N_inclusive,
            'quick_search' => $quick_search,
            'search_value' => $search_value,
            'nt_user_session' => $this->authentication->nt_user_session
        );
        return $this->client->get_group_nameservers($requestParams);
    }
}

<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */
/**
 * Copyright (c) 2015-present, Facebook, Inc. All rights reserved.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * Facebook.
 *
 * As with any software that integrates with the Facebook platform, your use
 * of this software is subject to the Facebook Developer Principles and
 * Policies [http://developers.facebook.com/policy/]. This copyright notice
 * shall be included in all copies or substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */
namespace FacebookAds\Object;

use FacebookAds\ApiRequest;
use FacebookAds\Cursor;
use FacebookAds\Http\RequestInterface;
use FacebookAds\TypeChecker;
use FacebookAds\Object\Fields\AdsPixelFields;
use FacebookAds\Object\Values\AdsPixelAutomaticMatchingFieldsValues;
use FacebookAds\Object\Values\AdsPixelDataUseSettingValues;
use FacebookAds\Object\Values\AdsPixelFirstPartyCookieStatusValues;
use FacebookAds\Object\Values\AdsPixelRelationshipTypeValues;
use FacebookAds\Object\Values\AdsPixelSortByValues;
use FacebookAds\Object\Values\AdsPixelStatsResultAggregationValues;
use FacebookAds\Object\Values\AdsPixelTasksValues;
use FacebookAds\Object\Values\AdsPixelTypeValues;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class AdsPixel extends AbstractCrudObject
{
    /**
     * @deprecated getEndpoint function is deprecated
     */
    protected function getEndpoint()
    {
        return 'adspixels';
    }
    /**
     * @return AdsPixelFields
     */
    public static function getFieldsEnum()
    {
        return AdsPixelFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['SortBy'] = AdsPixelSortByValues::getInstance()->getValues();
        $ref_enums['AutomaticMatchingFields'] = AdsPixelAutomaticMatchingFieldsValues::getInstance()->getValues();
        $ref_enums['DataUseSetting'] = AdsPixelDataUseSettingValues::getInstance()->getValues();
        $ref_enums['FirstPartyCookieStatus'] = AdsPixelFirstPartyCookieStatusValues::getInstance()->getValues();
        $ref_enums['Tasks'] = AdsPixelTasksValues::getInstance()->getValues();
        $ref_enums['Type'] = AdsPixelTypeValues::getInstance()->getValues();
        $ref_enums['RelationshipType'] = AdsPixelRelationshipTypeValues::getInstance()->getValues();
        return $ref_enums;
    }
    public function deleteAssignedUsers(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array('user' => 'int', 'business' => 'string');
        $enums = array();
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_DELETE, '/assigned_users', new AbstractCrudObject(), 'EDGE', array(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAssignedUsers(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array('business' => 'string');
        $enums = array();
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_GET, '/assigned_users', new AssignedUser(), 'EDGE', AssignedUser::getFieldsEnum()->getValues(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createAssignedUser(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array('user' => 'int', 'tasks' => 'list<tasks_enum>', 'business' => 'string');
        $enums = array('tasks_enum' => AdsPixelTasksValues::getInstance()->getValues());
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_POST, '/assigned_users', new AdsPixel(), 'EDGE', AdsPixel::getFieldsEnum()->getValues(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAudiences(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array('ad_account' => 'string');
        $enums = array();
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_GET, '/audiences', new CustomAudience(), 'EDGE', CustomAudience::getFieldsEnum()->getValues(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createCreateServerToServerKey(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_POST, '/create_server_to_server_keys', new AdsPixel(), 'EDGE', AdsPixel::getFieldsEnum()->getValues(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getDaChecks(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array('checks' => 'list<string>');
        $enums = array();
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_GET, '/da_checks', new DACheck(), 'EDGE', DACheck::getFieldsEnum()->getValues(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getPendingSharedAgencies(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_GET, '/pending_shared_agencies', new Business(), 'EDGE', Business::getFieldsEnum()->getValues(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createResetServerToServerKey(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array('type' => 'type_enum');
        $enums = array('type_enum' => AdsPixelTypeValues::getInstance()->getValues());
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_POST, '/reset_server_to_server_key', new AdsPixel(), 'EDGE', AdsPixel::getFieldsEnum()->getValues(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function deleteSharedAccounts(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array('account_id' => 'string', 'business' => 'string');
        $enums = array();
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_DELETE, '/shared_accounts', new AbstractCrudObject(), 'EDGE', array(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getSharedAccounts(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array('business' => 'string');
        $enums = array();
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_GET, '/shared_accounts', new AdAccount(), 'EDGE', AdAccount::getFieldsEnum()->getValues(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createSharedAccount(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array('account_id' => 'string', 'business' => 'string');
        $enums = array();
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_POST, '/shared_accounts', new AdsPixel(), 'EDGE', AdsPixel::getFieldsEnum()->getValues(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function deleteSharedAgencies(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array('agency_id' => 'string', 'business' => 'string');
        $enums = array();
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_DELETE, '/shared_agencies', new AbstractCrudObject(), 'EDGE', array(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getSharedAgencies(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_GET, '/shared_agencies', new Business(), 'EDGE', Business::getFieldsEnum()->getValues(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createSharedAgency(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array('agency_id' => 'string', 'business' => 'string', 'relationship_type' => 'list<relationship_type_enum>', 'other_relationship' => 'string');
        $enums = array('relationship_type_enum' => AdsPixelRelationshipTypeValues::getInstance()->getValues());
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_POST, '/shared_agencies', new AdsPixel(), 'EDGE', AdsPixel::getFieldsEnum()->getValues(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getStats(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array('start_time' => 'Object', 'end_time' => 'Object', 'aggregation' => 'aggregation_enum', 'event' => 'string');
        $enums = array('aggregation_enum' => AdsPixelStatsResultAggregationValues::getInstance()->getValues());
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_GET, '/stats', new AdsPixelStatsResult(), 'EDGE', AdsPixelStatsResult::getFieldsEnum()->getValues(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getSelf(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_GET, '/', new AdsPixel(), 'NODE', AdsPixel::getFieldsEnum()->getValues(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = false)
    {
        $this->assureId();
        $param_types = array('name' => 'string', 'enable_automatic_matching' => 'bool', 'automatic_matching_fields' => 'list<automatic_matching_fields_enum>', 'first_party_cookie_status' => 'first_party_cookie_status_enum', 'data_use_setting' => 'data_use_setting_enum');
        $enums = array('automatic_matching_fields_enum' => AdsPixelAutomaticMatchingFieldsValues::getInstance()->getValues(), 'first_party_cookie_status_enum' => AdsPixelFirstPartyCookieStatusValues::getInstance()->getValues(), 'data_use_setting_enum' => AdsPixelDataUseSettingValues::getInstance()->getValues());
        $request = new ApiRequest($this->api, $this->data['id'], RequestInterface::METHOD_POST, '/', new AdsPixel(), 'NODE', AdsPixel::getFieldsEnum()->getValues(), new TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    /**
     * @param int $business_id
     * @param string $account_id
     */
    public function sharePixelWithAdAccount($business_id, $account_id)
    {
        $this->getApi()->call('/' . $this->assureId() . '/shared_accounts', RequestInterface::METHOD_POST, array('business' => $business_id, 'account_id' => $account_id));
    }
    /**
     * @param $business_id
     * @param $account_id
     */
    public function unsharePixelWithAdAccount($business_id, $account_id)
    {
        $this->getApi()->call('/' . $this->assureId() . '/shared_accounts', RequestInterface::METHOD_DELETE, array('business' => $business_id, 'account_id' => $account_id));
    }
    /**
     * @param int $business_id
     * @param int $agency_id
     */
    public function sharePixelWithAgency($business_id, $agency_id)
    {
        $this->getApi()->call('/' . $this->assureId() . '/shared_agencies', 'POST', array('business' => $business_id, 'agency_id' => $agency_id));
    }
    /**
     * @param int $business_id
     * @param int $agency_id
     */
    public function unsharePixelWithAgency($business_id, $agency_id)
    {
        $this->getApi()->call('/' . $this->assureId() . '/shared_agencies', 'DELETE', array('business' => $business_id, 'agency_id' => $agency_id));
    }
}

?>
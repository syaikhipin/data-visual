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
namespace FacebookAds\Object\Fields;

use FacebookAds\Enum\AbstractEnum;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class VideoCopyrightFields extends AbstractEnum
{
    const CONTENT_CATEGORY = 'content_category';
    const COPYRIGHT_CONTENT_ID = 'copyright_content_id';
    const CREATOR = 'creator';
    const ID = 'id';
    const IN_CONFLICT = 'in_conflict';
    const MONITORING_STATUS = 'monitoring_status';
    const MONITORING_TYPE = 'monitoring_type';
    const OWNERSHIP_COUNTRIES = 'ownership_countries';
    const REFERENCE_FILE = 'reference_file';
    const REFERENCE_FILE_DISABLED = 'reference_file_disabled';
    const REFERENCE_FILE_DISABLED_BY_OPS = 'reference_file_disabled_by_ops';
    const REFERENCE_FILE_EXPIRED = 'reference_file_expired';
    const REFERENCE_OWNER_ID = 'reference_owner_id';
    const RULE_IDS = 'rule_ids';
    const WHITELISTED_IDS = 'whitelisted_ids';
    public function getFieldTypes()
    {
        return array('content_category' => 'string', 'copyright_content_id' => 'string', 'creator' => 'User', 'id' => 'string', 'in_conflict' => 'bool', 'monitoring_status' => 'string', 'monitoring_type' => 'string', 'ownership_countries' => 'VideoCopyrightGeoGate', 'reference_file' => 'CopyrightReferenceContainer', 'reference_file_disabled' => 'bool', 'reference_file_disabled_by_ops' => 'bool', 'reference_file_expired' => 'bool', 'reference_owner_id' => 'string', 'rule_ids' => 'list<VideoCopyrightRule>', 'whitelisted_ids' => 'list<string>');
    }
}

?>
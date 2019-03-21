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
class EventTourFields extends AbstractEnum
{
    const DESCRIPTION = 'description';
    const DOMINANT_COLOR = 'dominant_color';
    const END_TIME = 'end_time';
    const ID = 'id';
    const IS_PAST = 'is_past';
    const LAST_EVENT_TIMESTAMP = 'last_event_timestamp';
    const NAME = 'name';
    const NUM_EVENTS = 'num_events';
    const PHOTO = 'photo';
    const PUBLISHING_STATE = 'publishing_state';
    const SCHEDULED_PUBLISH_TIMESTAMP = 'scheduled_publish_timestamp';
    const START_TIME = 'start_time';
    const TICKETING_URI = 'ticketing_uri';
    const VIDEO = 'video';
    public function getFieldTypes()
    {
        return array('description' => 'string', 'dominant_color' => 'string', 'end_time' => 'string', 'id' => 'string', 'is_past' => 'bool', 'last_event_timestamp' => 'int', 'name' => 'string', 'num_events' => 'int', 'photo' => 'Photo', 'publishing_state' => 'string', 'scheduled_publish_timestamp' => 'int', 'start_time' => 'string', 'ticketing_uri' => 'string', 'video' => 'AdVideo');
    }
}

?>
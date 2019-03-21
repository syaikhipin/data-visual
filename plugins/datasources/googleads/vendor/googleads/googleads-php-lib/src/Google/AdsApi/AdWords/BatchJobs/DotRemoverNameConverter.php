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
 * Copyright 2016, Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace Google\AdsApi\AdWords\BatchJobs;

use Symfony\Component\Serializer\NameConverter\NameConverterInterface;
/**
 * Custom name converter for BatchJobs to remove any dots appearing in the
 * variable names. This is needed because variables with dots in the names are
 * not valid in PHP.
 */
class DotRemoverNameConverter implements NameConverterInterface
{
    /**
     * @see NameConverterInterface::normalize()
     */
    public function normalize($propertyName)
    {
        return $propertyName;
    }
    /**
     * Remove dots in the property name during denormalization.
     *
     * @see NameConverterInterface::denormalize()
     */
    public function denormalize($propertyName)
    {
        return str_replace('.', '', $propertyName);
    }
}

?>
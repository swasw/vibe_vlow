<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1beta1ImportDataRequest extends \Google\Model
{
  /**
   * @var GoogleCloudDatalabelingV1beta1InputConfig
   */
  public $inputConfig;
  protected $inputConfigType = GoogleCloudDatalabelingV1beta1InputConfig::class;
  protected $inputConfigDataType = '';
  /**
   * @var string
   */
  public $userEmailAddress;

  /**
   * @param GoogleCloudDatalabelingV1beta1InputConfig
   */
  public function setInputConfig(GoogleCloudDatalabelingV1beta1InputConfig $inputConfig)
  {
    $this->inputConfig = $inputConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1InputConfig
   */
  public function getInputConfig()
  {
    return $this->inputConfig;
  }
  /**
   * @param string
   */
  public function setUserEmailAddress($userEmailAddress)
  {
    $this->userEmailAddress = $userEmailAddress;
  }
  /**
   * @return string
   */
  public function getUserEmailAddress()
  {
    return $this->userEmailAddress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1ImportDataRequest::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImportDataRequest');

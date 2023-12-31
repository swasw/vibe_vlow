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

namespace Google\Service\Contentwarehouse;

class SpamBrainData extends \Google\Collection
{
  protected $collection_key = 'versionedData';
  /**
   * @var string
   */
  public $site;
  /**
   * @var SpamBrainScore[]
   */
  public $versionedData;
  protected $versionedDataType = SpamBrainScore::class;
  protected $versionedDataDataType = 'array';

  /**
   * @param string
   */
  public function setSite($site)
  {
    $this->site = $site;
  }
  /**
   * @return string
   */
  public function getSite()
  {
    return $this->site;
  }
  /**
   * @param SpamBrainScore[]
   */
  public function setVersionedData($versionedData)
  {
    $this->versionedData = $versionedData;
  }
  /**
   * @return SpamBrainScore[]
   */
  public function getVersionedData()
  {
    return $this->versionedData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpamBrainData::class, 'Google_Service_Contentwarehouse_SpamBrainData');

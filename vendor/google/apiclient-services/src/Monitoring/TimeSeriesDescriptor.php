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

namespace Google\Service\Monitoring;

class TimeSeriesDescriptor extends \Google\Collection
{
  protected $collection_key = 'pointDescriptors';
  /**
   * @var LabelDescriptor[]
   */
  public $labelDescriptors;
  protected $labelDescriptorsType = LabelDescriptor::class;
  protected $labelDescriptorsDataType = 'array';
  /**
   * @var ValueDescriptor[]
   */
  public $pointDescriptors;
  protected $pointDescriptorsType = ValueDescriptor::class;
  protected $pointDescriptorsDataType = 'array';

  /**
   * @param LabelDescriptor[]
   */
  public function setLabelDescriptors($labelDescriptors)
  {
    $this->labelDescriptors = $labelDescriptors;
  }
  /**
   * @return LabelDescriptor[]
   */
  public function getLabelDescriptors()
  {
    return $this->labelDescriptors;
  }
  /**
   * @param ValueDescriptor[]
   */
  public function setPointDescriptors($pointDescriptors)
  {
    $this->pointDescriptors = $pointDescriptors;
  }
  /**
   * @return ValueDescriptor[]
   */
  public function getPointDescriptors()
  {
    return $this->pointDescriptors;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TimeSeriesDescriptor::class, 'Google_Service_Monitoring_TimeSeriesDescriptor');

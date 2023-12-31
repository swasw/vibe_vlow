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

namespace Google\Service\Vision;

class GoogleCloudVisionV1p2beta1DominantColorsAnnotation extends \Google\Collection
{
  protected $collection_key = 'colors';
  /**
   * @var GoogleCloudVisionV1p2beta1ColorInfo[]
   */
  public $colors;
  protected $colorsType = GoogleCloudVisionV1p2beta1ColorInfo::class;
  protected $colorsDataType = 'array';

  /**
   * @param GoogleCloudVisionV1p2beta1ColorInfo[]
   */
  public function setColors($colors)
  {
    $this->colors = $colors;
  }
  /**
   * @return GoogleCloudVisionV1p2beta1ColorInfo[]
   */
  public function getColors()
  {
    return $this->colors;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p2beta1DominantColorsAnnotation::class, 'Google_Service_Vision_GoogleCloudVisionV1p2beta1DominantColorsAnnotation');

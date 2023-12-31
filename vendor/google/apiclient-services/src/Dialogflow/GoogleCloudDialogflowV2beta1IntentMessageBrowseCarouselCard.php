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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCard extends \Google\Collection
{
  protected $collection_key = 'items';
  /**
   * @var string
   */
  public $imageDisplayOptions;
  /**
   * @var GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCardBrowseCarouselCardItem[]
   */
  public $items;
  protected $itemsType = GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCardBrowseCarouselCardItem::class;
  protected $itemsDataType = 'array';

  /**
   * @param string
   */
  public function setImageDisplayOptions($imageDisplayOptions)
  {
    $this->imageDisplayOptions = $imageDisplayOptions;
  }
  /**
   * @return string
   */
  public function getImageDisplayOptions()
  {
    return $this->imageDisplayOptions;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCardBrowseCarouselCardItem[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCardBrowseCarouselCardItem[]
   */
  public function getItems()
  {
    return $this->items;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCard::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCard');

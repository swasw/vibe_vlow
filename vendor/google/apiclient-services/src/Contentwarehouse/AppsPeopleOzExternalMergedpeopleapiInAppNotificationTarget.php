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

class AppsPeopleOzExternalMergedpeopleapiInAppNotificationTarget extends \Google\Collection
{
  protected $collection_key = 'originatingField';
  /**
   * @var string[]
   */
  public $app;
  /**
   * @var AppsPeopleOzExternalMergedpeopleapiInAppNotificationTargetClientData[]
   */
  public $clientData;
  protected $clientDataType = AppsPeopleOzExternalMergedpeopleapiInAppNotificationTargetClientData::class;
  protected $clientDataDataType = 'array';
  /**
   * @var AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public $metadata;
  protected $metadataType = AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var AppsPeopleOzExternalMergedpeopleapiInAppNotificationTargetOriginatingField[]
   */
  public $originatingField;
  protected $originatingFieldType = AppsPeopleOzExternalMergedpeopleapiInAppNotificationTargetOriginatingField::class;
  protected $originatingFieldDataType = 'array';
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $value;

  /**
   * @param string[]
   */
  public function setApp($app)
  {
    $this->app = $app;
  }
  /**
   * @return string[]
   */
  public function getApp()
  {
    return $this->app;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiInAppNotificationTargetClientData[]
   */
  public function setClientData($clientData)
  {
    $this->clientData = $clientData;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiInAppNotificationTargetClientData[]
   */
  public function getClientData()
  {
    return $this->clientData;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function setMetadata(AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiInAppNotificationTargetOriginatingField[]
   */
  public function setOriginatingField($originatingField)
  {
    $this->originatingField = $originatingField;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiInAppNotificationTargetOriginatingField[]
   */
  public function getOriginatingField()
  {
    return $this->originatingField;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiInAppNotificationTarget::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiInAppNotificationTarget');

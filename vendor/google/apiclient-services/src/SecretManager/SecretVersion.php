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

namespace Google\Service\SecretManager;

class SecretVersion extends \Google\Model
{
  /**
   * @var bool
   */
  public $clientSpecifiedPayloadChecksum;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $destroyTime;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $name;
  /**
   * @var ReplicationStatus
   */
  public $replicationStatus;
  protected $replicationStatusType = ReplicationStatus::class;
  protected $replicationStatusDataType = '';
  /**
   * @var string
   */
  public $state;

  /**
   * @param bool
   */
  public function setClientSpecifiedPayloadChecksum($clientSpecifiedPayloadChecksum)
  {
    $this->clientSpecifiedPayloadChecksum = $clientSpecifiedPayloadChecksum;
  }
  /**
   * @return bool
   */
  public function getClientSpecifiedPayloadChecksum()
  {
    return $this->clientSpecifiedPayloadChecksum;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDestroyTime($destroyTime)
  {
    $this->destroyTime = $destroyTime;
  }
  /**
   * @return string
   */
  public function getDestroyTime()
  {
    return $this->destroyTime;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param ReplicationStatus
   */
  public function setReplicationStatus(ReplicationStatus $replicationStatus)
  {
    $this->replicationStatus = $replicationStatus;
  }
  /**
   * @return ReplicationStatus
   */
  public function getReplicationStatus()
  {
    return $this->replicationStatus;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SecretVersion::class, 'Google_Service_SecretManager_SecretVersion');

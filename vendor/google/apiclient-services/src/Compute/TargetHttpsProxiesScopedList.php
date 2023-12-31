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

namespace Google\Service\Compute;

class TargetHttpsProxiesScopedList extends \Google\Collection
{
  protected $collection_key = 'targetHttpsProxies';
  /**
   * @var TargetHttpsProxy[]
   */
  public $targetHttpsProxies;
  protected $targetHttpsProxiesType = TargetHttpsProxy::class;
  protected $targetHttpsProxiesDataType = 'array';
  /**
   * @var TargetHttpsProxiesScopedListWarning
   */
  public $warning;
  protected $warningType = TargetHttpsProxiesScopedListWarning::class;
  protected $warningDataType = '';

  /**
   * @param TargetHttpsProxy[]
   */
  public function setTargetHttpsProxies($targetHttpsProxies)
  {
    $this->targetHttpsProxies = $targetHttpsProxies;
  }
  /**
   * @return TargetHttpsProxy[]
   */
  public function getTargetHttpsProxies()
  {
    return $this->targetHttpsProxies;
  }
  /**
   * @param TargetHttpsProxiesScopedListWarning
   */
  public function setWarning(TargetHttpsProxiesScopedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return TargetHttpsProxiesScopedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetHttpsProxiesScopedList::class, 'Google_Service_Compute_TargetHttpsProxiesScopedList');

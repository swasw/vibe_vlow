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

namespace Google\Service\Fitness;

class AggregateResponse extends \Google\Collection
{
  protected $collection_key = 'bucket';
  /**
   * @var AggregateBucket[]
   */
  public $bucket;
  protected $bucketType = AggregateBucket::class;
  protected $bucketDataType = 'array';

  /**
   * @param AggregateBucket[]
   */
  public function setBucket($bucket)
  {
    $this->bucket = $bucket;
  }
  /**
   * @return AggregateBucket[]
   */
  public function getBucket()
  {
    return $this->bucket;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AggregateResponse::class, 'Google_Service_Fitness_AggregateResponse');

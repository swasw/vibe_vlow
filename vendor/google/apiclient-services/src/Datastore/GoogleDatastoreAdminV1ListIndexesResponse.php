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

namespace Google\Service\Datastore;

class GoogleDatastoreAdminV1ListIndexesResponse extends \Google\Collection
{
  protected $collection_key = 'indexes';
  /**
   * @var GoogleDatastoreAdminV1Index[]
   */
  public $indexes;
  protected $indexesType = GoogleDatastoreAdminV1Index::class;
  protected $indexesDataType = 'array';
  /**
   * @var string
   */
  public $nextPageToken;

  /**
   * @param GoogleDatastoreAdminV1Index[]
   */
  public function setIndexes($indexes)
  {
    $this->indexes = $indexes;
  }
  /**
   * @return GoogleDatastoreAdminV1Index[]
   */
  public function getIndexes()
  {
    return $this->indexes;
  }
  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDatastoreAdminV1ListIndexesResponse::class, 'Google_Service_Datastore_GoogleDatastoreAdminV1ListIndexesResponse');

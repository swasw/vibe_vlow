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

namespace Google\Service\FactCheckTools;

class GoogleFactcheckingFactchecktoolsV1alpha1ClaimReview extends \Google\Model
{
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var GoogleFactcheckingFactchecktoolsV1alpha1Publisher
   */
  public $publisher;
  protected $publisherType = GoogleFactcheckingFactchecktoolsV1alpha1Publisher::class;
  protected $publisherDataType = '';
  /**
   * @var string
   */
  public $reviewDate;
  /**
   * @var string
   */
  public $textualRating;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param GoogleFactcheckingFactchecktoolsV1alpha1Publisher
   */
  public function setPublisher(GoogleFactcheckingFactchecktoolsV1alpha1Publisher $publisher)
  {
    $this->publisher = $publisher;
  }
  /**
   * @return GoogleFactcheckingFactchecktoolsV1alpha1Publisher
   */
  public function getPublisher()
  {
    return $this->publisher;
  }
  /**
   * @param string
   */
  public function setReviewDate($reviewDate)
  {
    $this->reviewDate = $reviewDate;
  }
  /**
   * @return string
   */
  public function getReviewDate()
  {
    return $this->reviewDate;
  }
  /**
   * @param string
   */
  public function setTextualRating($textualRating)
  {
    $this->textualRating = $textualRating;
  }
  /**
   * @return string
   */
  public function getTextualRating()
  {
    return $this->textualRating;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFactcheckingFactchecktoolsV1alpha1ClaimReview::class, 'Google_Service_FactCheckTools_GoogleFactcheckingFactchecktoolsV1alpha1ClaimReview');

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

namespace Google\Service\ContainerAnalysis;

class UpgradeOccurrence extends \Google\Model
{
  /**
   * @var UpgradeDistribution
   */
  public $distribution;
  protected $distributionType = UpgradeDistribution::class;
  protected $distributionDataType = '';
  /**
   * @var string
   */
  public $package;
  /**
   * @var Version
   */
  public $parsedVersion;
  protected $parsedVersionType = Version::class;
  protected $parsedVersionDataType = '';
  /**
   * @var WindowsUpdate
   */
  public $windowsUpdate;
  protected $windowsUpdateType = WindowsUpdate::class;
  protected $windowsUpdateDataType = '';

  /**
   * @param UpgradeDistribution
   */
  public function setDistribution(UpgradeDistribution $distribution)
  {
    $this->distribution = $distribution;
  }
  /**
   * @return UpgradeDistribution
   */
  public function getDistribution()
  {
    return $this->distribution;
  }
  /**
   * @param string
   */
  public function setPackage($package)
  {
    $this->package = $package;
  }
  /**
   * @return string
   */
  public function getPackage()
  {
    return $this->package;
  }
  /**
   * @param Version
   */
  public function setParsedVersion(Version $parsedVersion)
  {
    $this->parsedVersion = $parsedVersion;
  }
  /**
   * @return Version
   */
  public function getParsedVersion()
  {
    return $this->parsedVersion;
  }
  /**
   * @param WindowsUpdate
   */
  public function setWindowsUpdate(WindowsUpdate $windowsUpdate)
  {
    $this->windowsUpdate = $windowsUpdate;
  }
  /**
   * @return WindowsUpdate
   */
  public function getWindowsUpdate()
  {
    return $this->windowsUpdate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpgradeOccurrence::class, 'Google_Service_ContainerAnalysis_UpgradeOccurrence');

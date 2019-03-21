<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */
declare (strict_types=1);
/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */
namespace Docker\API\Model;

class TaskSpecContainerSpecPrivileges
{
    /**
     * CredentialSpec for managed service account (Windows only).
     *
     * @var TaskSpecContainerSpecPrivilegesCredentialSpec
     */
    protected $credentialSpec;
    /**
     * SELinux labels of the container.
     *
     * @var TaskSpecContainerSpecPrivilegesSELinuxContext
     */
    protected $sELinuxContext;
    /**
     * CredentialSpec for managed service account (Windows only).
     *
     * @return TaskSpecContainerSpecPrivilegesCredentialSpec
     */
    public function getCredentialSpec() : ?TaskSpecContainerSpecPrivilegesCredentialSpec
    {
        return $this->credentialSpec;
    }
    /**
     * CredentialSpec for managed service account (Windows only).
     *
     * @param TaskSpecContainerSpecPrivilegesCredentialSpec $credentialSpec
     *
     * @return self
     */
    public function setCredentialSpec(?TaskSpecContainerSpecPrivilegesCredentialSpec $credentialSpec) : self
    {
        $this->credentialSpec = $credentialSpec;
        return $this;
    }
    /**
     * SELinux labels of the container.
     *
     * @return TaskSpecContainerSpecPrivilegesSELinuxContext
     */
    public function getSELinuxContext() : ?TaskSpecContainerSpecPrivilegesSELinuxContext
    {
        return $this->sELinuxContext;
    }
    /**
     * SELinux labels of the container.
     *
     * @param TaskSpecContainerSpecPrivilegesSELinuxContext $sELinuxContext
     *
     * @return self
     */
    public function setSELinuxContext(?TaskSpecContainerSpecPrivilegesSELinuxContext $sELinuxContext) : self
    {
        $this->sELinuxContext = $sELinuxContext;
        return $this;
    }
}

?>
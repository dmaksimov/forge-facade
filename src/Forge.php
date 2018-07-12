<?php

namespace Davidmaksimov\ForgeFacade;

class Forge
{
    protected $serverId;
    protected $forgeSdk;
    protected static $commandsRequiringServerId = [
        // ManagesJobs
        'jobs',
        'job',
        'createJob',
        'deleteJob',

        // ManagesSites
        'sites',
        'site',
        'createSite',
        'updateSite',
        'refreshSiteToken',
        'deleteSite',
        'siteNginxFile',
        'updateSiteNginxFile',
        'siteEnvironmentFile',
        'updateSiteEnvironmentFile',
        'installGitRepositoryOnSite',
        'updateSiteGitRepository',
        'destroySiteGitRepository',
        'siteDeploymentScript',
        'updateSiteDeploymentScript',
        'enableQuickDeploy',
        'disableQuickDeploy',
        'deploySite',
        'resetDeploymentState',
        'siteDeploymentLog',
        'enableHipchatNotifications',
        'disableHipchatNotifications',
        'installWordPress',
        'removeWordPress',
        'updateNodeBalancingConfiguration',

        // ManagesServers
        'server',
        'updateServer',
        'deleteServer',
        'revokeAccessToServer',
        'reconnectToServer',
        'reactivateToServer',
        'rebootServer',
        'rebootMysql',
        'stopMysql',
        'rebootPostgres',
        'stopPostgres',
        'rebootNginx',
        'stopNginx',
        'installBlackfire',
        'removeBlackfire',
        'installPapertrail',
        'removePapertrail',
        'enableOPCache',
        'disableOPCache',
        'upgradePHP',

        // ManagesDaemons
        'daemons',
        'daemon',
        'createDaemon',
        'restartDaemon',
        'deleteDaemon',

        // ManagesWorkers
        'workers',
        'worker',
        'createWorker',
        'deleteWorker',
        'restartWorker',

        // ManagesSSHKeys
        'keys',
        'SSHKey',
        'createSSHKey',
        'deleteSSHKey',

        // ManagesMysqlUsers
        'mysqlUsers',
        'mysqlUser',
        'createMysqlUser',
        'updateMysqlUser',
        'deleteMysqlUser',

        // ManagesCertificates
        'certificates',
        'certificate',
        'createCertificate',
        'deleteCertificate',
        'getCertificateSigningRequest',
        'installCertificate',
        'activateCertificate',
        'obtainLetsEncryptCertificate',

        // ManagesFirewallRules
        'firewallRules',
        'firewallRule',
        'createFirewallRule',
        'deleteFirewallRule',

        // ManagesMysqlDatabases
        'mysqlDatabases',
        'mysqlDatabase',
        'createMysqlDatabase',
        'updateMysqlDatabase',
        'deleteMysqlDatabase',

    ];

    public function __construct($apiKey, $serverId)
    {
        $this->serverId = $serverId;
        $this->forgeSdk = new \Themsaid\Forge\Forge($apiKey);
    }

    public function __call($name, $arguments)
    {
        if (in_array($name, static::$commandsRequiringServerId)) {
            array_unshift($arguments, $this->serverId);
            return $this->forgeSdk->{$name}(...$arguments);
        }
    }
}

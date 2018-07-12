# Laravel Forge Facade

This package provides a facade around the Laravel Forge SDK provided by `themsaid/forge-sdk
`.

## Use Case

This package is meant for cases where you're only concerned with a single server on your Laravel Forge account.

## Installation

Install the package: 
```
composer require davidmaksimov/forge-facade
```

Update your `.env` configuration
```dotenv
LARAVEL_FORGE_API_KEY=
LARAVEL_FORGE_SERVER_ID=
```

## App Configuration
If you're not using auto-discovery, add the service provider and facade in your `config/app.php` file.

```php
'providers' => [
    ...
    Davidmaksimov\ForgeFacade\ServiceProvider::class,
],
```

```php
'aliases' => [
    ...
    'Forge' => \Davidmaksimov\ForgeFacade\Facade::class,
],
```

## Usage

Now you can use the facade to call methods that require a server id without it. When calling methods that require arguments 

```php
Forge::sites();
Forge::site($siteId);
Forge::createSite($siteId, $data);
```

## SDK
The following is taken from the readme at `themsaid/forge-sdk`. The SDK is completely the same except that you omit the `$serverId` for any methods that require it since that's inserted for you automatically.
### Managing Servers

```php
Forge::servers();
Forge::server();
Forge::createServer(array $data);
Forge::updateServer(array $data);
Forge::deleteServer();
Forge::rebootServer();

// Server access
Forge::revokeAccessToServer();
Forge::reconnectToServer();
Forge::reactivateToServer();
```

On a Server instance you may also call:

```php
$server->update(array $data);
$server->delete();
$server->reboot();
$server->revokeAccess();
$server->reconnect();
$server->reactivate();
$server->rebootMysql();
$server->stopMysql();
$server->rebootPostgres();
$server->stopPostgres();
$server->rebootNginx();
$server->stopNginx();
$server->installBlackfire(array $data);
$server->removeBlackfire();
$server->installPapertrail(array $data);
$server->removePapertrail();
$server->enableOPCache();
$server->disableOPCache();
$server->upgradePHP();
```

### Server SSH Keys

```php
Forge::keys();
Forge::SSHKey($keyId);
Forge::createSSHKey(array $data, $wait = true);
Forge::deleteSSHKey($keyId);
```

On a SSHKey Instance you may also call:

```php
$sshKey->delete();
```

### Server Scheduled Jobs

```php
Forge::jobs();
Forge::job($jobId);
Forge::createJob(array $data, $wait = true);
Forge::deleteJob($jobId);
```

On a Job Instance you may also call:

```php
$job->delete();
```

### Managing Services

```php
// MySQL
Forge::rebootMysql();
Forge::stopMysql();

// Postgres
Forge::rebootPostgres();
Forge::stopPostgres();

// Nginx
Forge::rebootNginx();
Forge::stopNginx();
Forge::siteNginxFile($siteId);
Forge::updateSiteNginxFile($siteId, $content);

// Blackfire
Forge::installBlackfire(array $data);
Forge::removeBlackfire();

// Papertrail
Forge::installPapertrail(array $data);
Forge::removePapertrail();

// OPCache
Forge::enableOPCache();
Forge::disableOPCache();

// PHP
Forge::upgradePHP();
```

### Server Daemons

```php
Forge::daemons();
Forge::daemon($daemonId);
Forge::createDaemon(array $data, $wait = true);
Forge::restartDaemon($daemonId, $wait = true);
Forge::deleteDaemon($daemonId);
```

On a Daemon Instance you may also call:

```php
$daemon->restart($wait = true);
$daemon->delete();
```

### Server Firewall Rules

```php
Forge::firewallRules();
Forge::firewallRule($ruleId);
Forge::createFirewallRule(array $data, $wait = true);
Forge::deleteFirewallRule($ruleId);
```

On a FirewallRule Instance you may also call:

```php
$rule->delete();
```

### Managing Sites

```php
Forge::sites();
Forge::site($siteId);
Forge::createSite(array $data, $wait = true);
Forge::updateSite($siteId, array $data);
Forge::refreshSiteToken($siteId);
Forge::deleteSite($siteId);

// Environment File
Forge::siteEnvironmentFile($siteId);
Forge::updateSiteEnvironmentFile($siteId, $content);

// Site Repositories and Deployments
Forge::installGitRepositoryOnSite($siteId, array $data);
Forge::updateSiteGitRepository($siteId, array $data);
Forge::destroySiteGitRepository($siteId);
Forge::siteDeploymentScript($siteId);
Forge::updateSiteDeploymentScript($siteId, $content);
Forge::enableQuickDeploy($siteId);
Forge::disableQuickDeploy($siteId);
Forge::deploySite($siteId);
Forge::resetDeploymentState($siteId);
Forge::siteDeploymentLog($siteId);

// Notifications
Forge::enableHipchatNotifications($siteId, array $data);
Forge::disableHipchatNotifications($siteId);

// Installing Wordpress
Forge::installWordPress($siteId, array $data);
Forge::removeWordPress($siteId);

// Updating Node balancing Configuration
Forge::updateNodeBalancingConfiguration($siteId, array $data);
```

On a Site Instance you may also call:

```php
$site->refreshToken();
$site->delete();
$site->installGitRepository(array $data);
$site->updateGitRepository(array $data);
$site->destroyGitRepository();
$site->getDeploymentScript();
$site->updateDeploymentScript($content);
$site->enableQuickDeploy();
$site->disableQuickDeploy();
$site->deploySite();
$site->enableHipchatNotifications(array $data);
$site->disableHipchatNotifications();
$site->installWordPress($data);
$site->removeWordPress();
```


### Site Workers

```php
Forge::workers($siteId);
Forge::worker($siteId, $workerId);
Forge::createWorker($siteId, array $data, $wait = true);
Forge::deleteWorker($siteId, $workerId);
Forge::restartWorker($siteId, $workerId, $wait = true);
```

On a Worker Instance you may also call:

```php
$worker->delete();
$worker->restart($wait = true);
```

### Site SSL Certificates

```php
Forge::certificates($siteId);
Forge::certificate($siteId, $certificateId);
Forge::createCertificate($siteId, array $data, $wait = true);
Forge::deleteCertificate($siteId, $certificateId);
Forge::getCertificateSigningRequest($siteId, $certificateId);
Forge::installCertificate($siteId, $certificateId, $wait = true);
Forge::activateCertificate($siteId, $certificateId, $wait = true);
Forge::obtainLetsEncryptCertificate($siteId, $data, $wait = true);
```

On a Certificate Instance you may also call:

```php
$certificate->delete();
$certificate->getSigningRequest();
$certificate->install($wait = true);
$certificate->activate($wait = true);
```

### Managing MySQL

```php
Forge::mysqlDatabases();
Forge::mysqlDatabase($databaseId);
Forge::createMysqlDatabase(array $data, $wait = true);
Forge::updateMysqlDatabase($databaseId, array $data);
Forge::deleteMysqlDatabase($databaseId);

// Users
Forge::mysqlUsers();
Forge::mysqlUser($userId);
Forge::createMysqlUser(array $data, $wait = true);
Forge::updateMysqlUser($userId, array $data);
Forge::deleteMysqlUser($userId);
```

On a MysqlDatabase Instance you may also call:

```php
$database->update(array $data);
$database->delete();
```

On a MysqlUser Instance you may also call:

```php
$databaseUser->update(array $data);
$databaseUser->delete();
```

### Managing Recipes

```php
Forge::recipes();
Forge::recipe($recipeId);
Forge::createRecipe(array $data);
Forge::updateRecipe($recipeId, array $data);
Forge::deleteRecipe($recipeId);
Forge::runRecipe($recipeId, array $data);
```

On a Recipe Instance you may also call:

```php

$recipe->update(array $data);
$recipe->delete();
$recipe->run(array $data);
```

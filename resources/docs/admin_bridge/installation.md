# Installation

- [Installation](#installation)
    - [Requirements](#requirements)
    - [Choose Branch](#choose-branch)
        - [Master Branch](#master-branch)
    - [Composer](#composer)
    - [File Modifications](#file-modifications)

<a name="installation"></a>
## Installation

### Requirements

To use the SleepingOwl Admin Package with Cartalyst Sentinel Integration you need the following:

<div class="content-list" markdown="1">
- Composer
- Installed and configured Laravel 5.1.* Environment
- Installed SOA (<a href="https://github.com/sleeping-owl/admin/tree/development" target="_blank">Official (V.3)</a> or our <a href="https://github.com/Pseudoagentur/soa-sentinel" target="_blank">forked version</a>)
- Installed <a href="https://github.com/pingpong-labs/modules" target="_blank">Modules Package</a>
</div>


<a name="choose-branch"></a>
### Choose Branch

<a name="master-branch"></a>
#### Master Branch

If you want to use the Master Branch, you have to add the following to the `require` list in your `composer.json`

    "pseudoagentur/admin-bridge": "dev-master"    

<a name="composer"></a>
### Composer

Now you have to run `composer update` to get the required packages.


<a name="file-modifications"></a>
### File Modifications

After the successful composer update, you have to open the `config/app.php`.

Add the following at the end of the `providers` array (add it before the SleepingOwl Provider):

    Pseudoagentur\AdminBridge\Providers\AdminBridgeServiceProvider',
    'SleepingOwl\Admin\AdminServiceProvider',


## If Selective Install was used

NOTE: v2.0.0 and older require a clean install and cannot be installed through upgrade.

#### Step 1:
Delete all files in your existing VWI web directory except includs/config.php. Ensure you delete any files starting with a period such as '.htaccess', '.git', or '.gitignore'.


#### Step 2:
[Download the latest release](https://github.com/cdgco/VestaWebInterface/archive/v2.2.0.zip) of VWI from GitHub.

#### Step 3:
Extract Vesta Web Interface to the blank domain directory.


#### Step 4:
Update the Vesta Web Interface backend on your VestaCP server.
```shell
bash <(curl -s https://cdgco.github.io/backend)
```

Upgrade Complete

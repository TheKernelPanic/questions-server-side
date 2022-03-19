# xDebug configuration

___

Version: 3.0

### Configuration ini file

* fpm

 ```
zend_extension=xdebug.so
xdebug.remote_enable = 1
xdebug.remote_autostart = 1
xdebug.mode=debug
xdebug.start_with_request=yes
xdebug.client_host=host.docker.internal
xdebug.client_port=9000
xdebug.idekey=VSCODE
xdebug.log=/var/log/server-side/xdebug.log
xdebug.discover_client_host=1
xdebug.remote_connect_back=1
 ```

* cli
```
zend_extension=xdebug.so
xdebug.mode=coverage
```
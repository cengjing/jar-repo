# Multicraft JAR Repo

This is the web backend for an semi-automatic Multicraft JAR repository. It is designed to automatically generate JAR files for specific types of JAR files, regardless of the version.

# Installation

Download and unzip all of the files to a web server. Enable URL rewrites in order to automatically generate the configuration files.

Nginx:
```
location ~ \.jar.conf$ {
    try_files $uri $uri/ /jar.php?file=$request_uri;
}
```

Edit `config.php` and set all configuration variables accordingly.

# Usage
Place JAR files in the root web directory. Jar files should be named `<type>-<version>.jar` (ie. `spigot-1.7.2.jar`). Next, create a file named `<type>.conf` in the root web directory. This will act as the configuration template for all JAR files of `<type>`.

You may use the following variables in the template config files:
- `{{VERSION}}` - This will be replaced by the JAR's version, derived from its name.
- `{{FILE}}` - This will be replaced by a generated link to the JAR file.
- `{{CONFIG_FILE}}` - This will be replaced by a generated link to the JAR's config file.

You may refer to the example configuration template included in this repository (`spigot.conf`).
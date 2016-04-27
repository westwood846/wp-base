A base wordpress installation with git and [Vagrant](https://www.vagrantup.com/) in mind. Just fork/clone this repo and play around in the VM.

# Installation

After cloning this repo just `vagrant up` to install the VM. It may be advisable to update wordpress and the theme (see below for instructions). If you just cloned the repo, you may also want to rename the remote so that you can use `origin` for your own repo: `git remote rename origin wp-base` (or any other name). `cp local-config-sample.php local-config.php` and optinally disable debugging and define keys and salts there.

Visit the wp instance on <http://localhost:8080/> and fill out the form to complete the installation.


# Updating

Whenever a new version of wordpress is released, the wordpress git submodule of this repo should be updated:

```bash
cd public/wp # Change to the sub module folder
git checkout master
git pull --all # Pull changes and new tags
git tag # List all tags
git checkout 1.2.3 # Checkout a tag (choose the newest from the list printed by the command abobe)
cd ../.. # Go pack to the repo root
git add . # Stage the version change of the submodule
git commit -m "Update wordpress to version 1.2.3" # Commit the update with a friendly message
```

The procedure is the same for themes, but they may not have tags, just checkout the latest `master` in this case.

It would be nice if you could push updates like these back to GitHub ;-)


# Known issues

Sometimes the warning

```
Warning: stream_socket_client(): unable to connect to tcp://127.0.0.1:8080 (Connection refused) in /var/www/public/wp/wp-includes/class-wp-http-streams.php on line 150
```

is shown. I don't know why this is, but it does not seem to affect anything and is apparently not visible to visitors.

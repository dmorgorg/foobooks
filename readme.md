1. `$ cd c:\xampp\htdocs\dwa`

2. `$ composer create-project laravel/laravel foobooks --prefer-dist`

3. `$ cd foobooks`

4. `$ php artisan app:name Foobooks`

5. Create a repository at Github.com. SSH URL `git@github.com:dmorgorg/foobooks`

6. Need text here to show list number?
```
$ git init
$ git remote add origin git@github.com:dmorgorg/foobooks.git
$ git status
$ git add --all
$ git commit -m "First commit"
$ git push origin master
```

7. Tell the local Apache to use the virtual hosts file:

 From the XAMPP Control Panel, click on 'Config' and select the `httpd.conf` file.

 (Or use the `C:\xampp\apache\conf\httpd.conf` file.)

 Ensure that the line `Include conf/extra/httpd-xampp.conf` is not commented out.

 Open `C:\xampp\apache\conf\extra\httpd-vhosts.conf`and add the following

```
<VirtualHost *:80>
    ServerName foobooks.loc
		    DocumentRoot c:\xampp\htdocs\foobooks\public
		      <Directory c:\xampp\htdocs\foobooks\public>
        AllowOverride All
        Require all granted
		</Directory>
</VirtualHost>
```
Restart the XAMPP server.

8.  Now, edit the Windows `hosts` file to map the url `http://foobooks.loc` to localhost:
Use `$ elevate nano C:\Windows\System32\drivers\etc\host` to add `127.0.0.1 foobooks.loc` entry at the bottom of the file.

9. Test that you can successfully display the Laravel welcome page at <br>
`http://foobooks.loc`

10. ssh into DigitalOcean: `$ ssh dmorgorg@trolloff.com`

11. If composer isn't already installed on DOc, install it:
```
$ cd /usr/local/bin
$ curl -sS https://getcomposer.org/installer | sudo php
For convenience,
$ sudo mv composer.phar composer
```

12. If this is your first laravel project, Apache requires mod_rewrite for Routing
<br>
```
$ sudo a2enmod rewrite
$ sudo service apache2 restart
```
13. Clone the project from github
```
$ cd /var/www/html
$ git clone git@github.com:dmorgorg/foobooks.git
$ cd foobooks
```
14. Build `vendor/` directory. (Note: vendors are managed by composer, not by version control)<br>
`$ composer install --prefer-dist`.<br>
Now, you should see a `vendor/` directory<br>

15. Apache runs as user `www-data` on DigitalOcean
```
$ sudo chown -R www-data storage
$ sudo chown -R www-data bootstrap/cache
```
16. There is a `.env` file locally but not in the project directory on DO (it's in the `.gitignore` file because we don't want to use local values in the production environment.). Copy the contents of the local `.env`file, changing <br>
`APP_ENV=local` to `APP_ENV=production` and `APP_DEBUG=true` to `APP_DEBUG=false` into a new `.env` file on the DO server. (If it's more convenient to copy from an existing `.env` file already on DO, remember to copy over the APP_KEY that relates to this project from the local file.)

17. Configure a new subdomain on `namecheap.com`, or wherever, and set up a VirtualHost record for this in the file `000-default.conf`, in the `/etc/apache2/sites-enabled/` directory. Add a new block:
```
<VirtualHost *:80>
	 ServerName foobooks.trolloff.com
	 DocumentRoot "/var/www/html/foobooks/public"
	 <Directory "/var/www/html/foobooks/public">
        Require all granted
	 	AllowOverride All
	</Directory>
</VirtualHost>
```

18. Check that `http://foobooks.trolloff.com` brings up the Laravel welcome page.

19. Build some routes. Open the routes file: `app\Http\routes.php`

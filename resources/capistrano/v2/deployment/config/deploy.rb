set :application, "ys-entrada-1x-me"

set :repository, "git@projects.med.university.edu:Entrada/ys-entrada-1x-me.git"
set :scm, :git

set :use_sudo, false
set :ssh_options, { :forward_agent => true }
set :deploy_via, :copy
set :copy_cache, true
set :copy_exclude, [".git", "deployment", "www-root/setup"]
set :keep_releases, 10

set :app_symlink, false

default_run_options[:pty] = true

# Entrada ME
task :staging do
  server "entrada-staging.med.university.edu", :app, :web, :db, :primary => true

  set :user, "staging"

  set :branch, "ys/develop"
  set :environment, "staging"
  set :deploy_to, "/var/www/vhosts/entrada-staging.med.university.edu"
end
task :production do
  server "entrada.med.university.edu", :app, :web, :primary => true

  set :user, "production"

  set :branch, "ys/production"
  set :environment, "production"
  set :deploy_to, "/var/www/vhosts/entrada.med.university.edu"
end

namespace :deploy do
  task :finalize_update, :except => { :no_release => true } do
    # Composer
    run "curl -sS https://getcomposer.org/installer | php -- --install-dir=#{latest_release}"
    run "php #{latest_release}/composer.phar install -d #{latest_release}"

    # Remove any existing config, settings, or .htaccess files.
    run "rm -f #{latest_release}/www-root/core/config/config.inc.php"
    run "rm -f #{latest_release}/www-root/core/config/settings.inc.php"
    run "rm -f #{latest_release}/www-root/.htaccess"

    # Symlink environment specific config and settings files.
    run "ln -s #{latest_release}/www-root/core/config/config-#{environment}.inc.php #{latest_release}/www-root/core/config/config.inc.php"
    run "ln -s #{latest_release}/www-root/core/config/settings-#{environment}.inc.php #{latest_release}/www-root/core/config/settings.inc.php"

    # Copy the environmental .htaccess file over to the document root.
    run "cp #{latest_release}/www-root/core/config/htaccess-#{environment}.txt #{latest_release}/www-root/.htaccess"

    # Update the APPLICATION_VERSION constant in the settings file to prevent JavaScript / CSS caching.
    run "sed -i -e 's@%DEPLOYMENT_TIMESTAMP%@#{release_name}@g' #{latest_release}/www-root/core/config/settings-#{environment}.inc.php"

    if app_symlink
      run "ln -fs #{current_path}/www-root #{app_symlink}"
    end

    # Properly chmod the files and directories.
    run "find #{latest_release} -type d -exec chmod 0755 {} \\;"
    run "find #{latest_release} -type f -exec chmod 0644 {} \\;"

    # Add execute permissions to the developer tools.
    run "chmod +x #{latest_release}/developers/tools/*.php"
  end
  namespace :web do
    task :disable do
      # Copy the notavailable.html file to index.html which is served before index.php.
      run "cp #{latest_release}/www-root/maintenance.html #{latest_release}/www-root/index.html"
    end
    task :enable do
      # Run migrations
      run "php #{latest_release}/entrada migrate --quiet --up"

      # Remove the index.html file.
      run "rm -f #{latest_release}/www-root/index.html"

      # Reset the PHP opcode cache in production:
      if environment == "staging"
        run "curl -s https://entrada-staging.med.university.edu/cron/opcache_reset.php"
      end

      # Reset the PHP opcode cache in production:
      if environment == "production"
        run "curl -s http://entrada.med.university.edu/cron/opcache_reset.php"
      end
    end
  end
end

# Hook the web disable and disable events into the deployment.
after "deploy:update_code", "deploy:web:disable"
after "deploy:create_symlink", "deploy:web:enable"

# Remove old releases
after "deploy:update", "deploy:cleanup"
